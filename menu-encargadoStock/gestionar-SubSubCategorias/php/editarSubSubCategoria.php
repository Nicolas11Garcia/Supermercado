<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$descripcion_sub_sub_categoria = $_POST['descripcion_sub_sub_categoria']; //DATOS DE INGRESO
$id_categoria = $_POST['id_categoria'];
$id_sub_categoria = $_POST['id_sub_categoria']; 

$id_sub_sub_categoria = $_POST['id_sub_sub_categoria']; //sub-sub id donde hacer el where para editar

$dao->editarSubSubCategoria($id_categoria,$id_sub_categoria,$descripcion_sub_sub_categoria,$id_sub_sub_categoria);


echo 'editado';


?>