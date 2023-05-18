<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto_1 = $_POST['id_producto_1'];
$id_producto_2 = $_POST['id_producto_2'];
$porcentaje = $_POST['porcentaje'];

$numero_de_id = $dao->ingresarOferta2Productos($id_producto_1,$id_producto_2,$porcentaje);

if($numero_de_id != 0){
    echo "ingresado$$numero_de_id";
    
}

else{
    echo "error";
}


















?>