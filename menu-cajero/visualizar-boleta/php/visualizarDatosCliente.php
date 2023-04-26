<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$numero_boleta = $_POST['numero_boleta']; //Recupero ID de producto de caja 

$datos_boleta = $dao->buscarBoletaID($numero_boleta);
if($datos_boleta == 0){
    echo 'no hay ';
}

else{
    $rut = "";
    $nombre = "";
    $apellido = "";
    $total = 0;

    foreach($datos_boleta as $k){
        $datos_usuario = $dao->datosClienteID($k->getIdCliente());
        foreach($datos_usuario as $l){
            $rut = $l->getRut();
            $nombre = $l->getNombre();
            $apellido = $l->getApellido();
        }
        $total = "Total: $".number_format($k->getTotal(), 0, ',', '.');
    }

    echo $rut.'{'.$nombre.'{'.$apellido.'{'.$total;
}








?>