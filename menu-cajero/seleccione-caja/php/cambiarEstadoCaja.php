<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new Dao();


//Traemos el numero de la caja
$numero_caja = $_SESSION["numero_caja"];

//editamos su estado de ocupado a disponible
$dao->editarEstadoCaja($numero_caja,'Disponible');

//destruimos la sesion de la caja
unset($_SESSION["numero_caja"]); //destruimos la sesion;




?>