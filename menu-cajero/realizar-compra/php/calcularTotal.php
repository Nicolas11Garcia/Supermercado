<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$rut = $_SESSION['rut'];


$total_general = 0;


$lista_items_detalle_boleta = $dao->mostrarItemsDetalleBoleta($rut);
foreach ($lista_items_detalle_boleta as $k) {
    $total_general = $total_general + $k->getPrecio();
}
echo '$'.number_format($total_general, 0, ',', '.')."";


?>