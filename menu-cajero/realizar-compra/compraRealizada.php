<?php
include('../../php/class/Dao.php');
session_start();
$dao = new DAO();

$boleta = $_GET['boleta'];


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


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Realizar compra - Boleta #<?php echo $boleta; ?></h2>

    <div class="contenedor-datos" style="margin-bottom: 30px;">

        <?php
            $id_cliente = 0;
            $total = 0;

            $lista_boletas = $dao->buscarBoletaID($boleta);
            foreach ($lista_boletas as $k) {
                $id_cliente = $k->getIdCliente();
                $total = $k->getTotal();
            }

            $nombre = "";
            $apellido = "";
            $rut = "";

            $datos_cliente = $dao->datosClienteID($id_cliente);
            foreach ($datos_cliente as $l) {
                $nombre = $l->getNombre();
                $apellido = $l->getApellido();
                $rut = $l->getRut();
            }

        ?>
        <div>
            <div class="input-normal">
            <p class="label-input">Rut: <span class="span-plomo"><?php echo $rut ?></span></p>
        </div>

        <div class="flex">
            <p class="label-input">Nombre: <span class="span-plomo"><?php echo $nombre ?></span></p>
            <p class="label-input">Apellido: <span class="span-plomo"><?php echo $apellido ?></span></p>
            </div>
        </div>


        <div>
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="volver-realizar-compra" style="margin-right: 10px; width: 190px;">Volver a Realizar Compra</button>
        </div>


    </div>



    <table>
        <thead>
            <tr>
                <th class="titular-fila">ID</th>
                <th class="titular-fila">Imagen</th>
                <th class="titular-fila">Titulo</th>
                <th class="titular-fila">Marca</th>
                <th class="titular-fila">Precio</th>
                <th class="titular-fila">Cantidad</th>
                <th class="titular-fila"></th>
            </tr>
        </thead>

        <?php
            $productos_comprados_boleta = $dao->buscarDetalleSegunBoleta($boleta);
            foreach($productos_comprados_boleta as $k){
                echo '
                    <tr class="producto-item">
                    <td >'.$k->getIdProducto().'</td>
                    <td ><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                    <td class="titulo">'.$k->getTitulo().'</td>
                    <td >'.$k->getMarca().'</td>
                    <td >'.number_format($k->getPrecio(), 0, ',', '.').'</span></td>
                    <td>1</td>
                </tr>
                
                ';
            }


        ?>

    </table>

    <div style="height: 40px;">

    </div>

    <div class="total-contenedor">
        <p>Total: $<?php echo number_format($total, 0, ',', '.')?></p>

    </div>




    <script>
        $('#volver-realizar-compra').click(function(){
            window.location.href= "realizarCompra.php";
        });
    </script>

</body>
</html>