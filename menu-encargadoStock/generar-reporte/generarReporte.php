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
    <link rel="stylesheet" href="../../assets/css/menu-stock/ingresarproducto.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/generarreporte.css">

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Generar Reporte</h2>

    <form class="form-ingreso" style="margin-bottom: 30px; margin-top: 30px;">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="input-normal">
                    <label class="label-input">ID de producto:</label>
                    <input class="input-text" onkeyup="mostrar()" type="text" id="id_producto" placeholder="Ingrese ID de producto">
                </div>

                <div class="elementos-input">
                    <label class="label-input">Tipo de reporte:</label>
                    <select name="select" id="tipo-de-reporte" class="input-text input-flex-item">
                        <option disabled selected="Seleccionar">Seleccione tipo de reporte</option>
                        <option value="Falta stock">Falta Stock</option>
                        <option value="Bajo stock">Bajo stock</option>
                    </select>
                </div>

                <div class="input-normal">
                    <label class="label-input">Motivo (Opcional):</label>
                    <textarea require class="input-text text-area" type="text" id="motivo" placeholder="Ingrese informacion del producto"></textarea>
                </div>
            </div>

            <div class="derecha-form">
                    <div class="item" id="item">
                    </div>
            </div>
        </div>
        <div class="div-button">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="enviar-reporte">Enviar Reporte</button>
        </div>
    </form>


    <div id="respuesta">

    </div>


<script>
        function mostrar() {
            var id_producto = $("#id_producto").val();
            $.ajax({
                type:'POST',
                url:'php/mostrarProductoPorID.php', //URL
                data: {id_producto},
                success: function(data){
                    $('#item').html(data);
                }
            }); 
        
    }

    //APRETO AGREGAR REPORTE
    $('#enviar-reporte').click(function(){
        if (confirm('¿Estas seguro de enviar el reporte?')) {
            var id_producto = $("#id_producto").val();
            var tipo_de_reporte = $("#tipo-de-reporte").val();
            var motivo = $("#motivo").val();


            $.ajax({
                type:'POST',
                url:'php/ingresarReporte.php', //URL
                data: {id_producto,tipo_de_reporte,motivo},
                success: function(data){
                    respuesta = data.trim();

                    //PHP me devuelve si fue editado y el numero de reporte
                    datos_divididos = respuesta.split(":");
                    numero_reporte = datos_divididos[1]; 

                    console.log(numero_reporte);
                    console.log(datos_divididos[0]);
                    if(datos_divididos[0] == "ingresado"){
                        alert('Reporte enviado correctamente');
                        window.location.href= "visualizarDetallesReporte.php?numero_reporte="+numero_reporte;
                    }
                }
            }); 
        }

    });
</script>

</body>

</html>