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
                <input class="input-text" type="text" id="rut" onkeyup="formatRut(this)" placeholder="Ingrese Rut del cliente" maxlength="12">
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















<script>
    $('#iniciar-compra').click(function(){
        var rut = document.getElementById('rut').value;
        if (validarRut(rut)) {
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
        } else {
                    Swal.fire({
                      title: 'El RUT ingresado no es válido, intente nuevamente.',
                      icon: 'error',
                      
                      allowOutsideClick: false,
                      showConfirmButton: true,
                      confirmButtonText: 'Aceptar',
                      confirmButtonColor: '#61C923',
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
    });

    $('#registrar-e-iniciar').click(function(){
        var rut = document.getElementById('rut').value;
        if (validarRut(rut)) {
        var nombre = document.getElementById('nombre').value;
        var apellido = document.getElementById('apellido').value;

            $.ajax({
                type:'POST',
                url:'php/ingresarCliente.php', //URL
                data: {rut,nombre,apellido},
                success: function(res){
                    respuesta = res.trim();

                    if(respuesta >= 1){
                        window.location.href= "procesoRealizarCompra.php?rut="+rut;
                    }
                }
            });
        }
        else {
                    Swal.fire({
                      title: 'El RUT ingresado no es válido, intente nuevamente.',
                      icon: 'error',
                      
                      backdrop: false,
                      allowOutsideClick: false,
                      showConfirmButton: true,
                      confirmButtonText: 'Aceptar',
                      confirmButtonColor: '#61C923',
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
    

    function validarRut(rut) {
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

    
</script>
</body>

</html>