<?php
include('../../../php/class/Dao.php');
$dao = new DAO();

$rut = $_POST['rut'];
$hay_cliente = $dao->buscarRut($rut); //SI hay filas, hay registro


if($hay_cliente >= 1){
    $_SESSION['rut'] = $rut;
}


echo $hay_cliente;

?>