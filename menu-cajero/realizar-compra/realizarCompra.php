<?php

include('../../php/class/Dao.php');
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

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link href="
  https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
  " rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">

    <style>
        .rut-ofertas{
            display: flex;
            justify-content: space-between;
        }

        .splide{
            width: 450px;
            
        }

        .contenedor-ofertas{
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-right: 10px;
        }

        .item-1-oferta{
            width: 300px;
            height: 200px;
            margin-right: 10px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;

            border: 1px solid #51AA1B;
        }

        .contenedor-img-oferta{
            width: 100px;
        }

        .contenedor-img-oferta img{
            width: 100%;
        }

        .textos{
            text-align: center;
        }

        .texto-oferta{
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .oferta-precio{

            margin-bottom: 7px;
            font-size: 24px;
            font-style: italic;
        }

        .condicion-oferta{
            margin-bottom: 7px;
            font-size: 14px;
        }

        .pecio-normal{
            font-size: 14px;
            color: #707070;
        }

        .splide__pagination__page.is-active{
            background: #51AA1B;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .contenedor-img-oferta-flex{
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contenedor-img-oferta-flex img{
            width: 70px;
        }

        .descuentoporcentaje{
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            max-width: 165px;
        }

    </style>


    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Realizar compra</h2>

    <div class="oculto" style="height: 0px;" id="advertencia-aviso">
        <div class="titular-naranjo">
            <p class="texto-p-advertencia"><i class="fi fi-rr-triangle-warning advertencia-icon"></i>Cliente no registrado en el sistema</p>
        </div>

        <div class="texto-advertencia">
            <p>Por favor ingresa al cliente para continuar con la compra</p>
        </div>

    </div>

    <form>
        <div class="rut-ofertas" id="rut-ofertas">
            <div class="input-normal">
                <label class="label-input">Rut (Puntos y guion se generan automaticamente):</label>
                <div class="flex-rut-botones">
                    <input class="input-text" type="text" id="rut" onkeyup="formatRut(this)" placeholder="Ingrese Rut del cliente" maxlength="12">
                    <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="iniciar-compra">Iniciar compra</button>
                </div>
            </div>

            <div class="contenedor-ofertas" id="ofertas">
                <div class="splide" id="splideuno" aria-labelledby="carousel-heading">
                    <div class="splide__track">
                        <ul class="splide__list">

                            <?php
                            $lista_ofertas = $dao->mostrarOferta1Producto();

                            foreach($lista_ofertas as $k){
                                $precio_oferta_descuento = 0;
                                $precio = 0;

                                echo '
                                <div class="splide__slide item-1-oferta">
                                    <div class="contenedor-img-oferta">
                                        <img src="../../assets/imagenes/Productos/'.$k->getImagen().'">
                                    </div>
                                    <div class="textos">
                                        <p class="texto-oferta">Precio Oferta</p>
                                        ';

                                        if($k->getOferta() == 1){
                                            $precio_oferta_descuento = $k->getPrecioOferta() * $k->getPorcentaje() / 100;
                                            $precio = $k->getPrecioOferta();
                                        }

                                        else{
                                            $precio_oferta_descuento = $k->getPrecioVenta() * $k->getPorcentaje() / 100;
                                            $precio = $k->getPrecioVenta();
                                        }

                                        echo '

                                        <p class="oferta-precio">$'.number_format($precio - $precio_oferta_descuento, 0, ',', '.').'</p>
                                        <p class="condicion-oferta">Llevando '.$k->getCantidad().' unidades</p>
                                        <p class="pecio-normal">Precio normal: '.number_format($precio, 0, ',', '.').'</p>
                                    </div>
                                </div>
                                
                                ';
                            }
                            ?>
                        </ul>
                    </div>
                </div>


                <div class="splide" id="splidedos" aria-labelledby="carousel-heading">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php

                            $lista_2_productos_ofertas = $dao->mostrarOferta2ProductosAll();

                            foreach($lista_2_productos_ofertas as $k){
                                echo '
                                <div class="splide__slide item-1-oferta">
                                    <div class="contenedor-img-oferta contenedor-img-oferta-flex">

                                
                                ';
                                $lista_img_producto_1 = $dao->mostrarProductoPorId($k->getFkProducto1());
                                $lista_img_producto_2 = $dao->mostrarProductoPorId($k->getFkProducto2());

                                foreach($lista_img_producto_1 as $l){
                                    echo '
                                        <img src="../../assets/imagenes/Productos/'.$l->getImagen().'">';
                                
                                foreach($lista_img_producto_2 as $l){
                                    echo '
                                        <img src="../../assets/imagenes/Productos/'.$l->getImagen().'">
                                        
                                        </div>';

                                }

                                echo '
                                    <div class="textos">
                                        <p class="oferta-precio descuentoporcentaje">%'.$k->getPorcentaje().' de descuento Si llevas ambos productos</p>
                                    </div>
                                </div>
                                    ';

                                }
                                
                            }

                            ?>

                        </ul>
                    </div>
                </div>
            </div>

        </div>


        <div class="contenedor-agregar-cliente oculto" id="contenedor-agregar-cliente">
            <div class="flex-input" style="gap: 30px;">
                <div class="input-normal">
                    <label class="label-input">Nombre:</label>
                    <input style="width: 310px;" class="input-text" type="text" id="nombre" placeholder="Ingrese nombre del cliente">
                </div>
    
                <div class="input-normal">
                    <label class="label-input">Apellido:</label>
                    <input style="width: 310px;" class="input-text" type="text" id="apellido" placeholder="Ingrese apellido del cliente">
                </div>

                <div class="input-normal">
                    <label class="label-input">Correo:</label>
                    <input style="width: 310px;" class="input-text" type="text" id="correo" placeholder="Ingrese correo del cliente">
                </div>
            </div>
    
            <div class="flex-button" style="z-index: 100;">
                <button class="btn" type="button" id="registrar-e-iniciar">Registrar e Iniciar compra</button>
                <button type="button" class="btn-cancelar" id="omitir-ingreso-cliente">Omitir</button>
            </div>
        </div>


    </form>













    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>

<script>
var splide = new Splide( '#splideuno', {
  type    : 'loop',
  perPage : 1,
  autoplay: true,
} );

splide.mount();

var splide2 = new Splide( '#splidedos', {
  type    : 'loop',
  perPage : 1,
  autoplay: true,
} );

splide2.mount();
</script>









<script>
    $('#iniciar-compra').click(function(){
        var rut = document.getElementById('rut').value;
        if (validarRut(rut)){
            $.ajax({
                type:'POST',
                url:'php/ingresoRut.php',
                data: {rut},
                success: function(res){
                    respuesta = res.trim();
                    console.log(respuesta);
                    if(respuesta >= 1){
                    window.location.href= "procesoRealizarCompra.php?rut="+rut;
                    }
                    else{
                    const contenedor_agregar_cliente = document.getElementById("contenedor-agregar-cliente");
                    

                    
                    $('#rut-ofertas').height('100px');

                    $("#ofertas").addClass("oculto");
                    $("#ofertas").removeClass("visible");

                    $("#contenedor-agregar-cliente").removeClass("oculto");
                    $("#contenedor-agregar-cliente").addClass("visible");
                    $("#iniciar-compra").addClass("oculto");
                    $("#advertencia-aviso").addClass("visible");
                    $("#advertencia-aviso").removeClass("oculto");
                    $("#advertencia-aviso").addClass("advertencia");
                    $("#advertencia-aviso").css("height","84px");
                    }
                }
            });
        }

        else{
            darOpacidad();

            Swal.fire({
            title: 'El RUT ingresado no es válido, intente nuevamente.',
            icon: 'error',
                    
            showConfirmButton: true,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#61C923',
            }).then((result) => {
                    if (result.isConfirmed) {
                        ocultarOpacidad();
                    }
                });
        }


        
    });

    $('#omitir-ingreso-cliente').click(function(){
        const contenedor_agregar_cliente = document.getElementById("contenedor-agregar-cliente");
        $("#contenedor-agregar-cliente").addClass("oculto");
        $("#contenedor-agregar-cliente").removeClass("visible");
        $("#iniciar-compra").removeClass("oculto");

        $("#advertencia-aviso").removeClass("visible");
        $("#advertencia-aviso").addClass("oculto");
        $("#advertencia-aviso").removeClass("advertencia");
        $("#advertencia-aviso").css("height","0px");

        $("#ofertas").removeClass("oculto");
        $("#ofertas").addClass("visible");
    });

    $('#registrar-e-iniciar').click(function(){
        var rut = document.getElementById('rut').value;
        if (validarRut(rut)){
        var nombre = document.getElementById('nombre').value;
        var apellido = document.getElementById('apellido').value;
        var correo = document.getElementById('correo').value;

            $.ajax({
                type:'POST',
                url:'php/ingresarCliente.php', //URL
                data: {rut,correo,nombre,apellido},
                success: function(res){
                    respuesta = res.trim();

                    if(respuesta >= 1){
                        window.location.href= "procesoRealizarCompra.php?rut="+rut;
                    }
                }
            });
        }
        else {
            darOpacidad();

            Swal.fire({
            title: 'El RUT ingresado no es válido, intente nuevamente.',
            icon: 'error',
                      
            showConfirmButton: true,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#61C923',
            }).then((result) => {
                    if (result.isConfirmed) {
                        ocultarOpacidad();
                    }
                });
        }
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
    

    function validarRut(rut){
        var suma = 0;
        var multiplo = 2;
        var valor;
        rut = rut.replace(".", "");
        rut = rut.replace(".", "");
        rut = rut.replace("-", "");
        var cuerpo = rut.slice(0, -1);
        var dv = rut.slice(-1).toUpperCase();
        for (var i = cuerpo.length - 1; i >= 0; i--) {
            suma += parseInt(cuerpo.charAt(i)) * multiplo;
            if (multiplo < 7) {
            multiplo += 1;
            } else {
            multiplo = 2;
            }
        }
        valor = 11 - (suma % 11);
        if (valor === 10) {
            if (dv === "K" || dv === "k") {
            return true;
            } else {
            return false;
            }
        } else if (valor === 11) {
            if (dv === "0") {
            return true;
            } else {
            return false;
            }
        } else {
            if (parseInt(dv) === valor) {
            return true;
            } else {
            return false;
            }
        }
    }






        function darOpacidad(){
            var backdrop = parent.document.getElementById('backdrop');
            var backdrop_up = parent.document.getElementById('backdrop-up');
            var backdrop_right = parent.document.getElementById('backdrop-right');

            backdrop.classList.add('visible');
            backdrop_up.classList.add('visible');
            backdrop_right.classList.add('visible');
        }

        function ocultarOpacidad(){
            var backdrop = parent.document.getElementById('backdrop');
            var backdrop_up = parent.document.getElementById('backdrop-up');
            var backdrop_right = parent.document.getElementById('backdrop-right');

            backdrop.classList.remove('visible');
            backdrop_up.classList.remove('visible');
            backdrop_right.classList.remove('visible');
        }

    
</script>
</body>

</html>