<?php
include('../../php/class/Dao.php');
$dao = new DAO();

$numero_reporte = $_GET['numero_reporte'];

$lista_datos_reporte = $dao->buscarReporteSegunId($numero_reporte);

$nombre = "";
$apellido = "";
$rol = "";
$motivo = "";

$id_producto = 0;

foreach($lista_datos_reporte as $k){
    $nombre = $k->getNombre();
    $apellido = $k->getApellido();
    $rol = $k->getRol();
    $motivo = $k->getMotivo();
    $id_producto = $k->getIdProducto();
}

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


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/ingresarproducto.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/generarreporte.css">

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Generar reporte - Reporte #<?php echo $numero_reporte?></h2>

    <div style="margin-bottom: 30px; margin-top: 30px;">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="datos-solicitante" style="margin-bottom: 30px;">
                    <p class="texto-negrito" style="margin-bottom: 20px;">Solicitante:</p>
                    <div class="flex">
                        <p class="label-input">Nombre: <span class="span-plomo"><?php echo $nombre; ?></span></p>
                        <p class="label-input">Cargo: <span class="span-plomo"><?php echo $rol; ?></span></p>
                    </div>
    
                    <div class="input-normal">
                        <p class="label-input">Apellido: <span class="span-plomo"><?php echo $apellido; ?></span></p>
                    </div>
                </div>

                <div class="contenedor-motivo" style="margin-bottom: 30px;">
                    <p class="texto-negrito" style="margin-bottom: 20px;">Motivo:</p>
                    <div class="input-normal">
                        <p class="label-input"><?php echo $motivo; ?></span></p>
                    </div>
                </div>

            </div>

            <div class="derecha-form">
                <?php
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
                ?>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="titular-fila">N° de reporte</th>
                    <th class="titular-fila">Fecha de reporte</th>
                    <th class="titular-fila">Tipo de reporte</th>
                    <th class="titular-fila">ID de producto</th>
                    <th class="titular-fila">Estado</th>
                    <th class="titular-fila"></th>
                </tr>
            </thead>
    
            <?php

                foreach($lista_datos_reporte as $k){
                    echo '
                    <tr class="producto-item">
                        <td>'.$k->getNumeroReporte().'</td>
                        <td >'.$k->getFecha().'</td>
                        <td >'.$k->getTipoDeReporte().'</td>
                        <td>'.$k->getIdProducto().'</td>
                        <td >'.$k->getEstado().'</td>
                        <td><button class="btn-eliminar" type="button" id="'.$k->getNumeroReporte().'"><i class="fi fi-rr-trash"></i></button></td>
                    </tr>
                    ';
                }

            ?>

    
        </table>





    </div>


    <script>
            $('.btn-eliminar').click(function(){
                if (confirm('¿deseas eliminar el reporte?')) {
                    //Recuperar id del form
                    var id_reporte = $(this).attr("id");

                    $.ajax({
                        type:'POST',
                        url:'php/eliminarReporte.php', //URL
                        data: {id_reporte},
                        success: function(data){
                            respuesta = data.trim();
                            console.log(respuesta);

                            if(respuesta == 'eliminado'){
                                alert('Reporte Eliminado');
                                window.location.href = "generarReporte.php";
                            }
                            else if(respuesta == 'noEliminado'){
                                alert ('El estado del reporte ya no esta pendiente de revision, por lo que no puede ser eliminado');
                            }
                        }
                    }); 
                }
            });
    </script>


</body>

</html>