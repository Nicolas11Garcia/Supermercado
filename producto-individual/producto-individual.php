<?php 
    include('../php/class/Dao.php');
    $dao = new DAO();
    session_start();

    $id_producto_url = $_GET['producto'];

    if($id_producto_url == null){
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
    <link rel="shortcut icon" href="../assets/imagenes/iconKala.jpg" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/producto-individual/producto-individual.css">
    <script src="../assets/js/main.js" defer></script>

    <title>Kala - Producto</title>
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
                    <div class="carrito">
                        <a class="micarrito"  href="../carrito-compra/micarrito.php" style="text-decoration: none; color: black;"><i class="fi fi-rr-shopping-cart"></i></a>
                        <div class="numero-en-carrito ocultar-contador" id="numero-en-carrito">
                            <p class="id-numero-carrito" id="id-numero-carrito"></p>
                        </div>
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

        <section class="container-main espacio-producto">
            <div class="contenedor-producto-detalles">

                    <?php

                        $producto_url = $dao->mostrarProductoPorId($id_producto_url);
                        foreach ($producto_url as $k) {
                            echo '
                                <div class="contenedor-img-producto">
                                    <img src="../assets/imagenes/Productos/'.$k->getImagen().'">
                                </div>

                                <div class="contenedor-detalles">
                                    <div class="contenedor-marca">
                                        <a href="" class="marcapro marca">'.$k->getMarca().'</a>
                                    </div>
            
                                    <div class="contenedor-descripcion">
                                        <p href="" class="descripcion-producto">'.$k->getTitulo().'</p>
                                    </div>
            
                                    <div class="precio contendor-precio">';

                                        if($k->getOferta() == 1){
                                            echo '
                                            <p class="precio-oferta precio-grande">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</p>
                                            <p class="precio-normal-censurado  precio-grande" style="margin-left: 15px;">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</p>
                                            ';
                                        }
                                        else{
                                            echo '<p class="precio-normal  precio-grande">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</p>
                                        ';
                                        }           
                                echo '
                                    </div>
            
                                    <form class="form-cantidad-button" id="Formulario" method="POST">
                                        <label class="label-cantidad">Cantidad:</label>
                                        <div class="contenedor-cantidad">
                                            <span class="cantidad-button" id="menos">-</span>
                                            <input name="cantidad_seleccionada" type="text" class="cantidad-numero" id="cantidad-numero" value ="1"></input>
                                            <span class="cantidad-button" id="mas">+</span>
                                        </div>
                                        <input type="hidden" name= "id_producto_url" value="'.$k->getId().'">
                                        <button type="button" class="btn-verde" name = "agregar_al_carrito" id="agregar_al_carrito"><i class="fi fi-rr-shopping-cart"></i>Agregar al carrito</button>
                                    </form>

                                    <div>
                                        <p class="titular-infor" style = "margin-top:30px; font-weight: 400" >Date prisa solo quedan<span style="color:#51AA1B"> '.$k->getStockActual().' productos</span> en stock!!</p>
                                    </div>
            
                                    <div class="contendor-info">
                                        <p class="titular-infor">Información del producto:</p>
                                        <p class="descrip-infor">
                                            '.$k->getInformaciondelproducto().'
                                        </p>
                                    </div>
                                </div>
                            ';
                        }

                    ?>

            </div>
            <div id="respuesta"></div>
        </section>
        














        <section class="seccion-productos container-main">
            <div class="flex">
                <h2 class="titulo-h2">Otros productos</h2>
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
                                            <a href="producto-individual.php?producto='.$k->getId().'"><img src="../assets/imagenes/Productos/'.$k->getImagen().'".jpg"> </a>
                                        </div>
                                    </div>
                                    <div class="detalles">
                                        <a href="" class="marca">Artisan</a>
                                        <a href="producto-individual.php?producto='.$k->getId().'" class="titulo-producto">'.$k->getTitulo().'</a>
                                    </div>
                                    <div class="precio">';
                                    if($k->getOferta()==1){
                                        echo '
                                        <p class="precio-oferta">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</p>
                                        <p class="precio-normal-censurado">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</p>
                                        
                                        ';
                                    }
                                    else{
                                        echo '<p class="precio-normal">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</p>';
                                    }
                                    echo '
                                    </div>

                                    <form>
                                        <input type="hidden" name= "id_producto_recomendado" value="'.$k->getId().'">
                                        <button id="'.$k->getId().'" type="button" class="agregar-al-carrito agregar_al_carrito_items"><i class="fi fi-rr-shopping-cart" ></i>Agregar al carrito</button>
                                    </form>
                                    
                
                                </div>
                                
                                ';
                            }

                        ?>
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


    <script>
        const menos = document.getElementById('menos');
        const mas = document.getElementById('mas');
        const cantidad = document.getElementById('cantidad-numero');

        let a = 1;

        mas.addEventListener("click",()=>{
            a++;
            a = (a < 10) ?  + a : a;
            cantidad.value = a;

        })

        menos.addEventListener("click",()=>{
            if(a > 1){
                a--;
                a = (a < 10) ?  + a : a;
                cantidad.value = a;
            }
        })
    </script>

    <script>
            cantidadEnCarrito();

    //AGREGAALCARRITO SIN ACTUALIZAR
            $('#agregar_al_carrito').click(function(){
                $.ajax({
                    type:'POST',
                    url:'agregaralcarrito.php',
                    data:$('#Formulario').serialize(),
                    success: function(res){
                        $("#respuesta").html(res);
                        cantidadEnCarrito();
                    }
                });
            });

            //RECOMENDADOS PRODUCTOS
            $('.agregar_al_carrito_items').click(function(){
                var id_producto_url = $(this).attr("id");
                var cantidad_seleccionada = 1;
                $.ajax({
                    type:'POST',
                    url:'agregaralcarrito.php',
                    data:{id_producto_url,cantidad_seleccionada},
                    success: function(res){
                        $("#respuesta").html(res);
                        cantidadEnCarrito();
                    }
                });
            });

        

        function cantidadEnCarrito(){
        $.ajax({
                type:'POST',
                url:'../carrito-compra/mostrarCantidadCarrito.php', //URL
                data: "", //no entrego ningun valor a php
                success: function(res){
                    trim = res.trim();
                    if(trim >= 1){
                        $('#id-numero-carrito').html(trim);
                        $('#numero-en-carrito').removeClass('ocultar-contador');
                    }
                    else{
                        $('#numero-en-carrito').addClass('ocultar-contador');
                    }
                }
        });
    }
    </script>



</body>
</html>