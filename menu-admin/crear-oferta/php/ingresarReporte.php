<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto'];
$tipo_de_reporte = $_POST['tipo_de_reporte'];
$motivo = $_POST['motivo'];

$id_usuario = $_SESSION["id_usuario"]; //ID del usuario que mando el reporte:


$numero_reporte = $dao->ingresarReporte($id_producto,$tipo_de_reporte,$motivo,$id_usuario);

if($numero_reporte){
    echo 'ingresado:'.$numero_reporte.'';
}







?>