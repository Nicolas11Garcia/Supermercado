<?php
include('../../php/class/Dao.php');
$dao = new DAO();


$id_sub_categoria = $_GET['id_subcategoria'];

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

    <h2>Editar Sub-Categoria </h2>

    <form class="form-ingreso" style="margin-bottom: 30px; margin-top: 30px;">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                
                
                <?php
                    $lista_sub_categorias = $dao->buscarSubCategoriasPorSubCategoria($id_sub_categoria);
    
                    $descripcion_sub_categoria = "";
                    $descripcion_categoria = "";

                    foreach($lista_sub_categorias as $k){
                        $descripcion_sub_categoria =  $k->getDescripcionSubCategoria();
                        $descripcion_categoria = $k->getDescripcionCategoria();
                    }

                ?>

                <div class="input-normal">
                    <label class="label-input">Descripción Sub-Categoria:</label>
                    <input value="<?php echo $descripcion_sub_categoria ?>" class="input-text" type="text" id="descripcion-sub-categoria" placeholder="Ingrese descripcion de la sub-categoria">
                </div>
                <div class="elementos-input">
                    <label class="label-input">Categoria:</label>
                    <select name="select" id="categoria" class="input-text input-flex-item">
                        <option disabled selected="Seleccionar">Seleccione la categoria</option>
                        <?php
                        $lista_categorias = $dao->buscarCategorias();
                        foreach ($lista_categorias as $k){
                            if($k->getDescripcion() == $descripcion_categoria){
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
            </div>
        </div>
        <div class="flex-button">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="editar">Editar sub-categoria</button>
            <button type="button" class="btn-cancelar" id="cancelar">Cancelar</button>
        </div>
    </form>


    <div style="height: 40px;">

    </div>



    <script>
        $('#editar').click(function(){
            if (confirm('¿Estas seguro de editar la Sub-Categoria?')) {
                var descripcion_sub_categoria = document.getElementById('descripcion-sub-categoria').value;
                var id_categoria = document.getElementById('categoria').value;
                var id_sub_categoria = <?php echo $id_sub_categoria;?>

                $.ajax({
                    type:'POST',
                    url:'php/editarSubCategoria.php', //URL
                    data: {descripcion_sub_categoria,id_categoria,id_sub_categoria},
                    success: function(data){
                        
                        respuesta = data.trim();
                        
                        if(respuesta == "editado"){
                            alert('Sub-Categoria Editada correctamente');
                            window.location.href= "gestionarSubCategorias.php";

                        }
                    }
                }); 
            }
         });

        //APRETO EL CANCELAR EDIT //VOLVER A GESTIONAR SUBCATEGORIAS
        $('#cancelar').click(function(){
            window.location.href= "gestionarSubCategorias.php";
        });

    </script>

    
</body>

</html>