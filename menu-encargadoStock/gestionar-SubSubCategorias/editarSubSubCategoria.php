<?php
include('../../php/class/Dao.php');
$dao = new DAO();


$id_sub_sub_categoria = $_GET['id_sub_sub_categoria'];

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

    <h2>Editar Sub-Sub-Categoria </h2>

    <form class="form-ingreso" style="margin-bottom: 30px; margin-top: 30px;">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="elementos-input">
                    <label class="label-input">Categoria:</label>
                    <select name="select" id="categoria" class="input-text input-flex-item">
                        <option disabled selected="Seleccionar">Seleccione la categoria</option>
                        <?php
                            //Obtener la categoria y la sub-categoria de la sub sub que quiere editar y se le muestren en los select
                            $categoria_actual = 0;
                            $sub_categoria_actual = 0;
                            $descripcion_sub_sub_categoria = "";


                            //OBTENEMOS TODOS LOS DATOS DE LA SUB SUB QUE QUIERE EDITAR Y LOS Establecemos en los forms
                            $lista_categoria_actual = $dao->buscarSubSubCategoriasSegunSubSubCategoria($id_sub_sub_categoria);
                            foreach ($lista_categoria_actual as $k){
                                $categoria_actual = $k->getIdCategoria();
                                $sub_categoria_actual = $k->getIdSubcategoria();
                                $descripcion_sub_sub_categoria = $k->getDescripcionSubSubCategoria();
                            }

                            //Imprimimos las categorias en el selec categoiras
                            $lista_categorias = $dao->buscarCategorias();
                            foreach ($lista_categorias as $k){
                                //Buscamos la categoria a la que pertenece la sub-sub y la marcamos como selected
                                if($k->getId() == $categoria_actual){
                                    echo '
                                    <option selected value="'.$k->getId().'">'.$k->getDescripcion().'</option>
                                    ';
                                }
                                else{
                                    echo '
                                    <option value="'.$k->getId().'">'.$k->getDescripcion().'</option>
                                ';
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="input-normal">
                    <label class="label-input">Filtrar por sub-categoria:</label>
                    <select name="select" class="input-text select-input" id="sub-categoria-select">
                        <option disabled selected="Seleccionar">Seleccione Sub-Categoria</option>
                        <?php
                        $lista_sub_categoria_actual = $dao->buscarSubCategoriasPorCategoria($categoria_actual);
                        
                        foreach($lista_sub_categoria_actual as $k){
                            //Buscamos la Sub-categoria a la que pertenece la sub-sub y la marcamos como selected
                            if($k->getIdSubcategoria() == $sub_categoria_actual){
                                echo '
                                <option selected value="'.$k->getIdSubcategoria().'">'.$k->getDescripcionSubcategoria().'</option>
                                ';
                            }
                            else{
                                    echo '
                                    <option value="'.$k->getIdSubcategoria().'">'.$k->getDescripcionSubcategoria().'</option>
                                ';
                            }
                            
                        }

                        ?>
                            
                    </select>
                </div>

                <div class="input-normal">
                    <label class="label-input">Descripción Sub-Sub-Categoria:</label>
                    <input value="<?php echo $descripcion_sub_sub_categoria?>" class="input-text" type="text" id="descripcion-sub-sub-categoria" placeholder="Ingrese descripcion de la sub-sub-categoria">
                </div>
            </div>
        </div>
        <div class="flex-button">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="editar" style="width: 260px;">Editar sub-sub-categoria</button>
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








        $('#editar').click(function(){
            if (confirm('¿Estas seguro de editar la Sub-Sub-Categoria?')) {
                var descripcion_sub_sub_categoria = document.getElementById('descripcion-sub-sub-categoria').value;
                var id_categoria = document.getElementById('categoria').value;
                var id_sub_categoria = document.getElementById('sub-categoria-select').value;
                var id_sub_sub_categoria = <?php echo $id_sub_sub_categoria; ?> //Necesitamos tener el id de sub sub para saber donde hacer el update

                $.ajax({
                    type:'POST',
                    url:'php/editarSubSubCategoria.php', //URL
                    data: {descripcion_sub_sub_categoria,id_categoria,id_sub_categoria,id_sub_sub_categoria},
                    success: function(data){
                        respuesta = data.trim();

                        console.log(respuesta);
                        if(respuesta == "editado"){
                            alert('Sub-Sub-Categoria editada correctamente');
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