<?php
include('../../../php/class/Dao.php');
$dao = new DAO();

$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];


$ingreso_cliente = $dao->registrar_usuario_caja($rut,$nombre,$apellido);

echo 1;









?>