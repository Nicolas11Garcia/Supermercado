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

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/ingresarproducto.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/generarreporte.css">
    <link rel="stylesheet" href="../../assets/css/menu-admin/crear-oferta/crearoferta.css">

    <title>Menu cajero - Kala</title>

    <style>
    .swal2-popup {
      border: 2px solid black;
      
    }
  </style>
</head>
<body>

    <h2>Crear oferta</h2>
    <div class="flex-opciones" id="opciones-producto">
        <div class="1producto div-producto" id="1-producto-opcion">
            <div>
                <i class="fi fi-rr-apple-whole fruta"></i>
            </div>
            <p>Oferta de 1 producto</p>
        </div>
        <div class="2producto div-producto" id="2-producto-opcion">
            <div>
                <i class="fi fi-rr-grape fruta"></i>
                <i class="fi fi-rr-strawberry fruta"></i>
            </div>
            <p>Oferta de 2 productos</p>

        </div>
    </div>


    <form class="form-ingreso ingreso-1-producto oculto" id="1-producto-form">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="input-normal">
                    <label class="label-input">ID de producto:</label>
                    <div class="flex-input-marca-titulo-id">
                        <input class="input-text" onkeyup="mostrar()" type="text" id="id_producto" placeholder="Ingrese ID de producto">
                        <div class="btn-buscar-titulo abrir-modal" id="1-1">
                            <p>Buscar por titulo <br> o marca</p>
                        </div>
                    </div>

                </div>

                <div class="input-normal">
                    <label class="label-input">A partir de esta cantidad se genera la oferta:</label>
                    <input onkeyup="mostrar()" require class="input-text" type="text" id="cantidad-oferta" placeholder="Ingrese cantidad"></input>
                </div>

                <div class="input-normal">
                    <label class="label-input">Porcentaje de descuento por unidad (%):</label>
                    <input onkeyup="mostrar()" require class="input-text" type="number" id="porcentaje" placeholder="Ingrese porcentaje de descuento"></input>
                </div>
            </div>

            <div class="derecha-form">
                    <div class="item" id="item">
                    </div>
            </div>
        </div>
        <div class="div-button" style="display:flex; align-items: center; justify-content: center;">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="crear-oferta-1">Crear oferta</button>
            
            <div class="center-button volver-button" id="volver-button">
                <p href="crearoferta.html" class="span-plomo" style="font-size: 14px; display: block; margin-bottom: 30px;">Volver</p>
            </div>
            
        </div>
    </form>

    <form class="oculto" id="2-producto-form">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="input-normal">
                    <label class="label-input">ID de producto 1:</label>
                    <div class="flex-input-marca-titulo-id">
                        <input class="input-text" onkeyup="mostrar2Productos()" type="text" id="id_producto_1" placeholder="Ingrese ID de producto">
                        <div class="btn-buscar-titulo abrir-modal" id="2-1">
                            <p>Buscar por titulo <br> o marca</p>
                        </div>
                    </div>
                </div>

                <div class="input-normal">
                    <label class="label-input">ID de producto 2:</label>
                    <div class="flex-input-marca-titulo-id">
                        <input class="input-text" onkeyup="mostrar2Productos()" type="text" id="id_producto_2" placeholder="Ingrese ID de producto">
                        <div class="btn-buscar-titulo abrir-modal" id="2-2">
                            <p>Buscar por titulo <br> o marca</p>
                        </div>
                    </div>
                </div>

                <div class="input-normal">
                    <label class="label-input">Porcentaje de descuento si lleva ambos (%):</label>
                    <input onkeyup="mostrar2Productos()" require class="input-text" type="number" id="porcentaje-2-producto" placeholder="Ingrese porcentaje de descuento"></input>
                </div>
            </div>

            <div class="derecha-form">
                    <div class="item" id="item-2-productos" style="display: block;">
                    </div>
            </div>
        </div>
        <div class="div-button" style="display:flex; align-items: center; justify-content: center;">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="crear-oferta-2">Crear oferta</button>
            
            <div class="center-button volver-button" id="volver-button">
                <p class="span-plomo" style="font-size: 14px; display: block; margin-bottom: 30px;">Volver</p>
            </div>
            
        </div>
    </form>


    <section class="modal modal1-1" id="modal1-1">
        <div class="modal__container" style="border-radius: 10px;">
            <div class="input-normal">
                <label class="label-input">Buscar producto por titulo o marca:</label>
                <div class="flex-rut-botones">
                    <input onkeyup="mostrarTitulo()" class="input-text" type="text" id="titulo-producto" placeholder="Ingrese titulo del producto">
                </div>
            </div>


            <table id="tabla-titulo">
                <thead>
                    <tr>
                        <th class="titular-fila">ID</th>
                        <th class="titular-fila">Imagen</th>
                        <th class="titular-fila">Titulo</th>
                        <th class="titular-fila">Marca</th>
                        <th class="titular-fila">Precio venta</th>
                        <th class="titular-fila">Precio oferta</th>
                        <th class="titular-fila"></th>
                    </tr>
                </thead>
                

                <?php
                
                $lista_productos = $dao->mostrarTodosLosProductos();

                //Imprimimos los productos que coinciden con lo que escribe el usuario
                foreach($lista_productos as $k){
                    echo '
                    <tr class="producto-item" id="item-producto'.$k->getId().'">
                        <td style="width: 120px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 150px;">'.$k->getMarca().'</td>
                        <td style="width: 150px;">'.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></td>
                        <td style="width: 150px;">'.number_format($k->getPrecioOferta(), 0, ',', '.'). '<span style="color: #51AA1B;"> (O.F)</span></span></td>
                        <td style="width: 150px;">'.$k->getStockActual().'</td>
                        <td style="width: 150px;"><button type="button" class="btn agregar-al-detalle seleccionar" style="min-width: 100px; width:150px" id="'.$k->getId().'">Seleccionar</button></td>
                    </tr>

                    ';

                }
                ?>




            </table>

            <div class="close modal__close" id="cerrar-modal">
                <p>X</p>
            </div>
        </div>

    </section>


    <section class="modal modal2-1" id="modal2-1">
        <div class="modal__container" style="border-radius: 10px;">
            <div class="input-normal">
                <label class="label-input">Buscar producto por titulo o marca 2-1:</label>
                <div class="flex-rut-botones">
                    <input onkeyup="mostrarTitulo2_1()" class="input-text" type="text" id="titulo-producto2-1" placeholder="Ingrese titulo del producto">
                </div>
            </div>


            <table id="tabla-titulo-2-1">
                <thead>
                    <tr>
                        <th class="titular-fila">ID</th>
                        <th class="titular-fila">Imagen</th>
                        <th class="titular-fila">Titulo</th>
                        <th class="titular-fila">Marca</th>
                        <th class="titular-fila">Precio venta</th>
                        <th class="titular-fila">Precio oferta</th>
                        <th class="titular-fila"></th>
                    </tr>
                </thead>

                <?php
                
                $lista_productos = $dao->mostrarTodosLosProductos();

                //Imprimimos los productos que coinciden con lo que escribe el usuario
                foreach($lista_productos as $k){
                    echo '
                    <tr class="producto-item" id="item-producto'.$k->getId().'">
                        <td style="width: 120px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 150px;">'.$k->getMarca().'</td>
                        <td style="width: 150px;">'.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></td>
                        <td style="width: 150px;">'.number_format($k->getPrecioOferta(), 0, ',', '.'). '<span style="color: #51AA1B;"> (O.F)</span></span></td>
                        <td style="width: 150px;">'.$k->getStockActual().'</td>
                        <td style="width: 150px;"><button type="button" class="btn agregar-al-detalle seleccionar" style="min-width: 100px; width:150px" id="'.$k->getId().'">Seleccionar</button></td>
                    </tr>

                    ';

                }
                ?>
            </table>

            <div class="close modal__close" id="cerrar-modal2-1">
                <p>X</p>
            </div>
        </div>

    </section>


    <section class="modal modal2-2" id="modal2-2">
        <div class="modal__container" style="border-radius: 10px;">
            <div class="input-normal">
                <label class="label-input">Buscar producto por titulo o marca 2-2:</label>
                <div class="flex-rut-botones">
                    <input onkeyup="mostrarTitulo2_2()" class="input-text" type="text" id="titulo-producto2-2" placeholder="Ingrese titulo del producto">
                </div>
            </div>


            <table id="tabla-titulo-2-2">
                <thead>
                    <tr>
                        <th class="titular-fila">ID</th>
                        <th class="titular-fila">Imagen</th>
                        <th class="titular-fila">Titulo</th>
                        <th class="titular-fila">Marca</th>
                        <th class="titular-fila">Precio venta</th>
                        <th class="titular-fila">Precio oferta</th>
                        <th class="titular-fila"></th>
                    </tr>
                </thead>

                <?php
                
                $lista_productos = $dao->mostrarTodosLosProductos();

                //Imprimimos los productos que coinciden con lo que escribe el usuario
                foreach($lista_productos as $k){
                    echo '
                    <tr class="producto-item" id="item-producto'.$k->getId().'">
                        <td style="width: 120px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 150px;">'.$k->getMarca().'</td>
                        <td style="width: 150px;">'.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></td>
                        <td style="width: 150px;">'.number_format($k->getPrecioOferta(), 0, ',', '.'). '<span style="color: #51AA1B;"> (O.F)</span></span></td>
                        <td style="width: 150px;">'.$k->getStockActual().'</td>
                        <td style="width: 150px;"><button type="button" class="btn agregar-al-detalle seleccionar" style="min-width: 100px; width:150px" id="'.$k->getId().'">Seleccionar</button></td>
                    </tr>

                    ';

                }
                ?>


            </table>

            <div class="close modal__close" id="cerrar-modal2-2">
                <p>X</p>
            </div>
        </div>

    </section>











































<script>
    //OPCION AÑADIR 2 PRODUCTOS EN OFERTA
    function mostrar2Productos() {
            var id_producto_1 = $("#id_producto_1").val();
            var id_producto_2 = $("#id_producto_2").val();

            var porcentaje = $("#porcentaje-2-producto").val();

            $.ajax({
                type:'POST',
                url:'php/mostrarProductoPorID-DosProductos.php', //URL
                data: {id_producto_1,id_producto_2,porcentaje},
                success: function(data){
                    $('#item-2-productos').html(data);
                }
            });
    }


</script>









<script>
        op1_producto_form = document.getElementById('1-producto-opcion');
        op2_producto_form = document.getElementById('2-producto-opcion');

        form_1_producto = document.getElementById('1-producto-form');
        form_2_producto = document.getElementById('2-producto-form');

        opciones_producto = document.getElementById('opciones-producto');


        $("#1-producto-opcion").click(function(){
            form_1_producto.classList.remove("oculto");
            form_1_producto.classList.add("visible");

            opciones_producto.classList.remove("visible");
            opciones_producto.classList.add("oculto");
        });

        $(".volver-button").click(function(){
            form_1_producto.classList.remove("visible");
            form_1_producto.classList.add("oculto");

            form_2_producto.classList.remove("visible");
            form_2_producto.classList.add("oculto");

            opciones_producto.classList.remove("oculto");
            opciones_producto.classList.add("visible");
        });

        $("#2-producto-opcion").click(function(){
            form_2_producto.classList.remove("oculto");
            form_2_producto.classList.add("visible");

            opciones_producto.classList.remove("visible");
            opciones_producto.classList.add("oculto");

        });

        $('.abrir-modal').click(function(){
            var id_modal = $(this).attr("id");
            console.log(id_modal);
            const modal = document.querySelector('.modal'+id_modal);
            modal.classList.add("modal--show");

            //ceramos el modal
            $('.close').click(function(){
                modal.classList.remove("modal--show");
            });

        });








    
    //MODAL 1

    //FUNCION TITULO DEL PRODUCTO LIKE
    //OBTENEMOS TODO LO ESCRITO EN EL TITULO DEL PRODUCTO
    function mostrarTitulo() {
        var titulo_producto = $("#titulo-producto").val();
        var id_producto_valor = document.getElementById('id_producto');

        var cantidad = $("#cantidad-oferta").val();
        var porcentaje = $("#porcentaje").val();


        $.ajax({
            type:'POST',
            url:'php/buscarPorTitulo.php', //URL
            data: {titulo_producto},
            success: function(data){
                $("#tabla-titulo").html(data);
                $('.seleccionar').click(function(){
                    var id_producto = $(this).attr("id");
                    id_producto_valor.value = id_producto;
                    $('.modal').removeClass('modal--show');

                    $.ajax({
                        type:'POST',
                        url:'php/mostrarProductoPorID.php', //URL
                        data: {id_producto,cantidad,porcentaje},
                        success: function(data){
                            $('#item').html(data);
                        }
                    });
                
                });
            }
        });
        
    };



    //MODAL 2-1 
    function mostrarTitulo2_1() {
        var titulo_producto = $("#titulo-producto2-1").val();
        var id_producto_valor = document.getElementById('id_producto_1');
        $.ajax({
            type:'POST',
            url:'php/buscarPorTitulo.php', //URL
            data: {titulo_producto},
            success: function(data){
                $("#tabla-titulo-2-1").html(data);
                $('.seleccionar').click(function(){
                    var id_producto_1 = $(this).attr("id");
                    id_producto_valor.value =id_producto_1;
                    $('.modal').removeClass('modal--show');


                    var id_producto_2 = $("#id_producto_2").val();
                    var porcentaje = $("#porcentaje-2-producto").val();

                    $.ajax({
                        type:'POST',
                        url:'php/mostrarProductoPorID-DosProductos.php', //URL
                        data: {id_producto_1,id_producto_2,porcentaje},
                        success: function(data){
                            $('#item-2-productos').html(data);
                        }
                    });

                });
            }
        });
        
    };

    //MODAL 2-2 
    function mostrarTitulo2_2() {
        var titulo_producto = $("#titulo-producto2-2").val();
        var id_producto_valor = document.getElementById('id_producto_2');
        $.ajax({
            type:'POST',
            url:'php/buscarPorTitulo.php', //URL
            data: {titulo_producto},
            success: function(data){
                $("#tabla-titulo-2-2").html(data);
                $('.seleccionar').click(function(){
                    var id_producto_1 = $("#id_producto_1").val();

                    var id_producto_2 = $(this).attr("id");
                    id_producto_valor.value =id_producto_2;

                    $('.modal').removeClass('modal--show');
                    var porcentaje = $("#porcentaje-2-producto").val();

                    $.ajax({
                        type:'POST',
                        url:'php/mostrarProductoPorID-DosProductos.php', //URL
                        data: {id_producto_1,id_producto_2,porcentaje},
                        success: function(data){
                            $('#item-2-productos').html(data);
                        }
                    });

                });
            }
        });
        
    };


















</script>
















<script>
        function mostrar() {
            var id_producto = $("#id_producto").val();
            var cantidad = $("#cantidad-oferta").val();
            var porcentaje = $("#porcentaje").val();

            $.ajax({
                type:'POST',
                url:'php/mostrarProductoPorID.php', //URL
                data: {id_producto,cantidad,porcentaje},
                success: function(data){
                    $('#item').html(data);
                }
            });
    }






    $('#crear-oferta-1').click(function(){
        var id_producto = $("#id_producto").val();
        var cantidad = $("#cantidad-oferta").val();
        var porcentaje = $("#porcentaje").val();

        if(id_producto != "" && cantidad != "" && porcentaje != ""){
            $.ajax({
                type:'POST',
                url:'php/ingresarOferta1Producto.php', //URL
                data: {id_producto,cantidad,porcentaje},
                success: function(data){
                    trim = data.trim();
                    split = trim.split("$");
                    if(split[0] == "ingresado"){
                        darOpacidad();
                        Swal.fire({
                        title: 'Oferta ingresada',
                        icon: 'success',
                                
                        showConfirmButton: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#61C923',
                        }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = "veroferta.php?id_oferta="+split[1];
                                    ocultarOpacidad();
                                }
                            });
                    }
                    else{
                        alert("error");
                    }
                }
            });
        }
        else{
            console.log("rellena los campos");
        }
    });

    $('#crear-oferta-2').click(function(){
        var id_producto_1 = $("#id_producto_1").val();
        var id_producto_2 = $("#id_producto_2").val();
        var porcentaje = $("#porcentaje-2-producto").val();

        if(id_producto_1 != "" && id_producto_2 != "" && porcentaje != ""){
            $.ajax({
                type:'POST',
                url:'php/ingresarOferta2Producto.php', //URL
                data: {id_producto_1,id_producto_2,porcentaje},
                success: function(data){
                    trim = data.trim();
                    split = trim.split("$");
                    if(split[0] == "ingresado"){
                        darOpacidad();

                        Swal.fire({
                        title: 'Oferta ingresada',
                        icon: 'success',
                                
                        showConfirmButton: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#61C923',
                        }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = "veroferta2Productos.php?id_oferta="+split[1];
                                    ocultarOpacidad();
                                }
                            });
                    }
                    else{
                        alert("error");
                    }
                }
            });
        }
        else{
            console.log("rellena los campos");
        }
    });

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