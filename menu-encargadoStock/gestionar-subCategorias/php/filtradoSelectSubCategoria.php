<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();


//FILTRADO PARA QUE APAREZCAN SOLO LAS OPCIONES DEL SELECT ANTERIORMENTE SELECCIONADO
//EJ_ XI REGION SELECT , QUE APAREZCAN LAS COMUNAS DE LA XI REGION  

$id_categoria_seleccionada = $_POST['id_categoria_seleccionada']; //OBTENEMOS EL ID DE LA CATEGORIA QUE SELECCIONO EN EL SELECT

$lista_sub_categoria_filtrada = $dao->buscarSubCategoriasPorCategoria($id_categoria_seleccionada); //BUSCAMOS TODAS LAS SUB-CATEGORIAS SEGUN LA CATEGORIA
//IMPRIMIMOS UN SELECT PORQUE SE REEMPLAZARA AL SELECT DE SUB-CATEGORIA que es el que queremos cambiar segun lo que ingrese el usuario
echo '
<select>
    <option disabled selected="Seleccionar">Seleccione Sub-Categoria</option>';


    //IF PARA QUE NO LE LANCE "VER TODO" CUANDO NO HAY NINGUNA CATEGORIA SELECCIONADA Y NO OCURRA UN ERROR
    if($id_categoria_seleccionada == 0){

    }
    else{
        echo'
        <option value="0">Ver todas</option>';
    
    }

//IMPRIMIMOS TODAS LAS SUBCATEGORIAS DENTRO DE LAS OPCIONES DEL SELECT
//En otras palabras, imprimimos todas las comunas de la region seleccionada
foreach ($lista_sub_categoria_filtrada as $k){
    echo '
        <option value="'.$k->getIdSubCategoria().'">'.$k->getDescripcionSubCategoria().'</option>
    ';
}

echo '</select>';