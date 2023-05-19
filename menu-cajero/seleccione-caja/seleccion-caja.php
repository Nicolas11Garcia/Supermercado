<?php 
    include('../../php/class/Dao.php');
    $dao = new Dao();
    session_start();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/imagenes/iconKala.jpg" type="image/x-icon">


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/seleccione-caja/seleccione-caja.css">
    <link rel="stylesheet" href="../../assets/css/menu.css">
    <script src="../../assets/js/main.js" defer></script>

    <title>Seleccione caja - Kala</title>
</head>
<body class="container">
    
    <div class="contenedor-cerar-sesion-perfil"> 
        <div class="cerrar-sesion-caja">
            <a href="../../cerrar-sesion/cerrarsesion.php"><i class="fi fi-rr-power icon-opcion"></i>Cerrar sesion</a>

        </div>

        <?php

if ($_SESSION["cargo"] == 3){

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
                    </div>  
                    
                    
                    ';
}
                    else{
                        echo '<script>window.location.href = "../../alerta-permisos/index.html";</script>';
                    }

        ?>

    </div>


    <section>
        <h2>Seleccione la caja en donde trabajara</h2>

        <div class="contenedor-cajas">

            <?php
                $lista_cajas = $dao->mostrarCajas();

                foreach($lista_cajas as $k){
                    if($k->getEstado() == 'Disponible'){
                        echo '
                            <div class="caja caja-disponible" id="'.$k->getNumeroCaja().'">
                                <p class="texto-estado disponible">'.$k->getEstado().'</p>
                                <p class="texto-caja disponible">Caja <br> '.$k->getNumeroCaja().'</p>
                                <i class="fi fi-rr-check disponible"></i>
                            </div>
                        ';
                    }

                    else if($k->getEstado() == 'Ocupada'){
                        echo '
                            <div class="caja caja-ocupada" id="'.$k->getNumeroCaja().'">
                                <p class="texto-estado ocupado">'.$k->getEstado().'</p>
                                <p class="texto-caja ocupado">Caja <br> '.$k->getNumeroCaja().'</p>
                                <i class="fi fi-rr-triangle-warning ocupado"></i>
                            </div>
                        ';
                    }

                    else if($k->getEstado() == 'Fuera de servicio'){
                        echo '
                            <div class="caja caja-fuera-de-servicio" id="'.$k->getNumeroCaja().'">
                                <p class="texto-estado fuera-de-servicio">'.$k->getEstado().'</p>
                                <p class="texto-caja fuera-de-servicio">Caja <br> '.$k->getNumeroCaja().'</p>
                                <i class="fi fi-rr-cross-circle fuera-de-servicio"></i>
                            </div>
                        ';
                    }
                }

            ?>






        </div>

    </section>





    <script>
    $('.caja').click(function(){
        var numero_caja = $(this).attr("id");

        $.ajax({
            type:'POST',
            url:'php/seleccionDeCaja.php',
            data:{numero_caja},
            success: function(res){
                respuesta_sin_espacios = res.trim();

                if(respuesta_sin_espacios == 'Puedes pasar'){
                    location.href = "../index.php";
                }

                else{
                    Swal.fire({
                    title: "Caja no disponible",
                    text: "Lo siento, la caja no está disponible en este momento.",
                    icon: "error",
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#61C923'
                    });
                }
            }
        });

    });
    
</script>



</body>



</html>