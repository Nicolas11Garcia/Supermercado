<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();



//Obtener valores de descuento

$porcentaje = "";
$descuento_por_unidad = "";

//obtengo el precio totdal de ambos productos
//tendremos que realizar un if para sacar el precio oferta o el precio venta
$total_precio_ambos_producto = 0;


//Si ya escribio el descuento aplicalo
if(isset($_POST['cantidad']) || $_POST['porcentaje']){
    $porcentaje = $_POST['porcentaje'];
}



//SI MIS DOS VARIABLES NO SON VACIAS EJECUTA EL PROCEDIMIENTO
$id_producto_1 = "";
$id_producto_2 = "";

if(isset($_POST['id_producto_1']) && isset($_POST['id_producto_2'])){

    $id_producto_1 = $_POST['id_producto_1'];
    $id_producto_2 = $_POST['id_producto_2'];


    if($id_producto_1 != null && $id_producto_2 != null){
        //Traemos el producto del id que ingreso
        if(is_numeric($id_producto_1) && is_numeric($id_producto_2) ){

            //Comprobamos que exista el id del producto
            if($lista_datos_producto_1 = $dao->mostrarProductoPorId($id_producto_1)){
                //IMPRIMIMOS EL ID NUMERO 1 
                foreach($lista_datos_producto_1 as $k){

                    //Si ya se escribio el descuento osea porcentaje
                    if($porcentaje != ""){
                        if($k->getOferta() == 1){
                            $total_precio_ambos_producto = $total_precio_ambos_producto + $k->getPrecioOferta();
                        }
        
                        else{
                            $total_precio_ambos_producto = $total_precio_ambos_producto + $k->getPrecioVenta();
                        }
                    }

                    echo '
                    <div class="item" style="margin-bottom:20px;">
                        <div class="contenedor-producto-reporte">
                            <img class="producto-reporte" src="../../assets/imagenes/Productos/'.$k->getImagen().'" style = "margin-right:30px; width:110px; object-fit:cover;">
                        </div>
                        <div class="datos-producto">
                            <p class="dato-producto">Titulo: <span class="span-plomo">'.$k->getTitulo().'</span></p>
                            <p class="dato-producto">Marca: <span class="span-plomo">'.$k->getMarca().'</span></p>
                            <p class="dato-producto">Stock actual: <span class="span-plomo">'.$k->getStockActual().'</span></p>
                            <p class="dato-producto">Precio Venta: <span class="span-plomo">'.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></p>
                            <p class="dato-producto">Precio Oferta: <span class="span-plomo">'.number_format($k->getPrecioOferta(), 0, ',', '.'). '</span></p>
                        </div>
                    </div>
                    ';
                }
            }

            if($lista_datos_producto_2 = $dao->mostrarProductoPorId($id_producto_2)){
                //IMPRIMIMOS EL ID NUMERO 2
                foreach($lista_datos_producto_2 as $k){
                    if($porcentaje != ""){
                        if($k->getOferta() == 1){
                            $total_precio_ambos_producto = $total_precio_ambos_producto + $k->getPrecioOferta();
                        }
        
                        else{
                            $total_precio_ambos_producto = $total_precio_ambos_producto + $k->getPrecioVenta();
                        }
                    }
                    echo '
                    <div class="item" style="margin-bottom:20px;">
                        <div class="contenedor-producto-reporte">
                            <img class="producto-reporte" src="../../assets/imagenes/Productos/'.$k->getImagen().'" style = "margin-right:30px; width:110px;">
                        </div>
                        <div class="datos-producto">
                            <p class="dato-producto">Titulo: <span class="span-plomo">'.$k->getTitulo().'</span></p>
                            <p class="dato-producto">Marca: <span class="span-plomo">'.$k->getMarca().'</span></p>
                            <p class="dato-producto">Stock actual: <span class="span-plomo">'.$k->getStockActual().'</span></p>
                            <p class="dato-producto">Precio Venta: <span class="span-plomo">'.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></p>
                            <p class="dato-producto">Precio Oferta: <span class="span-plomo">'.number_format($k->getPrecioOferta(), 0, ',', '.'). '</span></p>
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

        //SI MI porcentajo ya esta escrito, imprime el resultado de ambos totales
        if($porcentaje != ""){
            $total_precio_ambos_producto = $total_precio_ambos_producto * $porcentaje / 100;
            $total_precio_ambos_producto = round($total_precio_ambos_producto, 0);  // Quitar los decimales
            echo '<p style="font-size:14px">Descuento<span style="color: #51AA1B;">('.$porcentaje.'%) = '.number_format($total_precio_ambos_producto, 0, ',', '.').' de descuento si lleva ambos productos</span/></p>';
        
        }

    }
    else{
    }
}




?>