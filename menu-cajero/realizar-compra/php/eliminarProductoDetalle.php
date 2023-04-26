<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_posicion_eliminar = $_POST['id_posicion_eliminar'];

$dao->borrarProductoDetalleTemportal($id_posicion_eliminar);
