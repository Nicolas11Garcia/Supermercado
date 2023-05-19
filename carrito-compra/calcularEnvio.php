<?php
include('../php/class/Dao.php');
session_start();

$dao = new DAO();

$subtotal_producto_individual = 0;
$subtotal_carrito = 0;

$comuna= $_POST['comuna_texto'];
$comuna_precio = 2000;


//LOGIN
if (isset($_SESSION["nombre_usuario"]) == true){
    $id_cliente = $_SESSION['id_usuario'];

    $items_dentro_de_carrito = $dao->mostrarItemsCarrito($id_cliente); //Obtenemos todos los productos en el carrito segun el usuario
        //NO HAY ITEMS EN EL CARRITO
        if($items_dentro_de_carrito == 0){

        }
        //HAY ITEMS EN EL CARRITO
        else if($items_dentro_de_carrito >= 1){
            foreach ($items_dentro_de_carrito as $k) {
                $precio = 0;
                if($k->getOferta() == 1){
                    $precio = $k->getPrecioOferta();
                }
                else{
                    $precio = $k->getPrecioVenta();
                }
                $subtotal_item = $precio * $k->getCantidadEnCarrito();
                $subtotal_producto_individual = $precio *  $k->getCantidadEnCarrito();
                $subtotal_carrito = $subtotal_producto_individual + $subtotal_carrito;
            }
        }
    $total_general = $subtotal_carrito + $comuna_precio;
    $_SESSION['total_general'] = $total_general;
    

    echo 'totalgeneral:$'.number_format($total_general, 0, ',', '.').':envio:$'.number_format($comuna_precio, 0, ',', '.').'';

}

//NO LOGIN
else if((isset($_SESSION["nombre_usuario"]) == false)){

    foreach($_SESSION['id_productos_carrito'] as $key => $value){ //RECORRO TODOS MIS PRODUCTOS
        $lista_id_en_carrito = $dao->mostrarProductoPorId($value); //LISTA CON TODOS LOS VALORES DE LOS PRODUCTOS
        foreach ($lista_id_en_carrito as $k) { //RECORRO CADA PRODUCTO CON SU VALOR
            $precio = 0;
            if($k->getOferta() == 1){
                $precio = $k->getPrecioOferta();
            }
            else{
                $precio = $k->getPrecioVenta();
            }
            $subtotal_producto_individual = $precio *  $_SESSION["cantidad"][$key]; //["cantidad"][$key] key toma la posicion [0] = 2 cantidades
            $subtotal_carrito = $subtotal_producto_individual + $subtotal_carrito;
        }
    }
    $total_general = $subtotal_carrito + $comuna_precio;
    $_SESSION['total_general'] = $total_general;
    

    echo 'totalgeneral:$'.number_format($total_general, 0, ',', '.').':envio:$'.number_format($comuna_precio, 0, ',', '.').'';
}






?>