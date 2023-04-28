<?php


include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_producto = $_POST['id_producto'];

$titulo = $_POST['titulo'];
//OBTENGO LOS ID de la opcion que selecciono
$marca = $_POST['select-marca'];
$categoria = $_POST['select-categoria'];
$sub_categoria = $_POST['select-sub-categoria'];
$sub_sub_categoria = $_POST['select-sub-sub-categoria'];

$precio_venta = $_POST['precio-venta'];

$oferta = 0;
if($precio_oferta = $_POST['precio-oferta'] == null || $_POST['precio-oferta'] == 0){
    $precio_oferta = 0;
    $oferta = 0;
}

else{
    $precio_oferta = $_POST['precio-oferta'];
    $oferta = 1;
}


$stock_comprado = $_POST['stock-comprado'];
$stock_actual = $_POST['stock-actual'];

if($info_del_producto = $_POST['info-del-producto'] == null){
    $info_del_producto = "";
}

else{
    $info_del_producto = $_POST['info-del-producto'];
}



//VER VISIBILIDAD
$visible = 0;
if(isset($_POST['visible'])){
    $visible = 1;
}



//Comprobar si agrego o no imagen
$nombre_imagen = $_FILES["imagen"]['name'];

//Agrego una imagen
if($nombre_imagen){
    $temporal = $_FILES["imagen"]["tmp_name"];
    $carpeta='../../../assets/imagenes/productos';
    $ruta= $carpeta.'/'.$nombre_imagen;
    move_uploaded_file($temporal,$carpeta.'/'. $nombre_imagen);
    
    
    $ingresar = $dao->editarProducto($id_producto,$titulo,$marca,$categoria,$sub_categoria,$sub_categoria,$precio_venta,$precio_oferta,
    $stock_comprado,$stock_actual,$info_del_producto,$nombre_imagen,1,$visible,$oferta);

    echo 'editado';

}

//No agrego
else{
    $ingresar = $dao->editarProductoSinImagen($id_producto,$titulo,$marca,$categoria,$sub_categoria,$sub_categoria,$precio_venta,$precio_oferta,
    $stock_comprado,$stock_actual,$info_del_producto,1,$visible,$oferta);

    echo 'editado';

}











?>