<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto'];

$cantidad_oferta = "";
$porcentaje = "";
$descuento_por_unidad = "";


if(isset($_POST['cantidad']) || $_POST['porcentaje']){
    $cantidad_oferta = $_POST['cantidad'];
    $porcentaje = $_POST['porcentaje'];

}




//Traemos el producto del id que ingreso en general reporte
if(is_numeric($id_producto)){
    if($lista_datos_producto = $dao->mostrarProductoPorId($id_producto)){

        foreach($lista_datos_producto as $k){
            if($porcentaje != ""){
                if($k->getOferta() == 1){
                    $descuento_por_unidad = $k->getPrecioOferta() * $porcentaje / 100;
                    $descuento_por_unidad = round($descuento_por_unidad, 0);  // Quitar los decimales
                }

                else{
                    $descuento_por_unidad = $k->getPrecioVenta() * $porcentaje / 100;
                    $descuento_por_unidad = round($descuento_por_unidad, 0);  // Quitar los decimales
                }
            }

            

            echo '
            <div class="item">
                <div class="contenedor-producto-reporte">
                    <img class="producto-reporte" src="../../assets/imagenes/Productos/'.$k->getImagen().'" style = "margin-right:30px;">
                </div>
                <div class="datos-producto">
                    <p class="dato-producto">Titulo: <span class="span-plomo">'.$k->getTitulo().'</span></p>
                    <p class="dato-producto">Marca: <span class="span-plomo">'.$k->getMarca().'</span></p>
                    <p class="dato-producto">Stock actual: <span class="span-plomo">'.$k->getStockActual().'</span></p>
                    <p class="dato-producto">Precio Venta: <span class="span-plomo">$ '.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></p>
                    <p class="dato-producto">Precio Oferta: <span class="span-plomo">$ '.number_format($k->getPrecioOferta(), 0, ',', '.'). '</span></p>
                    <p class="dato-producto">Descuento <span style="color: #51AA1B;">('.$porcentaje.'%)</span/> = -$'.$descuento_por_unidad.' por unidad a partir de la unidad numero <span style="color: #51AA1B;">'.$cantidad_oferta.'</span></p>
                </div>
            </div>
            
            
            ';
        }
    }

    else{
        echo 'No existe ID con ese producto';
    }
}

else{
    echo 'No existe ID con ese producto';
}



?>