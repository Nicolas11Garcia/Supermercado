<?php 
    include('../php/class/Dao.php');
    session_start();
    $dao = new DAO();

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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>



    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/modulo-sesion-usuario/modulo-sesion-usuario.css">
    <link rel="stylesheet" href="../assets/css/carrito-compra/micarrito.css">
    <link rel="stylesheet" href="../assets/css/carrito-compra/procesoCompra.css">
    <script src="../assets/js/main.js" defer></script>

    <title>Kala - Iniciar sesión</title>
</head>
<body>
    <div class="barra-primera">
        <div class="container">
            <div class="izquierda-redes">
                <p class="texto-pequeño siguenos">Siguenos</p>
                <div class="redes">
                    <a><i class="fi fi-brands-facebook"></i></a>
                    <a><i class="fi fi-brands-instagram"></i></a>
                    <a><i class="fi fi-brands-whatsapp"></i></a>
                </div>
            </div>
    
            <div class="derecha-usuario">
            <?php
                    //SI INICIO SESION O NO
                    if (isset($_SESSION["nombre_usuario"]) == true){
                        
                        echo '
                        <p class="texto-pequeño" href="iniciarsesion.php">Bienvenido(a) '.$_SESSION["nombre_usuario"].'</p>
                        <p class="texto-pequeño" style="margin-left: 5px; margin-right: 5px;">|</p>
                        <a class="texto-pequeño" href="../menu-cliente/cerrarsesion.php">Mi cuenta</a>
                        ';
                    }
                    else{
                        echo '
                        <a class="texto-pequeño" href="../modulo-sesion-usuario/iniciarsesion.php">Iniciar sesión</a>
                        <p class="texto-pequeño" style="margin-left: 5px; margin-right: 5px;">|</p>
                        <a class="texto-pequeño" href="../modulo-sesion-usuario/registrodeusuario.php">Registrarse</a>
                        
                        ';
                    }
                ?>
            </div>
        </div>
    </div>


    <header>
        <div class="container">
            <div class="izquierda-header">
                <a href="../index.php"><img class="logo" src="../assets/imagenes/logo.jpg" alt="logo"></a>
            </div>

            <div class="medio-header">
                <form class="form-buscar">
                    <div class="flex-search">
                        <input class="input-search" type="text" placeholder="¿Qué estas buscando?">
                        <button class="boton-search"><i class="fi fi-rr-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="derecha-header">
                <div class="derecha-iconos">
                    <div class="carrito" count="2">
                        <a class="micarrito"  href="../carrito-compra/micarrito.php" style="text-decoration: none; color: black;"><i class="fi fi-rr-shopping-cart"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </header>


    <section class="container-main seccion-carrito" id="main">
        <h2 class="titulo-h2">Tu compra</h2>
            <div class="contenedor-izquierda-derecha-carrito">
                <div class="izquierda">
                    <div class="contenedor-info-procesada"  id="info-procesada">
                        <div class="informacion-de-contacto" style="background-color: white;">
                            <div class="contenedor-info-cliente" >
                                <h3 class="texto-post-venta">Actualizaciones de tu pedido</h3>
                                <p class="pequeño-texto-post-venta">Vuelve a esta página para recibir actualizaciones sobre el estado de tu envío.</p>

                            </div>
                        </div>
    
                        <div class="informacion-de-contacto" style="background-color: white; width: 100%;">
                            <div class="contenedor-info-cliente" style="width: 100%;">
                                <h3 class="texto-post-venta">Informacion del cliente</h3>
    
                                <div class="info-cliente-post-venta">

                                    <?php

                                        $numero_orden = $_SESSION["numero_orden"];
                                        $total_orden = 0;

                                        $datos_boleta = $dao->buscarOrden($numero_orden);
                                        foreach ($datos_boleta as $k) {
                                            $total_orden = $k->getTotal();
                                            echo'
                                            <div class="datos-personales">
                                            <p class="pequeño-texto-post-venta titular-datos" style="margin-bottom: 10px;">Datos de la compra:</p>
                                            <p class="pequeño-texto-post-venta">N° de orden: '.$k->getNumeroOrden().'</p>
                                            <p class="pequeño-texto-post-venta parrafo-post">Fecha de compra: '.$k->getFecha().'</p>
                                            </div>
        
                                            <div class="datos-personales">
                                                <p class="pequeño-texto-post-venta titular-datos" style="margin-bottom: 10px;">Datos personales:</p>
                                                <p class="pequeño-texto-post-venta parrafo-post">Correo: '.$k->getCorreo().'</p>
                                                <p class="pequeño-texto-post-venta">Nombre: '.$k->getNombre().'</p>
                                                <p class="pequeño-texto-post-venta">Apellido: '.$k->getApellido().'a</p>
                                                <p class="pequeño-texto-post-venta">Rut: '.$k->getRut().'</p>
                                                <p class="pequeño-texto-post-venta">Telefono: '.$k->getTelefono().'</p>
                                            </div>
        
                                            <div class="datos-envio">
                                                <p class="pequeño-texto-post-venta titular-datos" style="margin-bottom: 10px;">Datos de envio:</p>
                                                <p class="pequeño-texto-post-venta">Región: '.$k->getRegion().'</p>
                                                <p class="pequeño-texto-post-venta">Comuna: '.$k->getComuna().'</p>
                                                <p class="pequeño-texto-post-venta parrafo-post">Calle: '.$k->getCalle().'</p>
                                                <p class="pequeño-texto-post-venta">Numero: '.$k->getNumero().'</p>
                                            </div>
                                            
                                            ';
                                        }

                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="button-center">
                        <a class="btn-seguir-comprando" href="../index.php">Seguir comprando</a>
                    </div>





                </div>


                <div class="derecha">
                    <div class="productos-comprados">
                    
                    <?php
                    $lista_productos_segun_orden = $dao->buscarDetalleSegunOrden($numero_orden);
                    
                    $subtotal = 0;
                    
                    $total_general = 0;

                    foreach ($lista_productos_segun_orden as $k) {
                        $total_cantidad_precio = $k->getPrecio() * $k->getCantidad();

                        echo '
                        <div class="item-comprado">
                            <div class="img-item-comprado">
                                <img src="../assets/imagenes/Productos/'.$k->getImagen().'">
                            </div>
                            <div class="detalles-carro">
                                <p class="titulo-producto">'.$k->getTitulo().'</p>
                                <p class="marca">'.$k->getMarca().'</p>
                                <p class="precio-cantidad">$'.number_format($k->getPrecio(), 0, ',', '.').' * '.$k->getCantidad().'</p>
                            </div>

                            <div class="precio-item">
                                <p>$'.number_format($total_cantidad_precio, 0, ',', '.').'</p>
                            </div>
                        </div>
                        ';

                        $subtotal = $total_cantidad_precio + $subtotal;
                    }

                    $envio = $total_orden -$subtotal;
                    ?>

                    </div>


                            <div class="derecha">
                                <div class="contenedor-pecios-lados">
                                    <p class="plomo">Subtotal:</p>
                                    <p class="negro-precios" id="subtotal-compra">$<?php echo number_format($subtotal, 0, ',', '.') ?></p>
                                </div>
            
                                <div class="contenedor-pecios-lados">
                                    <p class="plomo">Envio:</p>
                                    <p class="negro-precios" id="precio-envio">$<?php echo number_format($envio, 0, ',', '.'); ?></p>
                                </div>
            
                                <div class="contenedor-pecios-lados total-contenedor">
                                    <p class="total">Total:</p>
                                    <p class="total-precio" id="total-general">$<?php echo number_format($total_orden, 0, ',', '.'); ?></p>
                                </div>
                            </div>
                            
                </div>
            </div>


    </section>














    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>

</body>
</html>