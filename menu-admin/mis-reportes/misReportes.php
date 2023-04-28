<?php
include('../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_usuario = $_SESSION["id_usuario"]; //ID del usuario que mando el reporte:


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
    <link rel="stylesheet" href="../../assets/css/menu-stock/gestionarproductos.css">

    <link rel="stylesheet" href="../../assets/css/menu-stock/generarreporte.css">

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Mis Reportes</h2>

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

                $mis_reportes = $dao->verTodosLosReportes();

                if($mis_reportes){
                    foreach($mis_reportes as $k){
                        echo '
                        <tr class="producto-item">
                            <td>'.$k->getNumeroReporte().'</td>
                            <td >'.$k->getFecha().'</td>
                            <td >'.$k->getTipoDeReporte().'</td>
                            <td>'.$k->getIdProducto().'</td>
                            <td >'.$k->getEstado().'</td>
                            <td>
                            <div class="botones-opciones">
                            ';

                            if($k->getEstado() == 'Pendiente de revisión'){
                                echo '
                                <div class="editar boton-opcion">
                                        <a href="DetallesReporte.php?numero_reporte='.$k->getNumeroReporte().'">Visualizar</a>
                                </div>
                                ';
                            }

                            else{
                                echo '
                                <div class="editar boton-opcion">
                                    <a href="DetallesReporte.php?numero_reporte='.$k->getNumeroReporte().'">Visualizar</a>
                                </div>
                                ';
                            }

                            echo'

                            </div>
                            
                            </td>
                        </tr>
                        ';
                    }
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
                                window.location.href = "misReportes.php";
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