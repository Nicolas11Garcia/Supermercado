<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$rut = $_SESSION['rut'];


$subtotal_general = 0;
$iva = 0;
$total = 0;

$iva_porcentaje = 19;


$lista_items_detalle_boleta = $dao->mostrarItemsDetalleBoleta($rut);

if($lista_items_detalle_boleta){
    foreach ($lista_items_detalle_boleta as $k) {
        $precio_sub_total_sin_descuento = $k->getPrecio() * $k->getCantidad();
        $precio_con_descuento = $precio_sub_total_sin_descuento - $k->getPrecioOfertaDescuento();

        $total = $total + $precio_con_descuento;
    }
    $iva = $total * $iva_porcentaje / 100;
    $iva = round($iva, 0);

    $subtotal_general = $total - $iva;


    echo '$'.number_format($subtotal_general, 0, ',', '.').':$'.number_format($iva, 0, ',', '.').':$'.number_format($total, 0, ',', '.');
}

else{
    echo '$0';
}



?>