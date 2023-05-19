<?php

include('../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_oferta = $_GET['id_oferta'];



?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/ingresarproducto.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/generarreporte.css">
    <link rel="stylesheet" href="../../assets/css/menu-admin/crear-oferta/crearoferta.css">

    <title>Menu cajero - Kala</title>

    <style>
    .swal2-popup {
      border: 2px solid black;
      
    }
  </style>
</head>
<body>

    <h2>Ver oferta</h2>

    <a href="crearoferta.php" class="span-plomo" style="font-size: 14px; display: block; margin-bottom: 40px;">Volver a crear oferta</a>

    <table id="tabla">
        <thead>
            <tr>
                <th class="titular-fila">ID</th>
                <th class="titular-fila">Imagen</th>
                <th class="titular-fila">Titulo</th>
                <th class="titular-fila">Marca</th>
                <th class="titular-fila">Precio venta</th>
                <th class="titular-fila">Precio oferta</th>
                <th class="titular-fila">Cantidad para oferta</th>
                <th class="titular-fila">Descuento (%)</th>
            </tr>
        </thead>

        <?php

        $lista_producto_en_oferta = $dao->mostrarOferta1ProductoPorId($id_oferta);

        foreach($lista_producto_en_oferta as $k){
            echo '
            <tr class="producto-item">
                <td style="width: 40px;">'.$k->getId().'</td>
                <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                <td class="titulo">'.$k->getTitulo().'</td>
                <td style="width: 120px;">'.$k->getMarca().'</td>
                <td style="width: 120px;">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</td>
                <td style="width: 70px;">$'.number_format($k->getPrecioOferta(), 0, ',', '.'). '</td>
                <td style="width: 70px;">'.$k->getCantidad().'</td>
                <td style="width: 70px;">%'.$k->getPorcentaje().'</td>
            </tr>
            
            
            ';
        }


        ?>

    </table>














</body>

</html>