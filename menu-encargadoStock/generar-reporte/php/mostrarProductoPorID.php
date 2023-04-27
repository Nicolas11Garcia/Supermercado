<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto'];

//Traemos el producto del id que ingreso en general reporte
if(is_numeric($id_producto)){
    if($lista_datos_producto = $dao->mostrarProductoPorId($id_producto)){

        foreach($lista_datos_producto as $k){
            echo '
            <div class="item">
                <div class="contenedor-producto-reporte">
                    <img class="producto-reporte" src="../../assets/imagenes/Productos/'.$k->getImagen().'" style = "margin-right:30px;">
                </div>
                <div class="datos-producto">
                    <p class="dato-producto">Titulo: <span class="span-plomo">'.$k->getTitulo().'</span></p>
                    <p class="dato-producto">Marca: <span class="span-plomo">'.$k->getMarca().'</span></p>
                    <p class="dato-producto">Stock actual: <span class="span-plomo">'.$k->getStockActual().'</span></p>
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