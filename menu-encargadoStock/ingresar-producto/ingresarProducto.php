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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="../../assets/css/menu-cajero/realizarcompra/realizarcompra.css">
    <link rel="stylesheet" href="../../assets/css/menu-stock/ingresarproducto.css">

    <title>Menu cajero - Kala</title>

    <style>
    .swal2-popup {
      border: 2px solid black;
      
    }
  </style>
</head>
<body>

    <h2>Ingresar producto</h2>

    <form class="form-ingreso" style="margin-bottom: 30px; margin-top: 30px;" id="Formulario" enctype="multipart/form-data">
        <div class="contenedor-form-ingreso" >
            <div class="izquierda-form">
                <div class="input-normal">
                    <label class="label-input">Titulo:</label>
                    <input class="input-text" type="text" name="titulo" id="titulo" placeholder="Ingrese titulo del producto">
                </div>

                <div class="elementos-input">
                    <label class="label-input">Marca:</label>
                    <select name="select-marca" id="marca" class="input-text input-flex-item">
                        <option disabled selected="Seleccionar">Seleccione la marca</option>
                        <?php
                            $lista_marcas = $dao->mostrarMarcas();
                            foreach ($lista_marcas as $k){
                                echo '
                                    <option value="'.$k->getId().'">'.$k->getDescripcion().'</option>
                                ';
                            }
                        ?>
                    </select>
                </div>
                <div class="elementos-input">
                    <label class="label-input">Categoria:</label>
                    <select name="select-categoria" class="input-text select-input" id="categoria">
                        <option disabled selected="Seleccionar">Seleccione Categoria</option>
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
                <div class="elementos-input">
                    <label class="label-input">Sub-Categoria:</label>
                    <select name="select-sub-categoria" class="input-text select-input" id="sub-categoria-select" disabled>
                        <option disabled selected="Seleccionar">Seleccione Sub-Categoria</option>
                    </select>
                </div>
                <div class="elementos-input">
                    <label class="label-input">Sub-Sub-Categoria:</label>
                    <select name="select-sub-sub-categoria" class="input-text select-input" id="sub-sub-categoria-select" disabled>
                        <option disabled selected="Seleccionar">Seleccione Sub-Sub-Categoria</option>
                    </select>
                </div>

                <div class="input-normal">
                    <label class="label-input">Precio venta:</label>
                    <input class="input-text"  type="number" name="precio-venta" placeholder="Ingrese precio venta">
                </div>
                <div class="input-normal">
                    <label class="label-input">Precio oferta (Opcional):</label>
                    <input class="input-text" type="number" name="precio-oferta" placeholder="Ingrese precio oferta">
                </div>
            </div>

            <div class="derecha-form">
                <div class="input-normal">
                    <label class="label-input">Stock comprado:</label>
                    <input class="input-text" type="number" name="stock-comprado" placeholder="Ingrese la cantidad que se compro">
                </div>
                <div class="input-normal">
                    <label class="label-input">Informacion del producto(Opcional):</label>
                    <textarea class="input-text text-area" type="text" name="info-del-producto" placeholder="Ingrese informacion del producto"></textarea>
                </div>

                <div class="input-normal" style="margin-bottom: 20px;">
                    <label class="label-input">Visible <span style="font-size: 12px;">(Si el producto no esta visible no aparecerá en la web)</span></label>
                    <input type="checkbox" checked id="switch" name="visible">
                    <label for="switch" class="lbl"></label>
                </div>

                <div class="input-normal">
                    <label class="label-input">Imagen:</label>
                    <div class="contenedor-img-button-upload">
                        <div class="ver-imagen">
                            <img src="" id="showImg" style="display: none;">
                            <i class="fi fi-rr-picture" id="icon-svg-img"></i>
                        </div>
                        <div class="button-upload">
                            <input class="button-upload" type="file" name="imagen" id="file" onChange="loadFile(event)"  accept="image/*" required>
                            <label class="upload-text" for="file"><i class="fi fi-rr-upload"></i><p>Subir imagen</p></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="div-button">
            <button type="button" class="btn btn-iniciar-compra margin-btn btnhover" id="ingresar-producto">Ingresar producto</button>
        </div>
    </form>


    <div id="respuesta"></div>




<script>

var newImage, showImg;
function loadFile(event) {
    showImg = document.getElementById('showImg');
    svgimg = document.getElementById('icon-svg-img');
    showImg.src = URL.createObjectURL(event.target.files[0]);

    newImage = document.createElement('img');
    newImage.src = URL.createObjectURL(event.target.files[0]);
    
    showImg.style.display = "block";
    svgimg.style.display = "none";

    showImg.onload = function() {
        URL.revokeObjectURL(showImg.src) // free memory
    }
};


//FILTRADO DE CATEGORIAS-SUB-SUB

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

        });

//CUANDO APRETE INGRESAR
$('#ingresar-producto').click(function(){
                
                Swal.fire({
                    title: '¿Estás seguro de que quieres ingresar este producto?',
                    icon: 'warning',
                    backdrop: false,
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Ingresar',
                    cancelButtonColor: '#FF6969',
                    confirmButtonColor: '#61C923',
                    customClass: {
                        popup: 'my-swal-popup-class',
                      }
                }).then((result) => {
                if (result.isConfirmed) {
                var datos = new FormData($("#Formulario")[0]);
                $.ajax({
                    type:'POST',
                    url:'php/ingresarProducto.php',
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(datos){
                    respuesta = datos.trim();
                        Swal.fire({
                        title: 'Producto Ingresado Correctamente.',
                        icon: 'success',
                        backdrop: false,
                        allowOutsideClick: false,
                        showConfirmButton: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#61C923',
                        customClass: {
                            popup: 'my-swal-popup-class',
                        }
                    }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = 'ingresarProducto.php';
                            }
                        });
                    }
                });

            }
            });
            
});








</script>

</body>

</html>