<?php 
    include('../../php/class/Dao.php');
    $dao = new Dao();
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
        <div class="perfil">
            <div class="img-perfil">
                <p>N.G</p>
            </div>
            <p class="nombre-usuario">Nicolás Garcia</p>
        </div>
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
                                <i class="fi fi-br-check disponible"></i>
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
                    location.href = "../menu.php";
                }

                else{
                    alert('La caja no esta disponible');
                }
            }
        });

    });
    
</script>



</body>



</html>