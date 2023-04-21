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

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">

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
        <div class="input-normal">
            <label class="label-input">Rut:</label>
            <div class="flex-rut-botones">
                <input class="input-text" type="text" id="rut" placeholder="Ingrese Rut del cliente">
                <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="iniciar-compra">Iniciar compra</button>
            </div>
        </div>

        <div class="contenedor-agregar-cliente oculto" id="contenedor-agregar-cliente">
            <div class="flex-input">
                <div class="input-normal">
                    <label class="label-input">Nombre:</label>
                    <input class="input-text" type="text" id="nombre" placeholder="Ingrese nombre del cliente">
                </div>
    
                <div class="input-normal">
                    <label class="label-input">Apellido:</label>
                    <input class="input-text" type="text" id="apellido" placeholder="Ingrese apellido del cliente">
                </div>
            </div>
    
            <div class="flex-button">
                <button class="btn" type="button" id="registrar-e-iniciar">Registrar e Iniciar compra</button>
                <button type="button" class="btn-cancelar" id="omitir-ingreso-cliente">Omitir</button>
            </div>
        </div>


    </form>




</body>




<script>
    $('#iniciar-compra').click(function(){
        var rut = document.getElementById('rut').value;
        $.ajax({
            type:'POST',
            url:'php/ingresoRut.php', //URL
            data: {rut},
            success: function(res){
                respuesta = res.trim();

                if(respuesta == 1){
                    window.location.href= "procesoRealizarCompra.php?rut="+rut;
                }

                //SI EL CLIENTE NO EXISTE
                else{
                    const contenedor_agregar_cliente = document.getElementById("contenedor-agregar-cliente");
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
    });

    $('#registrar-e-iniciar').click(function(){
        location.href = "procesoRealizarCompra.html";
    });

    document.getElementById('rut').addEventListener('input', function(evt) {
    let value = this.value.replace(/\./g, '').replace('-', '');
    
    if (value.match(/^(\d{2})(\d{3}){2}(\w{1})$/)) {
        value = value.replace(/^(\d{2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4');
    }
    else if (value.match(/^(\d)(\d{3}){2}(\w{0,1})$/)) {
        value = value.replace(/^(\d)(\d{3})(\d{3})(\w{0,1})$/, '$1.$2.$3-$4');
    }
    else if (value.match(/^(\d)(\d{3})(\d{0,2})$/)) {
        value = value.replace(/^(\d)(\d{3})(\d{0,2})$/, '$1.$2.$3');
    }
    else if (value.match(/^(\d)(\d{0,2})$/)) {
        value = value.replace(/^(\d)(\d{0,2})$/, '$1.$2');
    }
    
    this.value = value;
    });
    

    
</script>

</html>