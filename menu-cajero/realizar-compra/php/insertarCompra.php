<?php
include('../../../php/class/Dao.php');
session_start();

$dao = new DAO();

$id_cliente_caja = $_SESSION['id_cliente_caja'];
$rut = $_SESSION['rut'];


$total_general = 0;

//OBTENGO EL TOTAL GENERAL
$lista_items_detalle_boleta = $dao->mostrarItemsDetalleBoleta($rut);
foreach ($lista_items_detalle_boleta as $k) {
    $precio_total_producto = $k->getPrecio() * $k->getCantidad();
    $precio_con_descuento = $precio_total_producto - $k->getPrecioOfertaDescuento();

    $total_general = $total_general + $precio_con_descuento;

}


//Borar temporal
$borrar_items_temporal = $dao->mostrarItemsDetalleBoletaNoGroupBy($rut);

//CREO LA BOLETA
$numero_boleta = $dao->agregarBoleta($id_cliente_caja,$total_general);

$_SESSION['numero_boleta'] = $numero_boleta;

//AGREGO AL DETALLE NO-TEMPORAL LOS PRODUCTOS DE LA BOLETA
foreach ($lista_items_detalle_boleta as $k) {

    $precio_total_producto = $k->getPrecio() * $k->getCantidad();
    $precio_con_descuento = $precio_total_producto - $k->getPrecioOfertaDescuento();

    //Se ingresa al detalle la orden, el ID del producto, el precio y la cantidad es 1 porque es caja
    $ingresando_al_detalle= $dao->agregarAlDetalleBoleta($numero_boleta,$k->getIdProducto(),$precio_con_descuento,$k->getCantidad());
        //Se resta la cantidad del producto comprado *DISMINUIR STOCK*
        $dao->descontarStock($k->getIdProducto(),1);
        //SE ELIMINA EL ITEM COMPRADO DEL CARRITO
        foreach ($borrar_items_temporal as $l) {
            $dao->borrarProductoDetalleTemportal($l->getIdPosicion());

        }

}

echo $numero_boleta;


?>