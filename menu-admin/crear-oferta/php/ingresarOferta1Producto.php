<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto'];
$cantidad_oferta = $_POST['cantidad'];
$porcentaje = $_POST['porcentaje'];

$numero_de_id = $dao->ingresarOferta1Producto($id_producto,$cantidad_oferta,$porcentaje);

if($numero_de_id != 0){
    echo "ingresado$$numero_de_id";
    
}

else{
    echo "error";
}


















?>