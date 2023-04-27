<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_categoria_seleccionada = $_POST['id_categoria_seleccionada'];


//AL IMPLEMENTAR FILTRAR POR CATEGORIA EN SUB SUB-CATEGORIA
//Necesitamos hace otro dao que traiga los datos de sub-sub-categoria relacionados con las otras 2 tablas
//Porque? porque la tabla de subsubcategoria pide datos de categoria y sub categoria
//Es decir implementamos un campo mas para la tabla en comparacion a gestionar sub-categorias

//En sub-categorias solo necesito 2 campos, aqui necesito 3 por lo que debo crear otra funcion en el dao
//que recupere mi categoria, sub-categoria sub-sub....;

//SELECCIONO VER TODO
if($id_categoria_seleccionada == 0){
    $lista_sub_categorias = $dao->buscarSubSubCategorias();
    echo '
    <table id="tabla">
    <thead>
        <tr>
            <th class="titular-fila">Categoria</th>
            <th class="titular-fila">Sub-Categoria</th>
            <th class="titular-fila">Sub-Sub-Categorias</th>
            <th class="titular-fila"></th>
        </tr>
    </thead>

    ';

    foreach ($lista_sub_categorias as $k){
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

    echo '</table>';

}


//SI NO ES 0, OSEA QUE NO SELECCIONO VER TODO, PASA POR ACA Y BUSCAMOS SOLO LA CATEGORIA QUE SELECCIONO
else if($id_categoria_seleccionada != 0){
    $lista_sub_categoria_filtrada = $dao->buscarSubSubCategoriasSegunCategoria($id_categoria_seleccionada);
        echo '
    <table id="tabla">
    <thead>
        <tr>
            <th class="titular-fila">Categoria</th>
            <th class="titular-fila">Sub-Categoria</th>
            <th class="titular-fila">Sub-Sub-Categorias</th>
            <th class="titular-fila"></th>
        </tr>
    </thead>

    ';

    foreach ($lista_sub_categoria_filtrada as $k){
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

    echo '</table>';
}





?>