<?php


include('../../php/class/Dao.php');
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


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/gestionarproductos.css">

    <style>
        td{
            font-size: 13px;
        }
    </style>

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Ordenes</h2>

    <div class="contenedor-filtrado" style="margin-bottom: 30px; margin-top: 30px;">
        <div class="input-normal">
            <label class="label-input">Buscar por N° de orden:</label>
            <input class="input-text" onkeyup="mostrar()" type="text" id="numero-orden" placeholder="Ingrese el numero de orden">
        </div>
        <div class="input-normal">
            <label class="label-input">Filtrar por estado:</label>
            <select name="select" class="input-text select-input" id="select-estado">
                <option value="ver-todo" selected>Ver todo</option>
                <option value="pendientes">Pendientes</option>
                <option value="finalizadas">Finalizadas</option>
            </select>
        </div>
    </div>

    <table id="tabla">
        <thead>
            <tr>
                <th class="titular-fila">N° de orden</th>
                <th class="titular-fila">Fecha</th>
                <th class="titular-fila">Total del pedido</th>
                <th class="titular-fila">Estado</th>
                <th class="titular-fila"></th>
            </tr>
        </thead>

        <?php
        $lista_ordenes = $dao->mostrarTodasOrdenes();

        foreach($lista_ordenes as $k){
            echo '
            <tr class="producto-item">
                <td>'.$k->getNumeroOrden().'</td>
                <td class="titulo">'.$k->getFecha().'</td>
                <td>$'.number_format($k->getTotal(), 0, ',', '.').'</td>
                <td style="width:200px">'.$k->getEstado().'</td>
                <td style="width:200px;">
                    <div class="botones-opciones" >
                        <div class="editar boton-opcion" style="width:120px; font-size:13px; background: #51AA1B;" >
                            <i style="margin-top: 3px;" class="fi fi-rr-eye"></i><a href="visualizarOrden.php?numero_orden='.$k->getNumeroOrden().'">Ver orden</a>
                        </div>
                    </div>

                </td>
            </tr>
            
            ';
        }


        ?>






    </table> 

    <div style="height: 40px;" id="respuesta">

    </div>

    <script>
        function mostrar() {
            var numero_orden = $("#numero-orden").val();

            $.ajax({
                    type:'POST',
                    url:'php/buscarPorNumeroOrden.php', //URL
                    data: {numero_orden},
                    success: function(data){
                        $("#tabla").html(data);
                    }
            });
        }

        //OBTENER EL VALOR DEL SELECT APENAS APRETE LA OPCION
        var select = document.getElementById('select-estado');
        select.addEventListener('change',
        function(){
            var selectedOption = this.options[select.selectedIndex];
            estado_seleccionada = selectedOption.value;
            $.ajax({
                    type:'POST',
                    url:'php/buscarPorEstado.php', //URL
                    data: {estado_seleccionada},
                    success: function(data){
                        $("#tabla").html(data);
                    }
            });

        });


    </script>
</body>

</html>