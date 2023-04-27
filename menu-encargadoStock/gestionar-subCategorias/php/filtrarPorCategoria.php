<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();


//RECUPERAMOS EL ID de la "Categoria" MEDIANTE EL SELECT
$id_categoria_seleccionada = $_POST['id_categoria_seleccionada'];


//SELECCIONO VER TODO, SI ES 0 ES PORQUE SELECCIONO VER TODO
if($id_categoria_seleccionada == 0){
    $lista_sub_categorias = $dao->buscarSubCategorias(); //ES DECIR IMPRIMOS TODAS LAS SUBCATEGORIAS --la funcion buscarSubCategorias contiene Las categorias FK
    
    //IMPRIMOS LA TABLA ANTES DEL CICLO FOR PARA QUE NO SE REPITA
    echo '
    <table id="tabla">
    <thead>
        <tr>
            <th class="titular-fila">Categoria</th>
            <th class="titular-fila">Sub-Categoria</th>
            <th class="titular-fila">Sub-Sub-Categorias Asociadas</th>
            <th class="titular-fila"></th>
        </tr>
    </thead>

    ';
    //IMPRIMIMOS TODOS LAS CATEGORIAS JUNTO CON SU SUBCATEGORIA
    foreach ($lista_sub_categorias as $k){
        echo '
        <tr class="producto-item">
            <td style="width: 400px;">'.$k->getDescripcionCategoria().'</td>
            <td style="width: 400px;">'.$k->getDescripcionSubCategoria().'</td>
            <td style="width: 400px;">0</td>
            <td style="padding-left: 400px;">
                <div class="botones-opciones">
                    <div class="editar boton-opcion">
                            <a href="editarSubCategoria.php?id_subcategoria='.$k->getDescripcionSubCategoria().'" style="cursor: pointer; color: white; text-decoration: none;">Editar</a>
                    </div>
                </div>
            </td>
        </tr>
        ';
    }

    echo '</table>';

}


//SI NO ES 0, OSEA QUE NO SELECCIONO VER TODO, PASA POR ACA Y BUSCAMOS SOLO LA CATEGORIA QUE SELECCIONO
else if($id_categoria_seleccionada != 0){
    $lista_sub_categoria_filtrada = $dao->buscarSubCategoriasPorCategoria($id_categoria_seleccionada); //BUSCAMOS LA SUBCATEGORIA MEDIANTE EL id de la categoria que selecciono
    
    //IMPRIMOS LA TABLA ANTES DEL CICLO FOR PARA QUE NO SE REPITA
    echo '
    <table id="tabla">
    <thead>
        <tr>
            <th class="titular-fila">Categoria</th>
            <th class="titular-fila">Sub-Categoria</th>
            <th class="titular-fila">Sub-Sub-Categorias Asociadas</th>
            <th class="titular-fila"></th>
        </tr>
    </thead>

    ';

    //IMPRIMIMOS LO QUE CONTIENE LA LISTA
    foreach ($lista_sub_categoria_filtrada as $k){
        echo '
        <tr class="producto-item">
            <td style="width: 400px;">'.$k->getDescripcionCategoria().'</td>
            <td style="width: 400px;">'.$k->getDescripcionSubCategoria().'</td>
            <td style="width: 400px;">0</td>
            <td style="padding-left: 400px;">
                <div class="botones-opciones">
                    <div class="editar boton-opcion">
                            <a href="editarSubCategoria.php?id_subcategoria='.$k->getDescripcionSubCategoria().'" style="cursor: pointer; color: white; text-decoration: none;">Editar</a>
                    </div>
                </div>
            </td>
        </tr>
        ';
    }

    echo '</table>';
}





?>