<?php


include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

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



//Subir imagen
$nombre_imagen = $_FILES["imagen"]['name'];
$temporal = $_FILES["imagen"]["tmp_name"];
$carpeta='../../../assets/imagenes/productos';
$ruta= $carpeta.'/'.$nombre_imagen;
move_uploaded_file($temporal,$carpeta.'/'. $nombre_imagen);


$ingresar = $dao->ingresarProducto($titulo,$marca,$categoria,$sub_categoria,$sub_categoria,$precio_venta,$precio_oferta,
$stock_comprado,$info_del_producto,$nombre_imagen,1,$visible,$oferta);

echo 'ingresado';








?>