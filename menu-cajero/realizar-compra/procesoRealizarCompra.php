

<?php
include('../../php/class/Dao.php');
session_start();
$dao = new DAO();

$rut = $_GET['rut'];

$_SESSION['rut'] = $rut;

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

    <style>

        .flex-rut-botones{
            display: flex;
            justify-content: space-between;
            margin-right: 20px;
        }

        .buscar-por-nombre{
            background: #142440;
            width: 200px;
            min-width: 200px;
        }






        .contenedor-proceso-compra{
            position: relative;

        }
        .loader{
            position: absolute;
            width: 94%;
            height: 100%;
            top: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .fondo-blanco{
            background: white;
            position: relative;
            width: 100%;
            height: 100%;
            opacity: 0.8;
        }

        .contenido-loader{
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .pre-loader{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px;
            height: 200px;
            opacity: 1;

            position: relative;
        }

        .pre-loader span{
            height: 28px;
            width: 28px;
            display: block;
            margin: 10px;
            left: 0;
            top: 0;
            border-radius: 50%;
            animation: wave 2s ease-in-out infinite;
        }

        .pre-loader span:nth-child(1){
            left: -4.5em;
            animation-delay: 0s;
            background: #51AA1B;

        }

        .pre-loader span:nth-child(2){
            left: -1.5em;
            animation-delay: 0.1s;
            background: #51AA1B;

        }

        .pre-loader span:nth-child(3){
            left: 1.5em;
            animation-delay: 0.2s;
            background: #51AA1B;


        }

        .pre-loader span:nth-child(4){
            left: 4.5em;
            animation-delay: 0.3s;
            background: #51AA1B;


        }

        @keyframes wave{
            0%,
            75%,
            100%{
                transform: translateY(0) scale(1);
            }

            25%{
                transform: translateY(2.5em);
            }

            50%{
                transform: translateY(-2.5em) scale(1.1);
            }
        }

    </style>

    <title>Menu cajero - Kala</title>
</head>
<body>
    <div class="contenedor-proceso-compra">
        <h2>Realizar compra</h2>
        <div class="contenedor-datos" style="display: block;">
        <?php
            
            $datos_cliente = $dao->datosClienteRut($rut);

            $nombre = "";
            $apellido = "";
            $correo = "";
            $id = "";

            foreach ($datos_cliente as $k) {
                $nombre = $k->getNombre();
                $apellido =  $k->getApellido();
                $correo =   $k->getCorreo();
                $_SESSION['id_cliente_caja'] = $k->getId();
            }

        ?>
            <div class="flex">
                <p class="label-input">Rut: <span class="span-plomo"><?php echo $rut ?></span></p>
            </div>



            <div class="flex">
                <p class="label-input">Nombre: <span class="span-plomo"><?php echo $nombre ?></span></p>
                <p class="label-input">Apellido: <span class="span-plomo"><?php echo $apellido ?></span></p>

            </div>

            <div class="flex">
                <p class="label-input">Correo: <span class="span-plomo"><?php echo $correo ?></span></p>
            </div>

        </div>

        <form class="form-id-producto">
            <div class="input-normal">
                <label class="label-input">ID de producto:</label>
                <div class="flex-rut-botones">
                    <div>
                        <input class="input-text" type="text" id="id_producto" placeholder="Ingrese ID del producto:" style="width: 260px;">
                        <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="agregar-producto" style="margin-right: 10px;">Agregar producto</button>
                        <button type="button" class="btn-cancelar" id="cancelar-compra">Cancelar compra</button>
                    </div>

                    <div class="buscar-por-titulo">
                        <button type="button" id="abrir-modal" class="btn buscar-por-nombre">Buscar por titulo o marca</button>
                    </div>

                </div>


            </div>


        </form>

        <table id="tabla">
            <thead>
                <tr>
                    <th class="titular-fila">ID</th>
                    <th class="titular-fila">Imagen</th>
                    <th class="titular-fila">Titulo</th>
                    <th class="titular-fila">Marca</th>
                    <th class="titular-fila">Precio unitario</th>
                    <th class="titular-fila">Cantidad</th>
                    <th class="titular-fila">Subtotal</th>
                    <th class="titular-fila"></th>
                </tr>
            </thead>

        </table>

        <div style="height: 40px;">

        </div>

        <div class="total-contenedor" style="flex-direction: column; float:right; margin-top:20px; margin-left:60px;">
            <div style="margin-left:20px; flex-direction: column; margin-bottom: 15px; display:flex; justify-content: center;align-items: center;">
                <p style="font-size:14px;" id="sub-total">Subtotal: $</p>
                <p style="font-size:14px;" id="iva">Iva: $990</p>
            </div>

            <div style="display:flex; justify-content: center;align-items: center;">
                <p id="total-general">$0</p>
                <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="pagar">Pagar</button>
            </div>
        </div>
    </div>
    <div class="loader oculto" id="loader">
        <div class="fondo-blanco">

        </div>
        <div class="contenido-loader">
            <p>Pagando...</p>
                <div class="pre-loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
        </div>

    </div>



    <section class="modal">
        <div class="modal__container">
            <div class="input-normal">
                <label class="label-input">Buscar producto por titulo o marca:</label>
                <div class="flex-rut-botones">
                    <input onkeyup="mostrar()" class="input-text" type="text" id="titulo-producto" placeholder="Ingrese titulo del producto">
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




            </table>

            <div class="close modal__close" id="cerrar-modal">
                <p>X</p>
            </div>
        </div>

    </section>








<script>
    function darOpacidad(){
            var backdrop = parent.document.getElementById('backdrop');
            var backdrop_up = parent.document.getElementById('backdrop-up');
            var backdrop_right = parent.document.getElementById('backdrop-right');

            var backwhite = parent.document.getElementById('backwhite');
            var backwhite_up = parent.document.getElementById('backwhite-up');
            var backwhite_right = parent.document.getElementById('backwhite-right');

            backdrop.classList.add('visible');
            backdrop_up.classList.add('visible');
            backdrop_right.classList.add('visible');
        }

        function ocultarOpacidad(){
            var backdrop = parent.document.getElementById('backdrop');
            var backdrop_up = parent.document.getElementById('backdrop-up');
            var backdrop_right = parent.document.getElementById('backdrop-right');

            var backwhite = parent.document.getElementById('backwhite');
            var backwhite_up = parent.document.getElementById('backwhite-up');
            var backwhite_right = parent.document.getElementById('backwhite-right');

            backdrop.classList.remove('visible');
            backdrop_up.classList.remove('visible');
            backdrop_right.classList.remove('visible');
    }







    $('#abrir-modal').click(function(){
        const modal = document.querySelector('.modal');
        modal.classList.add("modal--show");
        darOpacidad();

    });


    //FUNCION TITULO DEL PRODUCTO LIKE
    //OBTENEMOS TODO LO ESCRITO EN EL TITULO DEL PRODUCTO
    function mostrar() {
        var titulo_producto = $("#titulo-producto").val();
        
        $.ajax({
            type:'POST',
            url:'php/buscarPorTitulo.php', //URL
            data: {titulo_producto},
            success: function(data){
                $("#tabla-titulo").html(data);

                    //trabajo aca porque los productos no estan cuando carga la pagina
                    //Aparecen con la data osea cuando se ejecuta la funcion mostrar
                    //CUANDO DE CLIC A AGREGAR AL DETALLE al producto que busco por el titulo que se agregue al detalle
                    $('.agregar-al-detalle').click(function(){
                        var id_producto = $(this).attr("id");
                        $.ajax({
                            type:'POST',
                            url:'php/agregarProductoDetalle.php',
                            data:{id_producto},
                            success: function(res){
                                $("#tabla").html(res);
                                trim = res.trim();
                                obtenerTotal();
                                ocultarOpacidad();
                                $('.modal').removeClass('modal--show');

                                 //ELIMINAR SIN ACTUALIZAR   
                                 //TRABAJO ACA PORQUE EL CODIGO VIENE DESPUES DE HACER CLIC, NO LEE EL CODIGO ANTES
                                $('.btn-eliminar').click(function(){
                                    darOpacidad();

                                    Swal.fire({
                                    title: '¿Estás seguro de eliminar el producto?',
                                    icon: 'error',
                                            
                                    showConfirmButton: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#61C923',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                    var id_posicion_eliminar = $(this).attr("id");
                                    ///convertirlo en string
                                    $.ajax({
                                        type:'POST',
                                        url:'php/eliminarProductoDetalle.php', //URL
                                        data: {id_posicion_eliminar},
                                        success: function(data)
                                        {
                                            $("#item-producto" + id_posicion_eliminar).hide("slow");
                                            obtenerTotal();
                                        }
                                    }); 
                                            ocultarOpacidad();
                                        }
                                    });
                                });
                            }
                        });



                    });
            }
        });
        
    };



//ceramos el modal
    $('#cerrar-modal').click(function(){
        const modal = document.querySelector('.modal');
        modal.classList.remove("modal--show");

        ocultarOpacidad();

    });






    //AGREGAALCARRITO SIN ACTUALIZAR /*
    $('#agregar-producto').click(function(){
                var id_producto = document.getElementById('id_producto').value;
                $.ajax({
                    type:'POST',
                    url:'php/agregarProductoDetalle.php',
                    data:{id_producto},
                    success: function(res){
                        $("#tabla").html(res);
                        trim = res.trim();
                        obtenerTotal();

                        $('#id_producto').val(''); //Limpiamos input
                        //ELIMINAR SIN ACTUALIZAR   //TRABAJO ACA PORQUE EL CODIGO VIENE DESPUES DE HACER CLIC, NO LEE EL CODIGO ANTES
                        $('.btn-eliminar').click(function(){
                            darOpacidad();

Swal.fire({
title: '¿Estás seguro de eliminar el producto?',
icon: 'error',
        
showConfirmButton: true,
confirmButtonText: 'Aceptar',
confirmButtonColor: '#61C923',
}).then((result) => {
    if (result.isConfirmed) {
var id_posicion_eliminar = $(this).attr("id");
///convertirlo en string
$.ajax({
    type:'POST',
    url:'php/eliminarProductoDetalle.php', //URL
    data: {id_posicion_eliminar},
    success: function(data)
    {
        $("#item-producto" + id_posicion_eliminar).hide("slow");
        obtenerTotal();
    }
}); 
        ocultarOpacidad();
    }
});
                        });

                        window.scrollTo(0, document.body.scrollHeight);
                    }


        });

    });
    function obtenerTotal(){
        $.ajax({
                type:'POST',
                url:'php/calcularTotal.php', //URL
                data: "", //no entrego ningun valor a php
                success: function(res){
                    trim = res.trim(":");
                    split = trim.split(":");

                    console.log(split[0]);
                    console.log(split[1]);
                    console.log(split[2]);

                    if(split[0] != 0){
                        $("#sub-total").html('Subtotal: ' + split[0]);
                        $("#iva").html('Iva(%19): ' + split[1]);
                        $("#total-general").html('Total: '+split[2]);

                    }

                }
        });
    }

    $('#pagar').click(function(){
        var loader = document.getElementById('loader');
        $("#loader").removeClass("oculto");
        $.ajax({
                type:'POST',
                url:'php/insertarCompra.php', //URL
                data: "", //no entrego ningun valor a php
                success: function(res){
                    $("#respuesta").html(res);
                    setTimeout(function(){
                        window.location.href= "compraRealizada.php?boleta="+res;

                        correo = "<?php echo $correo ?>";
                        nombre = "<?php echo $nombre ?>";
                        apellido = "<?php echo $apellido ?>";
                        rut = "<?php echo $rut ?>";

                        $.ajax({
                                type:'POST',
                                url:'php/enviarCorreoCaja.php', //URL
                                data: {correo,nombre,apellido,rut},
                                success: function(res){
                                    console.log(res);

                                }
                        });


                    }, 6000);

                }
        });
    });

    $('#cancelar-compra').click(function(){
        darOpacidad();

        Swal.fire({
                title: '¿Estas seguro de que quieres cancelar la compra?',
                icon: 'warning',
                allowOutsideClick: false,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Si cancelar',
                cancelButtonColor: '#9fa3a9',
                confirmButtonColor: '#FF6969',
    
            }).then((result) => {
            if (result.isConfirmed) {
                ocultarOpacidad();
                $.ajax({
                type:'POST',
                url:'php/cancelarCompra.php', //URL
                data: "", //no entrego ningun valor a php
                    success: function(res){
                        window.location.href= "realizarCompra.php";
                    }
                });
            }

            else{
                ocultarOpacidad();
            }
        });    
    
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



    function darOpacidadWhite(){
            var backwhite = parent.document.getElementById('backwhite');
            var backwhite_up = parent.document.getElementById('backwhite-up');
            var backwhite_right = parent.document.getElementById('backwhite-right');

            backwhite.classList.add('visible-white');
            backwhite_up.classList.add('visible-white');
            backwhite_right.classList.add('visible-white');
        }

        function ocultarOpacidadWhite(){
            var backwhite = parent.document.getElementById('backwhite');
            var backwhite_up = parent.document.getElementById('backwhite-up');
            var backwhite_right = parent.document.getElementById('backwhite-right');

            backwhite.classList.remove('visible-white');
            backwhite_up.classList.remove('visible-white');
            backwhite_right.classList.remove('visible-white');
    }

</script>
</body>

</html>