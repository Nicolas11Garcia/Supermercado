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

    <h2>Gestionar productos</h2>

    <div class="contenedor-filtrado" style="margin-bottom: 30px; margin-top: 30px;">
        <div class="input-normal">
            <label class="label-input">Buscar por ID:</label>
            <input class="input-text" onkeyup="mostrar()" type="text" id="id_producto" placeholder="Ingrese ID del producto">
        </div>
        <div class="input-normal">
            <label class="label-input">Buscar por visibilidad:</label>
            <select name="select" class="input-text select-input" id="select-visibildad">
                <option value="ver-todo" selected>Ver todo</option>
                <option value="visibles">Visibles</option>
                <option value="no-visibles">No Visibles</option>
            </select>
        </div>
    </div>

    <table id="tabla">
        <thead>
            <tr>
                <th class="titular-fila">ID</th>
                <th class="titular-fila">Imagen</th>
                <th class="titular-fila">Titulo</th>
                <th class="titular-fila">Marca</th>
                <th class="titular-fila">Sub-Sub-Categoria</th>
                <th class="titular-fila">Precio venta</th>
                <th class="titular-fila">Precio oferta</th>
                <th class="titular-fila">Stock comprado</th>
                <th class="titular-fila">Stock actual</th>
                <th class="titular-fila">Visible</th>
                <th class="titular-fila"></th>
            </tr>
        </thead>

        <?php
            $lista_productos = $dao->mostrarTodosLosProductos();

            foreach($lista_productos as $k){
                echo '
                    <tr class="producto-item">
                        <td style="width: 40px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 120px;">'.$k->getMarca().'</td>
                        <td style="width: 120px;">'.$k->getSubSubCategoria().'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">'.$k->getStockComprado().'</td>
                        <td style="width: 70px;">'.$k->getStockActual().'</td>

                        <td style="width: 70px;">';

                        if($k->getVisible() == 0){
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="no-visible-check"></label>
                            </div>
                            ';
                        }
                        else{
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="visible-check"></label>
                            </div>';
                        }

                        echo '
                        </td>
                        <td style="width: 80px;">
                            <div class="botones-opciones" >
                                <div class="editar boton-opcion" style="width:80px; font-size:13px" >
                                        <a href="editarProducto.php?id_producto='.$k->getId().'">Editar</a>
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
            var id_producto = $("#id_producto").val();

            $.ajax({
                    type:'POST',
                    url:'php/buscarPorIdProducto.php', //URL
                    data: {id_producto},
                    success: function(data){
                        $("#tabla").html(data);
                    }
            });
        }

        //OBTENER EL VALOR DEL SELECT APENAS APRETE LA OPCION
        var select = document.getElementById('select-visibildad');
        select.addEventListener('change',
        function(){
            var selectedOption = this.options[select.selectedIndex];
            visibilidad_seleccionada = selectedOption.value;
            $.ajax({
                    type:'POST',
                    url:'php/buscarPorVisibilidad.php', //URL
                    data: {visibilidad_seleccionada},
                    success: function(data){
                        $("#tabla").html(data);
                    }
            });

        });


    </script>
</body>

</html>