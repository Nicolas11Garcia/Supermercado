<?php 
    include('php/class/Dao.php');
    session_start();
    $dao = new DAO();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/imagenes/iconKala.jpg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <link href="
  https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
  " rel="stylesheet">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script src="assets/js/main.js" defer></script>

    <title>Kala - Supermercado</title>
</head>
<body>
    <div class="barra-primera">
        <div class="container">
            <div class="izquierda-redes">
                <p class="texto-pequeño">Siguenos</p>
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
                        <a class="texto-pequeño" href="menu-cliente/cerrarsesion.php">Mi cuenta</a>
                        ';
                    }
                    else{
                        echo '
                        <a class="texto-pequeño" href="modulo-sesion-usuario/iniciarsesion.php">Iniciar sesión</a>
                        <p class="texto-pequeño" style="margin-left: 5px; margin-right: 5px;">|</p>
                        <a class="texto-pequeño" href="modulo-sesion-usuario/registrodeusuario.php">Registrarse</a>
                        
                        ';
                    }
                ?>
            </div>
        </div>
    </div>


    <header>
        <div class="container">
            <div class="izquierda-header">
                <img class="logo" src="assets/imagenes/logo.jpg" alt="logo">
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
                        <a class="micarrito"  href="carrito-compra/micarrito.php" style="text-decoration: none; color: black;"><i class="fi fi-rr-shopping-cart"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </header>

    <div class="categorias-seccion">
        <div class="container-main">
            <div class="categoria-flex">
                        <div class="categoria dropdown" >
                            <a class="dropbtn" href="" id="dropdown">Supermercado<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content" id="contenido">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" id="dropdown">Lacteos<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" id="dropdown">Despensa<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" id="dropdown">Frutas y verduras<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" id="dropdown">Limpieza<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" id="dropdown">Carniceria<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" id="dropdown">Botilleria<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" >Hogar<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>

                        <div class="categoria dropdown">
                            <a class="dropbtn" href="" >Ofertas<i class="fi fi-rr-angle-small-down down-category"></i></a>
                                <div class="dropdown-content">
                                    <div class="contenedor-sub-categorias container-main">
                                        <div class="sub-categorias-items">
                                            <a class="titular">Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Subasdsadss asdaadsadasdad</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>

                                        <div class="sub-categorias-items">
                                            <a href="" class="titular">Automóvil, Ferretería y Jardín</a>
                                            <a href="" class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                            <a class="sub-titular">Sub-Titular</a>
                                        </div>
                                        

                                    </div>
                                </div>
                        </div>
            </div>

        </div>

    </div>

    <main class="main" id="main">
        <div class="home-img">
            <img src="assets/imagenes/Banner1.jpg" id="img">
        </div>

        
        <section class="seccion-productos container-main">
            <div class="flex">
                <h2 class="titulo-h2">Ofertas</h2>
                <a class="ver-todo" href="">Ver todo</a>
            </div>

            <div class="splide" aria-labelledby="carousel-heading">      
                <div class="splide__track container-main-productos">
                      <ul class="splide__list">
                        
                        <?php
                            $lista_productos = $dao->mostrarTodosLosProductos();

                            foreach ($lista_productos as $k) {
                                echo '
                                <div class="splide__slide item-producto">
                                    <div class="contenedor-img-item">
                                        <div class="centrar-img-item">
                                            <a href="producto-individual/producto-individual.php?producto='.$k->getId().'"><img src="assets/imagenes/Productos/'.$k->getImagen().'".jpg"> </a>
                                        </div>
                                    </div>
                                    <div class="detalles">
                                        <a href="" class="marca">'.$k->getMarca().'</a>
                                        <a href="producto-individual/producto-individual.php?producto='.$k->getId().'" class="titulo-producto">'.$k->getTitulo().'</a>
                                    </div>
                                    <div class="precio">
                                        <p class="precio-oferta">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</p>
                                        <p class="precio-normal-censurado">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</p>
                                    </div>
                
                                    <button class="agregar-al-carrito"><i class="fi fi-rr-shopping-cart"></i>Agregar al carrito</button>
                                </div>
                                
                                ';
                            }

                        ?>




        
                          <li class="splide__slide">Slide 03</li>
                          <li class="splide__slide">Slide 04</li>
                          <li class="splide__slide">Slide 05</li>
                          <li class="splide__slide">Slide 06</li>
                          <li class="splide__slide">Slide 07</li>
                      </ul>
                </div>
        
                    <div class="splide__arrows splide__arrows--ltr">
                        <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Previous slide" aria-controls="splide01-track">
                            <i class="fi fi-br-angle-left botonessiguiente"></i>
                        </button>
        
                        <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track">
                            <i class="fi fi-br-angle-right botonessiguiente"></i>
                        </button>
                    </div>
            </div>
        </section>
        
        

        <section class="container-main temporal">
            <div class="img-contenedor">
                <img src="assets/imagenes/a.jpg">
            </div>

            <div class="img-contenedor">
                <img src="assets/imagenes/b.jpg">
            </div>

        </section>
        
    
    
    <div  id="opacidad">

    </div>

    </main>



    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <script>
    var splide = new Splide( '.splide', {
  perPage: 6,
  rewind : true,
} );

splide.mount();
  </script>
</body>
</html>

