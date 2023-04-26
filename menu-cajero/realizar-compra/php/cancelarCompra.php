<?php
include('../../../php/class/Dao.php');
session_start();

$dao = new DAO();

$id_cliente_caja = $_SESSION['id_cliente_caja'];
$rut = $_SESSION['rut'];


//OBTENGO LOS PRODUCTOS AGREGADOS AL DETALLE
$lista_items_detalle_boleta = $dao->mostrarItemsDetalleBoleta($rut);

//ELIMINO LOS PRODUCTOS
foreach ($lista_items_detalle_boleta as $k) {
        $dao->borrarProductoDetalleTemportal($k->getIdPosicion());

}



?>