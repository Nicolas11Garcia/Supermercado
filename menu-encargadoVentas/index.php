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
    <link rel="shortcut icon" href="../assets/imagenes/iconKala.jpg" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../assets/css/menu.css">
    <script src="../assets/js/main.js" defer></script>

    <style>
        .notificacion{
            background: #142440;
            font-size: 13px;
            width: 25px;
            height: 25px;
            margin-left: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;

            border-radius: 100px;
        }
    </style>

    <title>Menu Encargado Stock - Kala</title>
</head>
<body>

    <div class="contenedor-iframe-div">
        <div class="panel">
            <div class="opciones-principales">
                <img class="logo" src="../assets/imagenes/logo.jpg">
                <a target="mostrar" class="opcion opcion-seleccionada" href="ordenes/ordenes.php" id="crear-oferta"><i class="fi fi-rr-file-medical-alt icon-opcion"></i>Ordenes</a>
                <a target="mostrar" class="opcion" href="visualizar-ventas/visualizar-ventas.php" id="crear-oferta2"><i class="fi fi-rr-file-medical-alt icon-opcion"></i>Visualizar ventas</a>
            </div>
            <div class="cerrar-sesion">
                <a href="../cerrar-sesion/cerrarsesion.php" class="opcion"><i class="fi fi-rr-power icon-opcion"></i>Cerrar sesion</a>
            </div>

            <div class="backdrop" id="backdrop">
            </div>

            <div class="backdrop-white" id="backwhite">
            </div>

        </div>

        <div class="iframe-perfil">

        <?php
            if (isset($_SESSION["cargo"]) == 5){
                
                //Separamos el nombre y el apellido en variables diferentes;
                $nombre_completo = explode(" ", $_SESSION["nombre_usuario"]);
                $nombre_primeraInicial = substr($nombre_completo[0],0,1);
                $apellido_primeraInicial = substr($nombre_completo[1],0,1);

                echo '
                <div class="perfil">
                    <div class="img-perfil">
                        <p>'.$nombre_primeraInicial.'.'.$apellido_primeraInicial.'</p>
                    </div>
                    <p class="nombre-usuario">'.$_SESSION["nombre_usuario"].'</p>

                    <div class="backdrop" id="backdrop-up">
                    </div>

                    <div class="backdrop-white" id="backwhite-up">
                    </div>
                </div>
                
                
                ';
            }
            
            else{
                echo '<script>window.location.href = "../alerta-permisos/index.html";</script>';
            }
        ?>


            <iframe src="ordenes/ordenes.php" name="mostrar"></iframe>

        </div>

        <div class="right">
            <div class="backdrop" id="backdrop-right">
            </div>

            <div class="backdrop-white" id="backwhite-right">
            </div>
        </div>
    </div>










<script>

    $antiguo_id = "crear-oferta";

    $('.opcion').click(function(){
        var id = $(this).attr("id");

        $("#"+$antiguo_id).removeClass("opcion-seleccionada");
        $("#"+id).addClass("opcion-seleccionada");

        $antiguo_id = id;
    
    });

</script>

</body>



</html>