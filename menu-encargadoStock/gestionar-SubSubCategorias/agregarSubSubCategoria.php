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
    <link rel="stylesheet" href="../../assets/css/menu-stock/ingresarproducto.css">

    <style>
        .input-text{
            width: 360px;
        }

    </style>

    <title>Menu cajero - Kala</title>
</head>
<body>

    <h2>Agregar Sub-Sub-Categoria </h2>

    <form class="form-ingreso" style="margin-bottom: 30px; margin-top: 30px;">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="elementos-input">
                    <label class="label-input">Categoria:</label>
                    <select name="select" id="categoria" class="input-text input-flex-item">
                        <option disabled selected="Seleccionar">Seleccione la categoria</option>
                        <?php
                            $lista_categorias = $dao->buscarCategorias();
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
                    <label class="label-input">Descripción Sub-Sub-Categoria:</label>
                    <input class="input-text" type="text" id="descripcion-sub-sub-categoria" placeholder="Ingrese descripcion de la sub-sub-categoria">
                </div>
            </div>
        </div>
        <div class="flex-button">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="agregar" style="width: 260px;">Agregar sub-sub-categoria</button>
            <button type="button" class="btn-cancelar" id="cancelar">Cancelar</button>
        </div>
    </form>


    <div style="height: 40px;">

    </div>



    <script>
        //OBTENER EL VALOR DEL SELECT APENAS APRETE LA OPCION - CATEGORIA
        //FILTRADO segun categoria, modifique la sub-sub-categoria
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
                url:'php/filtradoSelectSubCategoriaAgregar.php', //URL
                data: {id_categoria_seleccionada},
                success: function(data){
                    $("#sub-categoria-select").html(data);
                }
            });

        });








        $('#agregar').click(function(){
            if (confirm('¿Estas seguro de agregar una nueva Sub-Sub-Categoria?')) {
                var descripcion_sub_sub_categoria = document.getElementById('descripcion-sub-sub-categoria').value;
                var id_categoria = document.getElementById('categoria').value;
                var id_sub_categoria = document.getElementById('sub-categoria-select').value;

                $.ajax({
                    type:'POST',
                    url:'php/agregarSubSubCategoria.php', //URL
                    data: {descripcion_sub_sub_categoria,id_categoria,id_sub_categoria},
                    success: function(data){
                        respuesta = data.trim();

                        console.log(respuesta);
                        if(respuesta == "agregado"){
                            alert('Sub-Sub-Categoria agregada correctamente');
                            window.location.href= "gestionarSubSubCategorias.php";
                        }

                    }
                }); 
            }
         });

        //APRETO EL CANCELAR EDIT //VOLVER A GESTIONAR SUBCATEGORIAS
        $('#cancelar').click(function(){
            window.location.href= "gestionarSubSubCategorias.php";
        });

    </script>

    
</body>

</html>