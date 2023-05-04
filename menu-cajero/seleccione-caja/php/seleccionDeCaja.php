<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new Dao();

$numero_caja = $_POST['numero_caja']; //Obtenemos el numero de la caja que selecciono

$lista_datos_caja_seleccionada = $dao->mostrarCajaSegunId($numero_caja); //OBTENEMOS el estado de la caja que selecciono


//validamos si el estado es disponible o no
//Creamos la sesion para saber en que caja fue la boleta a futuro

foreach($lista_datos_caja_seleccionada as $k){
    if($k->getEstado() == 'Disponible'){
        $_SESSION["numero_caja"] = $numero_caja;

        //editar estado de caja
        $dao->editarEstadoCaja($numero_caja,'Ocupada');

        echo 'Puedes pasar';
        break;
    }

    else{
        echo 'Esta caja no esta disponible';
        break;
    }
}





?>