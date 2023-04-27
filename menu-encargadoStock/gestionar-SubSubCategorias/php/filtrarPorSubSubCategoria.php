<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$id_sub_categoria_seleccionada = $_POST['id_sub_categoria_seleccionada'];
$id_sub_sub_categoria_seleccionada = $_POST['id_sub_sub_categoria_seleccionada'];


//Explicacion
//Si el usuario cambia el select de categoria, obtenemos el id de la categoria
//Si el usuario cambia el select de SUB-categoria, obtenemos el id de la sub-categoria

//Por lo tanto, si queremos mostrarle al usuario lo que el quiere filtrado
//EJEMPLO: Supermercado(Categoria) tiene Sub-categoria (Congelados, Desayunos) Y de sub-sub-categoria (Congelados tiene algunos, y Desayunos otros);

//Entonces creamos una funcion que filtre las sub-sub-categoria segun la sub-categoria que selecciono
//Si selecciono Congelados que se le muestren solo las sub-sub-categoria de congelados;
//La funcion nos motrara la categoria, sub-categoria y sub-subcategoria.


// aclaracion: La categoria esta explicada en "filtrarPorCategoria.php"


//SELECCIONO VER TODO
if($id_sub_sub_categoria_seleccionada == 0){
    $lista_sub_sub_categoria_filtrada = $dao->buscarSubSubCategoriasSegunSubCategoria($id_sub_categoria_seleccionada);
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
    foreach ($lista_sub_sub_categoria_filtrada as $k){
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
else if($id_sub_sub_categoria_seleccionada != 0){
    $lista_sub_sub_categoria_filtrada = $dao->buscarSubSubCategoriasSegunSubSubCategoria($id_sub_sub_categoria_seleccionada);
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

    foreach ($lista_sub_sub_categoria_filtrada as $k){
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