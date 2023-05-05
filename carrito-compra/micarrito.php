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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


  <link href="
  https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
  " rel="stylesheet">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/carrito-compra/micarrito.css">
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
                    <div class="carrito" count="2">
                        <a class="micarrito"  href="" style="text-decoration: none; color: black;"><i class="fi fi-rr-shopping-cart"></i></a>
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

    <main class="main" id="main" style ="margin-bottom:40px">

        <section class="container-main seccion-carrito">
            <h2 class="titulo-h2">Mi carrito</h2>

            <div class="contenedor-izquierda-derecha-carrito" >
                    <?php
                    $existen_productos = 0;
                    $subtotal_producto_individual = 0;
                    $subtotal_general = 0;
                    $envio = 0;


                    if (isset($_SESSION["id_usuario"]) == true){
                        $id_cliente = $_SESSION['id_usuario'];
                        $items_dentro_de_carrito = $dao->mostrarItemsCarrito($id_cliente);

                        //NO HAY ITEMS EN EL CARRITO
                        if($items_dentro_de_carrito == 0){

                        }

                        //HAY ITEMS EN EL CARRITO
                        else if($items_dentro_de_carrito >= 1){

                            $existen_productos = 1;
                            $i = 0; //REEMPLAZA LA KEY 

                            echo '<div class="izquierda">';

                            //IMPRIMIENDO CADA ITEM dentro del carro
                            foreach ($items_dentro_de_carrito as $k) {
                                $subtotal_producto_individual = $k->getPrecioOferta() *  $k->getCantidadEnCarrito();

                                echo '
                                    <div class="item-carrito" id="item-carrito'.$k->getId().'">
                                        <div class="img-text">
                                            <div class="img-carrito">
                                                <img src="../assets/imagenes/Productos/'.$k->getImagen().'">
                                            </div>
                    
                                            <div class="contenedor-detalles-carrito">
                                                <a href="" class="titulo-producto">'.$k->getTitulo().'</a>
                                                <a href="" class="marca">'.$k->getMarca().'</a>
                                            </div>
                                        </div>
                                        <form class="form-cantidad-button" method="POST" id="eliminarItemCarrito">
                                            <div class="contenedor-cantidad btn-mas">
                                                <span class="cantidad-button menos-button" id="menos-'.$i.'-'.$k->getId().'">-</span>
                                                <input name="cantidad_seleccionada" type="text" class="cantidad-numero numero" id="cantidad-numero'.$i.'" value ="'.$k->getCantidadEnCarrito().'"></input>
                                                <span class="cantidad-button mas-button" id="mas-'.$i.'-'.$k->getId().'">+</span>
                                            </div>
                                            <div class="precio-carrito">
                                                <p class="total-precio-producto-carrito" id="total-precio'.$i.'">$'.number_format($subtotal_producto_individual, 0, ',', '.').'</p>
                                            </div>
                                            <div class="opciones">
                                                <div class="none">
                                                </div>
                                                <div class="opciones-derecha">
                                                    <div class="eliminar-boton-i">
                                                        <div></div>
                                                        <div>
                                                            <input type="hidden" name="eliminar_id_item_carrito " value="'.$i.'">
                                                            <button id="'.$k->getId().'" type="button" class="eliminar-producto-carrito eliminar_del_carrito_button"><i class="fi fi-rr-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    ';
                                $subtotal_general = $subtotal_producto_individual + $subtotal_general;
                                $i = $i + 1;
                            }
                            echo '</div>';

                        }



                    }

                    else if((isset($_SESSION["id_usuario"]) == false)){
                        //SI EXISTE LA LISTA (osea si agrego productos al carrito)
                        if(isset($_SESSION["id_productos_carrito"])){
                            //SI HAY 1 O MAS PRODUCTOS EN EL CARRITO (PUEDE EXISTIR LA LISTA PERO QUE NO TENGA PRODUCTOS)
                            if(sizeof($_SESSION["id_productos_carrito"]) >= 1){
                                $existen_productos = 1;
                                
                                echo '<div class="izquierda">'; //Esta aqui para que el texto de que NO HAY Productos este centrado

                                foreach($_SESSION['id_productos_carrito'] as $key => $value){
                                    //OBTENEMOS TODOS LOS ID DE LOS PRODUCTOS AGREGADO AL CARRO
                                    $lista_id_en_carrito = $dao->mostrarProductoPorId($value);
                                    //IMPRIMIMOS LOS PRODUCTOS
                                    foreach ($lista_id_en_carrito as $k) {
                                        $subtotal_producto_individual = $k->getPrecioOferta() *  $_SESSION["cantidad"][$key];
                                        echo '
                                        <div class="item-carrito" id="item-carrito'.$key.'">
                                            <div class="img-text">
                                                <div class="img-carrito">
                                                    <img src="../assets/imagenes/Productos/'.$k->getImagen().'">
                                                </div>
                        
                                                <div class="contenedor-detalles-carrito">
                                                    <a href="" class="titulo-producto">'.$k->getTitulo().'</a>
                                                    <a href="" class="marca">'.$k->getMarca().'</a>
                                                </div>
                                            </div>
                                            <form class="form-cantidad-button" method="POST" id="eliminarItemCarrito">
                                                <div class="contenedor-cantidad btn-mas">
                                                    <span class="cantidad-button menos-button" id="menos-'.$key.'-'.$value.'">-</span>
                                                    <input name="cantidad_seleccionada" type="text" class="cantidad-numero numero" id="cantidad-numero'.$key.'" value ="'.$_SESSION['cantidad'][$key].'"></input>
                                                    <span class="cantidad-button mas-button" id="mas-'.$key.'-'.$value.'">+</span>
                                                </div>
                                                <div class="precio-carrito">
                                                    <p class="total-precio-producto-carrito" id="total-precio'.$key.'">$'.number_format($subtotal_producto_individual, 0, ',', '.').'</p>
                                                </div>
                                                <div class="opciones">
                                                    <div class="none">
                                                    </div>
                                                    <div class="opciones-derecha">
                                                        <div class="eliminar-boton-i">
                                                            <div></div>
                                                            <div>
                                                                <input type="hidden" name="eliminar_id_item_carrito " value="'.$key.'">
                                                                <button id="'.$key.'" type="button" class="eliminar-producto-carrito eliminar_del_carrito_button"><i class="fi fi-rr-trash"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        ';
                                    $subtotal_general = $subtotal_producto_individual + $subtotal_general;
                                    
                                    }
                                }
                                
                                echo '</div>';
                                
                            }
                        }
                    }

                        
                    ?>

                <?php
                if($existen_productos >= 1){
                        echo '
                        <div class="derecha">
                            <div class="contenedor-pecios-lados">
                                <p class="plomo">Subtotal:</p>
                                <p class="negro-precios" id="subtotal-compra">$'.number_format($subtotal_general, 0, ',', '.').'</p>
                            </div>
        
                            <div class="contenedor-pecios-lados">
                                <p class="plomo">Envio:</p>
                                <p class="negro-precios">$'.$envio.'</p>
                            </div>
        
                            <div class="contenedor-pecios-lados total-contenedor">
                                <p class="total">Total:</p>
                                <p class="total-precio" id="total-general">$';
                                    $total_general = $subtotal_general + $envio;
        
                                    echo ''.number_format($total_general, 0, ',', '.').' 
                                </p>
                            </div>
        
                            <button class="btn-verde" type="button" id="boton-comprar-ahora">Comprar ahora</button>
                        </div>
                        
                        ';
                }
                else{
                    echo '
                        <p style="text-align: center; width: 100%; font-size:14px" >Su carrito actualmente está vacío.</p>
                    ';
                }
                ?>

            </div>
        </section>
        
        
        <div  id="respuesta">
        </div>


        <div  id="opacidad">
        </div>

    </main>






    




    <script>
        //Ir a pagar
        $("#boton-comprar-ahora").click(function(){
            window.location.href = "procesoCompra.php";

        });
    </script>

    

    <script>
    //ELIMINAR SIN ACTUALIZAR
            $('.eliminar_del_carrito_button').click(function(){
                Swal.fire({
                    title: '¿Estás seguro de que quieres eliminar el producto del carrito?',
                    icon: 'warning',
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Eliminar',
                    cancelButtonColor: '#9fa3a9',
                    confirmButtonColor: '#FF6969',
                }).then((result) => {
                if (result.isConfirmed) {
                //Recuperar id del form
                var id = $(this).attr("id");
                ///convertirlo en string
                var dataString = 'key_eliminar_item_carrito='+ id;

                    $.ajax({
                        type:'POST',
                        url:'eliminarItemCarrito.php', //URL
                        data: dataString,
                        success: function(data)
                        {
                            $("#item-carrito" + id).hide("slow");
                        // $("#registro" + id).remove();
                            saberTotales();

                        }
                    }); 
                    }
                    });
                
                    
                
            });
    </script>






    <script>
    //ACTUALIZAR TOTAL
    //se mandan las variables cuando se apreta el boton de aumentar o disminuir
    function ActualizarItemCarrito(key,id_actualizar,cantidad){
        key_ = key;
        $.ajax({
                type:'POST',
                url:'actualizarItemCarrito.php', //URL
                data: {key,id_actualizar,cantidad},
                success: function(res){
                    //Quitamos espacios de la respuesta de php
                    respu = res.trim();
                    $("#total-precio" + key_).html(res);
                    saberTotales();

                }
        });

    }
    </script>

    <script>
    //SABER TOTALES
    //SE IMPLEMENTA EN LA FUNCION DE ACTUALIZAR O CUANDO SE HACE CLIC A AUMENTAR O DISMINUIR
    function saberTotales(){
        $.ajax({
                type:'POST',
                url:'calcularTotales.php', //URL
                data: "", //no entrego ningun valor a php
                success: function(res){
                    $("#subtotal-compra").html(res);
                    $("#total-general").html(res);

                    console.log(res);
                }
        });
    }
    </script>

    <script>
        document.querySelectorAll(".btn-mas>span:first-child, .btn-mas>span:last-child").forEach(span => {
        span.addEventListener("click", function(el) {

            const cantidad_input =this.parentElement.querySelector(".numero");

            let num = cantidad_input.value;

            //Esta variabla devuelve "menos-0" donde 0 es la posicion del producto, solo queremos el numero
            var id_a_actualizar_sin_recortar = $(this).attr("id");
                    
            //variable en cadenas [0]"menos",[1] "0"; 
            var id_a_actualizar_en_cadenas = id_a_actualizar_sin_recortar.split("-");

            //key a actualizar limpio ademas de su ID  de producto
            var key_actualizar = id_a_actualizar_en_cadenas[1];
            var id_actualizar = id_a_actualizar_en_cadenas[2];


            if (this.innerText=="+") {
                // incrementamos
                num++;
                cantidad_input.value = num;
                var cantidad_nueva = cantidad_input.value;

                ActualizarItemCarrito(key_actualizar,id_actualizar,cantidad_nueva);

            } 

            else  if (this.innerText=="-") {
                // decrementanos
                if(num > 1){
                    num = num - 1;
                    cantidad_input.value = num;
                    var cantidad_nueva = cantidad_input.value;

                    ActualizarItemCarrito(key_actualizar,id_actualizar,cantidad_nueva);
                }

            }
        });
    });
    </script>

















    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</body>
</html>