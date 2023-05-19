<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto']; //Recupero ID de producto de caja 
$rut = $_SESSION['rut'];


//Obtengo los datos del producto a ingresar
$datos_producto = $dao->mostrarProductoPorId($id_producto);
$descuento = 0;

if(sizeof($datos_producto) >= 1){
    foreach ($datos_producto as $k) {

        //Existe oferta?
        if($k->getOferta() == 1){
            $dao->agregarAlDetalleTemportal($k->getId(),$k->getPrecioOferta(),$rut,$descuento);
        }
        //no existe? trabaja con el precio venta
        else{
            $dao->agregarAlDetalleTemportal($k->getId(),$k->getPrecioVenta(),$rut,$descuento);
        }

        //LEO TODOS LOS PRODUCTOS QUE ESTAN EN DETALLE;
        $lista_items_detalle_boleta = $dao->mostrarItemsDetalleBoleta($rut);
            foreach ($lista_items_detalle_boleta as $k) {
                
                //OFERTA 1 PRODUCTO
                //Traigo los productos que estan en oferta
                $lista_productos_ofertas = $dao->mostrarOferta1Producto();
                //Los recorro y pregunto si el producto cumple con la oferta
                foreach($lista_productos_ofertas as $l){
                    if($l->getId() == $k->getIdProducto()){
                        //Si no es 0 no es multiplo de la cantidad osea 3,6,9 siven
                        if($k->getCantidad() % $l->getCantidad() == 0){
                            //Hacer update en precio oferta en detalle temporal
                            $descuento = $k->getPrecio() * $l->getPorcentaje() / 100;
                            $descuento = round($descuento, 0);
                            $dao->actualizarDetalleOferta($k->getIdProducto(),$descuento);
                        }
                    }   
                }
        }

        //OFERTA 2 
        $lista_producto_en_oferta_2 = $dao->mostrarOferta2ProductosAll();
        //Obtengo todas las ofertas de 2 productos
        foreach($lista_producto_en_oferta_2 as $l){
            $productos_encontrados = 0;
            $precio_producto_1 = 0;
            $precio_producto_2 = 0;

            //Recorro todo el detalle para buscar el fk1
            foreach ($lista_items_detalle_boleta as $k) {
                if($k->getIdProducto() == $l->getFkProducto1()){
                    $productos_encontrados = $productos_encontrados + 1; //Identifica si se encontro
                    $precio_producto_1 = $k->getPrecio(); //Obtenemos el precio del producto
                    break;
                }
            }
            //Recorro todo el detalle para buscar el fk2
            foreach ($lista_items_detalle_boleta as $k) {
                if($k->getIdProducto() == $l->getFkProducto2()){
                    $productos_encontrados = $productos_encontrados + 1;
                    $precio_producto_2 = $k->getPrecio();
                    break;
                }
            }
            //Si encontro ambos osea que se cumple la oferta insertala
            if($productos_encontrados == 2){
                $descuento_precio_1 = $precio_producto_1 * $l->getPorcentaje() / 100;
                $descuento_precio_1 = round($descuento_precio_1, 0);

                $descuento_precio_2 = $precio_producto_2 * $l->getPorcentaje() / 100;
                $descuento_precio_2 = round($descuento_precio_2, 0);
                

                $dao->actualizarDetalleOferta($l->getFkProducto1(),$descuento_precio_1);
                $dao->actualizarDetalleOferta($l->getFkProducto2(),$descuento_precio_2);
                $productos_encontrados = 0;
            }

        }


        




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
            <th class="titular-fila">Descuento</th>
            <th class="titular-fila">Subtotal</th>
            <th class="titular-fila"></th>
        </tr>
    </thead>
</table>';

foreach ($lista_items_detalle_boleta as $k) {
        $sub_total_producto = $k->getPrecio() * $k->getCantidad();
echo '
    <tr class="producto-item" id="item-producto'.$k->getIdProducto().'">
        <td>'.$k->getIdProducto().'</td>
        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
        <td class="titulo">'.$k->getTitulo().'</td>
        <td style="width: 150px;">'.$k->getMarca().'</td>
        <td style="width: 150px;">$'.number_format($k->getPrecio(), 0, ',', '.').'</span></td>
        <td style="width: 100px;">'.$k->getCantidad().'</td>
        <td style="width: 100px;">';

        if($k->getPrecioOfertaDescuento() > 0){
            $sub_total_producto = $sub_total_producto - $k->getPrecioOfertaDescuento();
            echo '-$'.number_format($k->getPrecioOfertaDescuento(), 0, ',', '.');
        }
        else{
            echo '-$'.$k->getPrecioOfertaDescuento();
        }
        echo '
        </td>
        <td style="width: 100px;">$'.number_format($sub_total_producto, 0, ',', '.').'</td>
        <td><button id='.$k->getIdProducto().' class="btn-eliminar" type="button"><i class="fi fi-rr-trash"></i></button></td>
    </tr>
    ';
}









?>