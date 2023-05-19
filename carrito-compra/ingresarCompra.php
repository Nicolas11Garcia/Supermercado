<?php
include('../php/class/Dao.php');
session_start();

$dao = new DAO();


$numero_orden = 0; //SI SE INSERTA SERA EL NUMERO DE LA ORDEN QUE SE CREO

//RECUPERAMOS LOS DATOS DE EL PROCESO DE COMPRA MEDIANTE AJAX
$correo= $_POST['correo'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$rut= $_POST['rut'];
$telefono= $_POST['telefono'];

$region= $_POST['region'];
$comuna= $_POST['comuna'];
$calle= $_POST['calle'];
$numero= $_POST['numero'];

//RECUPERAMOS EL TOTAL GENERAL DE CALCULAR ENVIO YA QUE FUE PUESTO EN SESSION
$total_general = $_SESSION['total_general'];

//INSERTAR CON LOGIN CREADO
if (isset($_SESSION["nombre_usuario"]) == true){
    $id_cliente= $_SESSION["id_usuario"];
    $numero_orden = $dao->creandoOrden($id_cliente,$correo,$nombre,$apellido,$rut,$telefono,$region,$comuna,$calle,$numero,$total_general);
    $numero_boleta = $dao->agregarBoleta($id_cliente,$total_general);

    $_SESSION['numero_orden'] = $numero_orden;
    $_SESSION['numero_boleta'] = $numero_boleta;

    $lista = $dao->mostrarItemsCarrito($id_cliente); //TRAEMOS TODOS LOS PRODUCTOS SEGUN EL ID DEL CLIENTE

    foreach ($lista as $k) { 
        $precio =0;

        if($k->getOferta() == 1){
            $precio = $k->getPrecioOferta();
        }
        else{
            $precio = $k->getPrecioVenta();
        }

        //Se ingresa al detalle la orden, el ID del producto, el precio oferta y la cantidad comprada
        $ingresando_al_detalle= $dao->agregarAlDetalle($numero_orden,$k->getId(),$precio,$k->getCantidadEnCarrito());
        $ingresando_al_detalle_boleta= $dao->agregarAlDetalleBoleta($numero_boleta,$k->getId(),$precio,$k->getCantidadEnCarrito());
        
        //Se resta la cantidad del producto comprado *DISMINUIR STOCK*
        $dao->descontarStock($k->getId(),$k->getCantidadEnCarrito());
        //SE ELIMINA EL ITEM COMPRADO DEL CARRITO
        $dao->borrarItemCarrito($id_cliente,$k->getId());
    }

}
//NO LOGIN
else if((isset($_SESSION["nombre_usuario"]) == false)){
    $numero_orden = $dao->creandoOrden(1,$correo,$nombre,$apellido,$rut,$telefono,$region,$comuna,$calle,$numero,$total_general);
    $numero_boleta = $dao->agregarBoleta(1,$total_general);
    
    $_SESSION['numero_orden'] = $numero_orden;
    $_SESSION['numero_boleta'] = $numero_boleta;

    foreach($_SESSION['id_productos_carrito'] as $key => $value){
        //OBTENEMOS TODOS LOS ID DE LOS PRODUCTOS AGREGADO AL CARRO
        $lista_id_en_carrito = $dao->mostrarProductoPorId($value);
        //IMPRIMIMOS LOS PRODUCTOS
        foreach ($lista_id_en_carrito as $k) {
            $precio =0;

            if($k->getOferta() == 1){
                $precio = $k->getPrecioOferta();
            }
            else{
                $precio = $k->getPrecioVenta();
            }

            $ingresando_al_detalle= $dao->agregarAlDetalle($numero_orden,$k->getId(),$precio,$_SESSION['cantidad'][$key]);
            $ingresando_al_detalle_boleta= $dao->agregarAlDetalleBoleta($numero_boleta,$k->getId(),$precio,$_SESSION['cantidad'][$key]);
            
            $dao->descontarStock($k->getId(),$_SESSION['cantidad'][$key]);
        }
    }
    unset($_SESSION['id_productos_carrito']);
    unset($_SESSION['cantidad']);

}







?>