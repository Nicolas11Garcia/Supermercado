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

  <link href="
  https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
  " rel="stylesheet">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/modulo-sesion-usuario/modulo-sesion-usuario.css">
    <script src="../assets/js/main.js" defer></script>

    <title>Kala - Registro de usuarios</title>
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
                        <a class="texto-pequeño" href="iniciarsesion.php">Iniciar sesión</a>
                        <p class="texto-pequeño" style="margin-left: 5px; margin-right: 5px;">|</p>
                        <a class="texto-pequeño" href="registrodeusuario.php">Registrarse</a>
                        
                        ';
                    }
                ?>
            </div>
        </div>
    </div>


    <header>
        <div class="container">
            <div class="izquierda-header">
                <a href="../index.html"><img class="logo" src="../assets/imagenes/logo.jpg" alt="logo"></a>

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

    <section class="main" id="main">
        <h2 class="titulo-h2">Registro de usuarios</h2>
        <form class="form-inicio-registro" action="" method="POST">
        <?php
        include('../php/class/Dao.php');

        if(isset($_POST['button'])){

                $dao = new Dao();

                $correo = $_POST['correo'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $contrasena = $_POST['contraseña'];

                $dao->registrar_cliente($correo,$nombre,$apellido,$contrasena);
                echo '<script>window.location.href = "iniciarsesion.php";</script>';

                
        }
        ?>



            <div class="elementos-input">
                <label class="label-input">Correo electronico:</label>
                <input name="correo" class="input-text" type="email" placeholder="Ingrese su correo electronico">
            </div>

            <div class="elementos-input">
                <label class="label-input">Nombre:</label>
                <input name="nombre" class="input-text" type="text" placeholder="Ingrese su nombre">
            </div>

            <div class="elementos-input">
                <label class="label-input">Apellido:</label>
                <input name="apellido" class="input-text" type="text" placeholder="Ingrese su Apellido">
            </div>

            <div class="elementos-input">
                <label class="label-input">Contraseña:</label>
                <input name="contraseña" class="input-text" type="password" placeholder="Ingrese su contraseña">
            </div>

            <button class="btn-verde" id="btn-verde"  name="button">Registrarse</button>
            <a class="consejo-cuenta" href="registrodeusuario.html">Ya tengo cuenta,<p>ir al inicio de sesión</p></a>
        </form>


        <div  id="opacidad">

        </div>

        <div style="height: 600px;">

        </div>

    </section>






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