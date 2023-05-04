<?php 
    session_start();
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

    <link rel="stylesheet" href="../assets/css/menu.css">
    <script src="../assets/js/main.js" defer></script>


    <style>
        .contenedor-perfil-caja{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .numero-caja{
            margin-left: 50px;
            font-size: 14px;
        }

        .n-caja{
            color: #6F6E6F;
        }
    </style>

    <title>Menu cajero - Kala</title>
</head>
<body>

    <div class="contenedor-iframe-div">
        <div class="panel">
            <div class="opciones-principales">
                <img class="logo" src="../assets/imagenes/logo.jpg">
                <a target="mostrar" class="opcion opcion-seleccionada" href="realizar-compra/realizarCompra.php" id="realizar-compra"><i class="fi fi-rr-shopping-cart icon-opcion"></i>Realizar compra</a>
                <a target="mostrar" class="opcion" href="visualizar-ventas/visualizar-ventas.php" id="visualizar-ventas"><i class="fi fi-rr-piggy-bank icon-opcion"></i>Visualizar ventas</a>
                <a target="mostrar" class="opcion" href="visualizar-boleta/visualizar-boleta.html" id="visualizar-boletas"><i class="fi fi-rr-file-invoice icon-opcion"></i>Visualizar boletas</a>
            </div>
            <div class="cerrar-sesion" id="cerrar-sesion">
                <a class="opcion" style="cursor: pointer;"><i class="fi fi-rr-power icon-opcion"></i>Cerrar sesion</a>
            </div>

        </div>

        <div class="iframe-perfil">

        <?php
            if ($_SESSION["cargo"] == 3){
                if(isset($_SESSION['numero_caja'])){
                    //Separamos el nombre y el apellido en variables diferentes;
                    $nombre_completo = explode(" ", $_SESSION["nombre_usuario"]);
                    $nombre_primeraInicial = substr($nombre_completo[0],0,1);
                    $apellido_primeraInicial = substr($nombre_completo[1],0,1);

                    echo '
                    <div class="contenedor-perfil-caja">
                        <div class="numero-caja">
                            <p>Caja: <span class="n-caja">'.$_SESSION['numero_caja'].'</span></p>
                        </div>

                        <div class="perfil">
                            <div class="img-perfil">
                                <p>'.$nombre_primeraInicial.'.'.$apellido_primeraInicial.'</p>
                            </div>
                            <p class="nombre-usuario">'.$_SESSION["nombre_usuario"].'</p>
                        </div>
                    </div>
                    ';
                }

                else{
                    echo '<script>window.location.href = "seleccione-caja/seleccion-caja.php";</script>';

                }


            }
            else{
                echo '<script>window.location.href = "../index.php";</script>';
            }
        ?>

            <iframe src="realizar-compra/realizarCompra.php" name="mostrar"></iframe>

        </div>
    </div>










<script>

    $antiguo_id = "realizar-compra";

    $('.opcion').click(function(){
        var id = $(this).attr("id");

        $("#"+$antiguo_id).removeClass("opcion-seleccionada");
        $("#"+id).addClass("opcion-seleccionada");

        $antiguo_id = id;
    
    });

    $('.cerrar-sesion').click(function(){
        $.ajax({
            url:'seleccione-caja/php/cambiarEstadoCaja.php',
            success: function(res){
                location.href ='../cerrar-sesion/cerrarsesion.php';
            }
        });
    
    });

</script>

</body>



</html>