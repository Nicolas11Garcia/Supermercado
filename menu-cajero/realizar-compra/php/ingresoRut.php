<?php
include('../../../php/class/Dao.php');
$dao = new DAO();

$rut = $_POST['rut'];
$filas = $dao->buscarRut($rut); //SI hay filas, hay registro

echo $filas;


?>