<?php


include('../../php/class/Dao.php');
$dao = new DAO();

$numero_orden = $_GET['numero_orden'];

$lista_datos_orden = $dao->buscarOrden($numero_orden);

$nombre = "";
$apellido = "";
$correo = "";

$estado = "";

foreach($lista_datos_orden as $k){
    $nombre = $k->getNombre();
    $apellido = $k->getApellido();
    $correo = $k->getCorreo();

    $estado = $k->getEstado();
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

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/menu-stock/generarreporte.css">

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/gestionarproductos.css">

    <style>
        td{
            font-size: 13px;
        }

        .volver{
            color: black;
            text-decoration: none;
            font-size: 25px;

            margin-right: 10px;

        }

    </style>

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2><a href="ordenes.php" class="volver"><i class="fi fi-rr-angle-circle-left"></i></a>Orden - Orden #<?php echo $numero_orden;?></h2>

    <div class="contenedor-filtrado" style="margin-bottom: 30px; margin-top: 30px;">

        <div class="input-normal">
            <label class="label-input">Cambiar estado:</label>
            <select name="select" class="input-text select-input" id="select-visibildad" style="width:300px">

                <?php
                    if($estado == 'Pendiente'){
                        echo '
                        <option value="Pendiente" selected>Pendiente</option>
                        <option value="Finalizada">Finalizada</option>
                        ';
                    }

                    else{
                        echo '
                        <option value="Pendiente">Pendiente</option>
                        <option value="Finalizada" selected>Finalizada</option>
                        ';
                    }
            
                ?>

            </select>
            </div>
                <button style="margin-top: 28px;" type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="guardar">Guardar</button>
            <div>   
        </div>
    </div>

    <div class="datos-solicitante" style="margin-bottom: 30px;">
                    <p class="texto-negrito" style="margin-bottom: 20px;">Cliente:</p>
                    <div class="flex" style="gap: 30px;">
                        <p class="label-input">Nombre: <span class="span-plomo"><?php echo $nombre ?></span></p>
                        <p class="label-input">Correo: <span class="span-plomo"><?php echo $correo ?></span></p>
                    </div>
    
                    <div class="input-normal">
                        <p class="label-input">Apellido: <span class="span-plomo"><?php echo $apellido ?></span></p>
                    </div>
    </div>

    <table id="tabla">
        <thead>
            <tr>
                <th class="titular-fila">Id producto</th>
                <th class="titular-fila">Imagen</th>
                <th class="titular-fila">Titulo</th>
                <th class="titular-fila">Marca</th>
                <th class="titular-fila">Precio</th>
                <th class="titular-fila">Cantidad</th>
                <th class="titular-fila">Subtotal</th>
            </tr>
        </thead>

        <?php
        $detalle_segun_orden = $dao->buscarDetalleSegunOrden($numero_orden);
        $total = 0;

        foreach($detalle_segun_orden as $k){
            $sub_total = $k->getCantidad() * $k->getPrecio();
            $total = $sub_total + $total;

            echo '
            <tr class="producto-item">
                <td style="width: 40px;">'.$k->getIdProducto().'</td>
                <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                <td class="titulo">'.$k->getTitulo().'</td>
                <td style="width: 120px;">'.$k->getMarca().'</td>
                <td style="width: 120px;">$'.number_format($k->getPrecio(), 0, ',', '.').'</td>
                <td style="width: 120px;">'.$k->getCantidad().'</td>
                <td style="width: 120px;">$'.number_format($sub_total, 0, ',', '.').'</td>
                <td style="width: 80px;">
                </td>
            </tr>
            
            
            
            ';
        }

        ?>





    </table> 

    <div style="height: 40px;" id="respuesta">

    </div>

    <div class="total-contenedor" style="margin-right: 140px;">
            <p id="total-general">Total: $<?php echo number_format($total, 0, ',', '.');?></p>
    </div>

    <div style="height: 40px;" id="respuesta">
    </div>












    <script>
        $('#guardar').click(function(){
            valor_select = $('#select-visibildad').val();
            
            numero_boleta = <?php echo $numero_orden ?>;

            $.ajax({
                    type:'POST',
                    url:'php/cambiarEstado.php', //URL
                    data: {valor_select,numero_boleta},
                    success: function(data){

                        trim = data.trim();

                        if(trim == 'estadocambiado'){
                            darOpacidad();

                            Swal.fire({
                                title: 'Estado cambiado exitosamente.',
                                icon: 'success',
                                showConfirmButton: true,
                                confirmButtonText: 'Aceptar',
                                confirmButtonColor: '#61C923',
                                customClass: {
                                    popup: 'my-swal-popup-class',
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    ocultarOpacidad();
                                }
                            });
                        }
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



    </script>
</body>

</html>