<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$descripcion_sub_categoria = $_POST['descripcion_sub_categoria']; //NUEVOS DATOS
$id_categoria = $_POST['id_categoria'];
$id_sub_categoria = $_POST['id_sub_categoria'];

$dao->actualizarSubCategoria($id_sub_categoria,$id_categoria,$descripcion_sub_categoria);

echo 'editado';


?>