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

    <link rel="shortcut icon" href="../assets/imagenes/iconKala.jpg" type="image/x-icon">


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/modulo-sesion-usuario/modulo-sesion-usuario.css">
    <link rel="stylesheet" href="../assets/css/carrito-compra/micarrito.css">
    <link rel="stylesheet" href="../assets/css/carrito-compra/procesoCompra.css">
    <script src="../assets/js/main.js" defer></script>

    <style>
        .container-main{
            max-width: 1400px;
        }
    </style>

    <title>Kala - Iniciar sesión</title>
</head>
<body>

    <header>
        <div class="container">

            <div class="izquierda-header-compra"><a href="../carrito-compra/micarrito.php" class="texto-pequeño"><i class="fi fi-rr-angle-left"></i>Volver al carrito</a></div>

            <div class="medio-header-compra">
                <a href="../index.html"><img class="logo" src="../assets/imagenes/logo.jpg" alt="logo"></a>
            </div>

            <div class="derecha-header-compra"></div>

        </div>

    </header>


    <section class="container-main seccion-carrito" id="main">
        <h2 class="titulo-h2">Proceso de compra</h2>
            <div class="contenedor-izquierda-derecha-carrito">
                <div class="izquierda">
                    <div class="contenedor-info-procesada oculto"  id="info-procesada" style="height: 0px;">
                        <div class="informacion-de-contacto">
                            <div class="contenedor-info-cliente">
                                <h3 class="titulo-h3 h3-revision">1° Informacion de contacto</h3>
    
                                <div class="info-cliente">
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente" >Correo:</p>
                                        <p class="dato-cliente" id="correo-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Nombre:</p>
                                        <p class="dato-cliente" id="nombre-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Apellido:</p>
                                        <p class="dato-cliente" id="apellido-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Rut:</p>
                                        <p class="dato-cliente" id="rut-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Telefono:</p>
                                        <p class="dato-cliente" id="telefono-pre"></p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="btn-editar" id="editar-1">
                                <i class="fi fi-rr-edit"></i>
                                <p class="dato-cliente" >Editar</p>
                            </div>
                        </div>
    
                        <div class="informacion-de-contacto"">
                            <div class="contenedor-info-cliente">
                                <h3 class="titulo-h3 h3-revision">2° Envio</h3>
    
                                <div class="info-cliente">
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Region:</p>
                                        <p class="dato-cliente" id="region-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Comuna:</p>
                                        <p class="dato-cliente" id="comuna-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Calle:</p>
                                        <p class="dato-cliente" id="calle-pre"></p>
                                    </div>
                                    <div class="dato-ciente-flex">
                                        <p class="dato-cliente">Numero:</p>
                                        <p class="dato-cliente" id="numero-pre"></p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="btn-editar" id="editar-2">
                                <i class="fi fi-rr-edit"></i>
                                <p class="dato-cliente" >Editar</p>
                            </div>
                        </div>
    
                        <div>
                            <h3 class="titulo-h3">3° Pago</h3>
                            <div class="contenedor-img-texto">
                                <div class="img-webpay">
                                    <img src="../assets/imagenes/webpay.png">
                                </div>
                                <p class="dato-cliente" >Luego de hacer clic en “Finalizar el pedido”, serás redirigido a WebPay <br> para completar tu compra de forma segura.</p>
    
                            </div>
                        </div>
                    </div>
                    <form class="form-informacion-contacto" id="proceso-info" style="margin-bottom: 15px;">
                        <h3 class="titulo-h3">1° Informacion de contacto</h3>

                        <div class="elementos-input ">
                            <label class="label-input">Correo electronico</label>
                            <input name="correo" id="correo" class="input-text input-correo" type="email" placeholder="Ingrese su correo electronico">
                        </div>

                        <div class="flex-input">
                            <div class="elementos-input">
                                <label class="label-input">Nombre:</label>
                                <input name="nombre" id="nombre" class="input-text input-flex-item" type="text" placeholder="Ingrese su nombre">
                            </div>
                            <div class="elementos-input ">
                                <label class="label-input">Apellido:</label>
                                <input name="apellido" id="apellido" class="input-text input-flex-item" type="text" placeholder="Ingrese su apellido">
                            </div>
                        </div>

                        <div class="flex-input">
                            <div class="elementos-input">
                                <label class="label-input">Rut:</label>
                                <input name="rut" onkeyup="formatRut(this)" id="rut" class="input-text input-flex-item" type="text" placeholder="Ingrese su rut">
                            </div>
                            <div class="elementos-input ">
                                <label class="label-input">Telefono:</label>
                                <input name="telefono" id="telefono" class="input-text input-flex-item" type="tel" placeholder="Ingrese su Telefono">
                            </div>
                        </div>

                        <h3 class="titulo-h3" style="margin-top: 40px;">2° Envio</h3>

                        <div class="flex-input">
                            <div class="elementos-input">
                                <label class="label-input">Region:</label>
                                <select name="select" id="region" class="input-text input-flex-item">
                                    <option disabled selected="Seleccionar">Selecciona su region</option>
                                    <option value="VI Region">VI region</option>
                                </select>
                            </div>
                            <div class="elementos-input">
                                <label class="label-input">Comuna:</label>
                                <select name="select" id="comuna" class="input-text input-flex-item">
                                    <option disabled selected="Seleccionar">Seleccione su comuna</option>
                                    <option value="rancagua">Rancagua</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex-input">
                            <div class="elementos-input">
                                <label class="label-input" >Calle:</label>
                                <input name="correo" id="calle" class="input-text input-flex-item" type="tel" placeholder="Ingrese numero">

                            </div>
                            <div class="elementos-input ">
                                <label class="label-input" >Numero:</label>
                                <input name="correo" id="numero" class="input-text input-flex-item" type="tel" placeholder="Ingrese numero">
                            </div>
                        </div>



                    </form>



                </div>


                <div class="derecha">
                    <div class="productos-comprados">
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

                                //IMPRIMIENDO CADA ITEM dentro del carro
                                foreach ($items_dentro_de_carrito as $k) {
                                    $subtotal_producto_individual = 0;
                                    $precio = 0;
                                    if($k->getOferta() == 1){
                                        $subtotal_producto_individual = $k->getPrecioOferta() *  $k->getCantidadEnCarrito();
                                        $precio = $k->getPrecioOferta();
                                    }
                                    else{
                                        $subtotal_producto_individual = $k->getPrecioVenta() *  $k->getCantidadEnCarrito();
                                        $precio = $k->getPrecioVenta();
    
                                    }
                                    echo '
                                    <div class="item-comprado">
                                        <div class="img-item-comprado">
                                            <img src="../assets/imagenes/Productos/'.$k->getImagen().'">
                                        </div>
                                        <div class="detalles-carro">
                                            <p class="titulo-producto">'.$k->getTitulo().'</p>
                                            <p class="marca">'.$k->getMarca().'</p>
                                            <p class="precio-cantidad">$'.number_format($precio, 0, ',', '.').' * '.$k->getCantidadEnCarrito().'</p>
                                        </div>
                
                                        <div class="precio-item">
                                            <p>$'.number_format($subtotal_producto_individual, 0, ',', '.').'</p>
                                        </div>
                                    </div>
                                    
                                    ';
                                    $subtotal_general = $subtotal_producto_individual + $subtotal_general;
                                }
                            }
                        }

                        else if((isset($_SESSION["id_usuario"]) == false)){
                            //SI EXISTE LA LISTA (osea si agrego productos al carrito)
                            if(isset($_SESSION["id_productos_carrito"])){ //No es necesario el else porque saldra la alerta de que no tiene productos en el carrito porque la variable "existen productos esta en 0"
                                //SI HAY 1 O MAS PRODUCTOS EN EL CARRITO (PUEDE EXISTIR LA LISTA PERO QUE NO TENGA PRODUCTOS)
                                if(sizeof($_SESSION["id_productos_carrito"]) >= 1){
                                    $existen_productos = 1;

                                    foreach($_SESSION['id_productos_carrito'] as $key => $value){
                                        //OBTENEMOS TODOS LOS ID DE LOS PRODUCTOS AGREGADO AL CARRO
                                        $lista_id_en_carrito = $dao->mostrarProductoPorId($value);
                                        //IMPRIMIMOS LOS PRODUCTOS
                                        foreach ($lista_id_en_carrito as $k) {
                                            $subtotal_producto_individual = 0;
                                            $precio = 0;

                                            if($k->getOferta() == 1){
                                                $subtotal_producto_individual = $k->getPrecioOferta() *  $_SESSION["cantidad"][$key];
                                                $precio = $k->getPrecioOferta();
                                            }
    
                                            else{
                                                $subtotal_producto_individual = $k->getPrecioVenta() *  $_SESSION["cantidad"][$key];
                                                $precio = $k->getPrecioVenta();

                                            }
                                            echo '
                                            <div class="item-comprado">
                                                <div class="img-item-comprado">
                                                    <img src="../assets/imagenes/Productos/'.$k->getImagen().'">
                                                </div>
                                                <div class="detalles-carro">
                                                    <p class="titulo-producto">'.$k->getTitulo().'</p>
                                                    <p class="marca">'.$k->getMarca().'</p>
                                                    <p class="precio-cantidad">$'.number_format($precio, 0, ',', '.').' * '.$_SESSION["cantidad"][$key].'</p>
                                                </div>
                        
                                                <div class="precio-item">
                                                    <p>$'.number_format($subtotal_producto_individual, 0, ',', '.').'</p>
                                                </div>
                                            </div>
                                            
                                            ';
                                            $subtotal_general = $subtotal_producto_individual + $subtotal_general;

                                        }
                                    }


                                }
                            }
                        }

                        
                        ?>


                    </div>


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
                                    <p class="negro-precios" id="precio-envio">$'.$envio.'</p>
                                </div>
            
                                <div class="contenedor-pecios-lados total-contenedor">
                                    <p class="total">Total:</p>
                                    <p class="total-precio" id="total-general">$';
                                        $total_general = $subtotal_general + $envio;
            
                                        echo ''.number_format($total_general, 0, ',', '.').' 
                                    </p>
                                </div>
            
                                <button class="btn-verde" type="button" id="continuar-a-pagar">Continuar</button>
                                <p id="warning"></p>
                            </div>
                            
                            ';
                    }

                    else{
                        echo '<script>window.location.href = "micarrito.php";</script>';

                    }
                    ?>
                </div>
            </div>


    </section>

    

    <div id="respu">

    </div>












    <script>
        //ENVIO LA COMUNA QUE SELEECIONO A CALCULAR ENVIO PARA QUE CALCULE EL NUEVO TOTAL
        comuna.addEventListener('change',
        function(){
            var selectedOption = this.options[comuna.selectedIndex];
            document.getElementById("comuna-pre").innerHTML = selectedOption.text;
            comuna_texto = selectedOption.value;

            $.ajax({
                type:'POST',
                url:'calcularEnvio.php', //URL
                data: {comuna_texto},
                success: function(res){
                    respu = res.trim();

                    envio_total_general = respu.split(":"); //SEPARO LA RESPUESTA SENG
                    $("#total-general").html(envio_total_general[1]);
                    $("#precio-envio").html(envio_total_general[3]);
                }
            });

        });

        function formatRut(input) {
        // Obtenemos el valor actual del input
        let rut = input.value.replace(/\./g, '').replace(/\-/g, '');
      
        // Eliminamos cualquier caracter que no sea un número o una letra 'k' o 'K'
        rut = rut.replace(/[^\dkK]/g, '');
      
        // Formateamos el RUT agregando puntos y guión
        rut = rut.replace(/^(\d{1,2})(\d{3})(\d{3})([\dkK]{1})$/, '$1.$2.$3-$4');
      
        // Actualizamos el valor del input con el RUT formateado
        input.value = rut;
        }


    </script>


    <script>
        //PREVISUALIZACION para la siguiente etapa
        //INFO 1
        var correo = document.getElementById('correo');
            correo.addEventListener('keyup',(event) =>{
            var prev= correo.value;
            document.getElementById("correo-pre").innerHTML = prev;
        });
        var nombre = document.getElementById('nombre');
            nombre.addEventListener('keyup',(event) =>{
            var prev= nombre.value;
            document.getElementById("nombre-pre").innerHTML = prev;
        });
        var apellido = document.getElementById('apellido');
            apellido.addEventListener('keyup',(event) =>{
            var prev= apellido.value;
            document.getElementById("apellido-pre").innerHTML = prev;
        });
        var rut = document.getElementById('rut');
            rut.addEventListener('keyup',(event) =>{
            var prev= rut.value;
            document.getElementById("rut-pre").innerHTML = prev;
        });
        var telefono = document.getElementById('telefono');
            telefono.addEventListener('keyup',(event) =>{
            var prev= telefono.value;
            document.getElementById("telefono-pre").innerHTML = prev;
        });


        //INFO 2s
        region.addEventListener('change',
        function(){
            var selectedOption = this.options[region.selectedIndex];
            document.getElementById("region-pre").innerHTML = selectedOption.text;
        });

        comuna.addEventListener('change',
        function(){
            var selectedOption = this.options[comuna.selectedIndex];
            document.getElementById("comuna-pre").innerHTML = selectedOption.text;
        });

        var calle = document.getElementById('calle');
            calle.addEventListener('keyup',(event) =>{
            var prev= calle.value;
            document.getElementById("calle-pre").innerHTML = prev;
        });
        var numero = document.getElementById('numero');
            numero.addEventListener('keyup',(event) =>{
            var prev= numero.value;
            document.getElementById("numero-pre").innerHTML = prev;
        });








            contador_clic_boton = 0;


            $('#continuar-a-pagar').click(function(){
                const correo = document.getElementById("correo").value;
                const nombre = document.getElementById("nombre").value;
                const apellido = document.getElementById("apellido").value;
                const rut = document.getElementById("rut").value;
                const telefono = document.getElementById("telefono").value;

                const region = document.getElementById("region").value;
                const comuna = document.getElementById("comuna").value;
                const calle = document.getElementById("calle").value;
                const numero = document.getElementById("numero").value;

                const warning = document.getElementById("warning");



                //OCULTAR 1 FORM Y ACTIVAR 2DO
                const proceso_info = document.getElementById("proceso-info");
                const info_procesada = document.getElementById("info-procesada");

                const cambiar_btn_a_pagar = document.getElementById("continuar-a-pagar");
                cambiar_btn_a_pagar.innerHTML = "Pagar";

                

                info_procesada.style.height = "min-height"; //Se reestablece height

                $("#proceso-info").addClass("oculto");
                $("#proceso-info").removeClass("visible");

                $("#info-procesada").addClass("visible");
                $("#info-procesada").removeClass("oculto");

                contador_clic_boton =  contador_clic_boton + 1;

                if(contador_clic_boton == 2){
                    $.ajax({
                        type:'POST',
                        url:'ingresarCompra.php', //URL
                        data: {correo,nombre,apellido,rut,telefono,region,comuna,calle,numero},
                        success: function(res){
                            location.href = "procesoCarga.html"
                            $.ajax({
                                type:'POST',
                                url:'enviarCorreo.php', //URL
                                data: {correo,nombre,apellido,rut,telefono,region,comuna,calle,numero},
                                success: function(res){
                                    console.log(res)
                                }
                            });
                        }
                    });



                }

            });

            $('#editar-1 , #editar-2').click(function(){
                //OCULTAR 1 FORM Y ACTIVAR 2DO
                const cambiar_btn_a_pagar = document.getElementById("continuar-a-pagar");
                cambiar_btn_a_pagar.innerHTML = "Continuar";


                const proceso_info = document.getElementById("proceso-info");
                const info_procesada = document.getElementById("info-procesada");

                $("#proceso-info").addClass("visible");
                $("#proceso-info").removeClass("oculto");

                $("#info-procesada").addClass("oculto");
                $("#info-procesada").removeClass("visible");
                
                contador_clic_boton = contador_clic_boton - 1;


            });

            console.log(contador_clic_boton);

    </script>



    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>

</body>
</html>