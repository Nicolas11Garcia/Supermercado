<?php

include('../php/class/Dao.php');
session_start();

$dao = new DAO();

$key_eliminar_carrito = $_POST['key_eliminar_item_carrito']; //en LOGIN esta variable es el ID del producto, cuando esta logeado la variable del boton eliminar es el getID en vez del key en NO LOGIN

//LOGIN
if (isset($_SESSION["nombre_usuario"]) == true){
    $id_cliente = $_SESSION['id_usuario'];

    $eliminar = $dao->borrarItemCarrito($id_cliente,$key_eliminar_carrito);

}


//NO LOGIN
else if((isset($_SESSION["nombre_usuario"]) == false)){
    foreach($_SESSION['id_productos_carrito'] as $key => $value){
        if($key == $key_eliminar_carrito){
            unset($_SESSION['id_productos_carrito'][$key]);
            unset($_SESSION['cantidad'][$key]);
            break;
        }
    
    }
}




?>