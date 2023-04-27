<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_sub_categoria_seleccionada = $_POST['id_sub_categoria_seleccionada'];
$id_categoria_seleccionada = $_POST['id_categoria_seleccionada'];


//SELECCIONO VER TODO
if($id_sub_categoria_seleccionada == 0){
    $lista_sub_categoria_filtrada = $dao->buscarSubCategoriasPorCategoria($id_categoria_seleccionada);
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


//SI NO ES 0, OSEA QUE NO SELECCIONO VER TODO, PASA POR ACA Y BUSCAMOS SOLO LA CATEGORIA QUE SELECCIONO
else if($id_sub_categoria_seleccionada != 0){
    $lista_sub_categoria_filtrada = $dao->buscarSubCategoriasPorSubCategoria($id_sub_categoria_seleccionada);
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