<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$estado = $_POST['valor_select'];
$numero_boleta = $_POST['numero_boleta'];

//Puede cambiar el valor del select en inspeccionar
if($estado == 'Pendiente' || $estado == 'Finalizada'){
    $dao->cambiarEstadoOrden($estado,$numero_boleta);
    echo 'estadocambiado';
    
}

else{
    echo 'pillin';
}





