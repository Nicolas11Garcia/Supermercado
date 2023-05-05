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
        .flex-input-flex{
            width: 98%;
            display: flex;
            justify-content: space-between;
        }

        .input-normal{
            width: 98%;
            display: flex;
            justify-content: space-between;
        }

        .btn-div{
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        table{
            width: 95%;
        }

        .input-text{
            width: 245px;
            margin-right: 10px;
        }
    </style>

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Gestionar Sub-Sub-Categorias</h2>

    <div class="contenedor-filtrado" style="margin-bottom: 30px; margin-top: 30px;">

        <div class="input-normal">
            <label class="label-input">Filtrar por categoria:</label>
            <select name="select" class="input-text select-input" id="categoria">
                    <?php
                        $lista_categorias = $dao->buscarCategorias();
                        echo '<option value="0">Ver todas</option>';
                        foreach ($lista_categorias as $k){
                            echo '
                                <option value="'.$k->getId().'">'.$k->getDescripcion().'</option>
                            ';
                        }
                    ?>
            </select>
        </div>

        <div class="input-normal">
            <label class="label-input">Filtrar por sub-categoria:</label>
            <select name="select" class="input-text select-input" id="sub-categoria-select" disabled>
                <option disabled selected="Seleccionar">Seleccione Sub-Categoria</option>
            </select>
        </div>
        <div class="input-normal">
            <label class="label-input">Filtrar por sub-sub-categoria:</label>
            <select name="select" class="input-text select-input" id="sub-sub-categoria-select" disabled>
            <option disabled selected="Seleccionar">Seleccione Sub-Sub-Categoria</option>
                <option value="rancagua" selected>Ver todo</option>
            </select>
        </div>

        <div class="btn-div">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="agregar">Agregar Sub-Sub-Categoria</button>
        </div>


    </div>

    <table id="tabla">
        <thead>
            <tr>
                <th class="titular-fila">Categoria</th>
                <th class="titular-fila">Sub-Categoria</th>
                <th class="titular-fila">Sub-Sub-Categorias</th>
                <th class="titular-fila"></th>
            </tr>
        </thead>

        <?php
            
            $lista_sub_categorias = $dao->buscarSubSubCategorias();

            foreach($lista_sub_categorias as $k){
                echo '
                <tr class="producto-item">
                    <td style="width: 400px;">'.$k->getDescripcionCategoria().'</td>
                    <td style="width: 400px;">'.$k->getDescripcionSubCategoria().'</td>
                    <td style="width: 400px;">'.$k->getDescripcionSubSubCategoria().'</td>
                    <td >
                        <div class="botones-opciones">
                            <div class="editar boton-opcion">
                                    <a href="editarSubSubCategoria.php?id_sub_sub_categoria='.$k->getIdSubSubCategoria().'" style="cursor: pointer; color: white; text-decoration: none;">Editar</a>
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

        //OBTENER EL VALOR DEL SELECT APENAS APRETE LA OPCION - CATEGORIA
        var select = document.getElementById('categoria');
        select.addEventListener('change',
        function(){
            var selectedOption = this.options[select.selectedIndex];
            id_categoria_seleccionada = selectedOption.value;

            //Si el select es distinto a ver todo, habilita el select subcategoria
            var select_sub_categoria = document.getElementById('sub-categoria-select');
            select_sub_categoria.disabled=false;

            //Si el select es "Ver todo" Deshabilita la opcion subcategoria
            if(id_categoria_seleccionada == 0){
                select_sub_categoria.disabled=true;
            }

            //Obtenemos el id de la categoria seleccionada, obtenemos todas las subcategorias y las imprimimos en el SELECT de categoria
            $.ajax({
                type:'POST',
                url:'php/filtradoSelectSubCategoria.php', //URL
                data: {id_categoria_seleccionada},
                success: function(data){
                    $("#sub-categoria-select").html(data);
                }
            });

            //Obtenemos el id de la categoria seleccionada, obtenemos todas las subcategorias e imprimimos todo en la tabla
            $.ajax({
                type:'POST',
                url:'php/filtrarPorCategoria.php', //URL
                data: {id_categoria_seleccionada},
                success: function(data){
                    $("#tabla").html(data);
                }
            });


            //OBTENER EL VALOR DEL SELECT APENAS APRETE LA OPCION - SUB-CATEGORIA
            //ESTA ACA PARA OBTENER EL VALOR DEL SELECT DE CATEGORIA
            var select_sub_categoria = document.getElementById('sub-categoria-select');
            select_sub_categoria.addEventListener('change',
            function(){
                //OBTENEMOS VALORES DEL SELECT
                var selectedOptionSubCategoria = this.options[select_sub_categoria.selectedIndex];
                id_sub_categoria_seleccionada = selectedOptionSubCategoria.value;

                //Si el select es distinto a ver todo, habilita el select sub-subcategoria
                var select_sub_sub_categoria = document.getElementById('sub-sub-categoria-select');
                select_sub_sub_categoria.disabled=false;

                //Si el select es "Ver todo" Deshabilita la opcion subsubcategoria
                if(id_sub_categoria_seleccionada == 0){
                    select_sub_sub_categoria.disabled=true;
                }

                //Filtramos por la sub-categoria e imprimimos en la tabla
                $.ajax({
                    type:'POST',
                    url:'php/filtrarPorSubCategoria.php', //URL
                    data: {id_sub_categoria_seleccionada,id_categoria_seleccionada},
                    success: function(data){
                        $("#tabla").html(data);
                    }
                });

                //Obtenemos el id de la sub-categoria seleccionada, obtenemos todas las sub-sub-categorias y las imprimimos en el SELECT de sub-sub-categoria
                $.ajax({
                    type:'POST',
                    url:'php/filtradoSelectSubSubCategoria.php', //URL
                    data: {id_sub_categoria_seleccionada},
                    success: function(data){
                        $("#sub-sub-categoria-select").html(data);
                    }
                });
            });



            //OBTENER EL VALOR DEL SELECT APENAS APRETE LA OPCION  SUB-SUB-CATEGORIA
            //ESTA ACA PARA OBTENER EL VALOR DEL SELECT DE SUB-CATEGORIA
            var select_sub_sub_categoria = document.getElementById('sub-sub-categoria-select');
            select_sub_sub_categoria.addEventListener('change',
            function(){
                //OBTENEMOS VALORES DEL SELECT
                var selectedOptionSubSubCategoria = this.options[select_sub_sub_categoria.selectedIndex];
                id_sub_sub_categoria_seleccionada = selectedOptionSubSubCategoria.value;

                //Filtramos por la sub-categoria e imprimimos en la tabla
                $.ajax({
                    type:'POST',
                    url:'php/filtrarPorSubSubCategoria.php', //URL
                    data: {id_sub_sub_categoria_seleccionada,id_sub_categoria_seleccionada},
                    success: function(data){
                        $("#tabla").html(data);
                    }
                });
            });



        });





        //APRETO AGREGAR SUB-CATEGORIA
        $('#agregar').click(function(){
            window.location.href= "agregarSubSubCategoria.php";
        });
    </script>
</body>

</html>