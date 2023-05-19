<?php
include('../../../php/class/Dao.php');
$dao = new DAO();

$rut = $_POST['rut'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];


$ingreso_cliente = $dao->registrar_usuario_caja($rut,$correo,$nombre,$apellido);

echo 1;









?>