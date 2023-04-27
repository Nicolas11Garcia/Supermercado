<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$descripcion_sub_sub_categoria = $_POST['descripcion_sub_sub_categoria']; //DATOS DE INGRESO
$id_categoria = $_POST['id_categoria'];
$id_sub_categoria = $_POST['id_sub_categoria'];

$dao->agregarSubSubCategoria($id_categoria,$id_sub_categoria,$descripcion_sub_sub_categoria);


echo 'agregado';


?>