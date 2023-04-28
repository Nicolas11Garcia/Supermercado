<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_reporte = $_POST['id_reporte'];

$lista_datos_reporte = $dao->buscarReporteSegunId($id_reporte);

$estado = 'Pendiente de revisión'; //Solo queremos eliminar reportes Con este estado

$cumple_estado = 0; //¿Cumple el estado que quiere eliminar con 'pendiente de revision'?

foreach($lista_datos_reporte as $k){
    if($estado == $k->getEstado()){
        $cumple_estado = 1; //Si cumple eliminalo
        break;
    }
}

if($cumple_estado == 1){
    $dao->borrarReporte($id_reporte);
    echo 'eliminado';
}


//Si el estado ya no esta pendiente de revision no se puede eliminar
else{
    echo 'noEliminado';
    echo '';
}






?>