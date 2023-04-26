<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto']; //Recupero ID de producto de caja 
$rut = $_SESSION['rut'];



//Obtengo los datos del producto a ingresar
$datos_producto = $dao->mostrarProductoPorId($id_producto);

if(sizeof($datos_producto) >= 1){
    foreach ($datos_producto as $k) {
        $dao->agregarAlDetalleTemportal($k->getId(),$k->getPrecioOferta(),$rut);
    }
}

else{
}


$lista_items_detalle_boleta = $dao->mostrarItemsDetalleBoleta($rut);
echo '
<table>
    <thead>
        <tr>
            <th class="titular-fila">ID</th>
            <th class="titular-fila">Imagen</th>
            <th class="titular-fila">Titulo</th>
            <th class="titular-fila">Marca</th>
            <th class="titular-fila">Precio unitario</th>
            <th class="titular-fila">Cantidad</th>
            <th class="titular-fila"></th>
        </tr>
    </thead>
</table>';

foreach ($lista_items_detalle_boleta as $k) {

echo '
    <tr class="producto-item" id="item-producto'.$k->getIdPosicion().'">
        <td>'.$k->getIdProducto().'</td>
        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
        <td class="titulo">'.$k->getTitulo().'</td>
        <td style="width: 150px;">'.$k->getMarca().'</td>
        <td style="width: 150px;">'.number_format($k->getPrecio(), 0, ',', '.').'</span></td>
        <td style="width: 100px;">1</td>
        <td><button id='.$k->getIdPosicion().' class="btn-eliminar" type="button"><i class="fi fi-rr-trash"></i></button></td>
    </tr>
    ';
}









?>