<?php

include('../php/class/Dao.php');
session_start();

$dao = new DAO();

$key_a_actualizar= $_POST['key']; // solo es necesaria para NO LOGIN
$id_actualizar= $_POST['id_actualizar'];
$cantidad_nueva= $_POST['cantidad'];

$stock_actual_producto_a_editar = 0; //Se obtiene el stock actual del producto que se quiere editar
$precio_oferta = 0; //Se obtiene el precio_oferta


//BUSCAR LOS DATOS DEL PRODUCTO QUE QUIERE ACTUALIZAR PARA SABER EL STOCK ACTUAL y no ingrese mas de lo debido
$lista_datos_id_producto = $dao->mostrarProductoPorId($id_actualizar);

foreach ($lista_datos_id_producto as $k) {
    $stock_actual_producto_a_editar = $k->getStockActual();

    if($k->getOferta() == 1){
        $precio_oferta = $k->getPrecioOferta();
        break;
    }
    else{
        $precio_oferta = $k->getPrecioVenta();
        break;
    }


}

//Validamos que la nueva cantidad no supere al stock
if($cantidad_nueva <= $stock_actual_producto_a_editar){

    //LOGIN
    if (isset($_SESSION["nombre_usuario"]) == true){
        //Cliente logeado
        $id_cliente = $_SESSION['id_usuario'];

        $items_dentro_de_carrito = $dao->mostrarItemsCarrito($id_cliente); //Obtenemos todos los productos en el carrito segun el usuario

        foreach ($items_dentro_de_carrito as $k) {
            //Si desea agregar otra cantidad de un producto que ya esta en el carrito, que se sume la nueva cantidad con la cantidad que ya existe en el carrito
            if($k->getId() == $id_actualizar){ 
                $subtotal_item = 0;
                $actualizar = $dao->actualizarCarrito($id_cliente,$id_actualizar,$cantidad_nueva);

                if($k->getOferta() == 1){
                    $subtotal_item = $k->getPrecioOferta() * $cantidad_nueva;
                }
                else{
                    $subtotal_item = $k->getPrecioVenta() * $cantidad_nueva;
                }
                echo '$'.number_format($subtotal_item, 0, ',', '.')."";
                break;
            }

        }
        

    }

    //NO LOGIN
    else if((isset($_SESSION["nombre_usuario"]) == false)){
        //Buscamos el producto que se quiere editar segun su key[0]
        foreach($_SESSION['id_productos_carrito'] as $key => $value){
            if($key == $key_a_actualizar){
                $_SESSION['cantidad'][$key]= $cantidad_nueva;
                $subtotal_item = $precio_oferta * $cantidad_nueva;
    
                echo '$'.number_format($subtotal_item, 0, ',', '.')."";
                break;
            }
    
        }
    }




}

else{
    echo 'La cantidad que quieres supera nuestro stock actual, por favor modifica la cantidad';
}




?>