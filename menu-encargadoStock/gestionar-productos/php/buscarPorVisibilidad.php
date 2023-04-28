<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$visibilidad_seleccionada = $_POST['visibilidad_seleccionada'];

echo '
<table id="tabla">
<thead>
    <tr>
        <th class="titular-fila">ID</th>
        <th class="titular-fila">Imagen</th>
        <th class="titular-fila">Titulo</th>
        <th class="titular-fila">Marca</th>
        <th class="titular-fila">Sub-Sub-Categoria</th>
        <th class="titular-fila">Precio venta</th>
        <th class="titular-fila">Precio oferta</th>
        <th class="titular-fila">Stock comprado</th>
        <th class="titular-fila">Stock actual</th>
        <th class="titular-fila">Visible</th>
        <th class="titular-fila"></th>
    </tr>
</thead>

';

if($visibilidad_seleccionada == 'visibles'){
    $lista_productos_visibles = $dao->mostrarTodosLosProductos();
    foreach($lista_productos_visibles as $k){
        //SOLO IMPRIMOS LOS VISIBLES, NO HACE FALTA HACER OTRA FUNCION EN  DAO;
        if($k->getVisible() == 1){
            echo '
            <tr class="producto-item">
                        <td style="width: 40px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 120px;">'.$k->getMarca().'</td>
                        <td style="width: 120px;">'.$k->getSubSubCategoria().'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">'.$k->getStockComprado().'</td>
                        <td style="width: 70px;">'.$k->getStockActual().'</td>

                        <td style="width: 70px;">';

                        if($k->getVisible() == 0){
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="no-visible-check"></label>
                            </div>
                            ';
                        }
                        else{
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="visible-check"></label>
                            </div>';
                        }

                        echo '
                        </td>
                        <td style="width: 80px;">
                            <div class="botones-opciones" >
                                <div class="editar boton-opcion" style="width:80px; font-size:13px" >
                                        <a href="editarProducto.php?id_producto='.$k->getId().'">Editar</a>
                                </div>
                            </div>
            
                        </td>
                    </tr>

                ';
        }

    }

    echo '</table>';
}

else if($visibilidad_seleccionada == 'no-visibles'){
    $lista_productos_visibles = $dao->mostrarTodosLosProductos();
    foreach($lista_productos_visibles as $k){
        //SOLO IMPRIMOS LOS NO-VISIBLES, NO HACE FALTA HACER OTRA FUNCION EN  DAO;
        if($k->getVisible() == 0){
            echo '
            <tr class="producto-item">
                        <td style="width: 40px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 120px;">'.$k->getMarca().'</td>
                        <td style="width: 120px;">'.$k->getSubSubCategoria().'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">'.$k->getStockComprado().'</td>
                        <td style="width: 70px;">'.$k->getStockActual().'</td>

                        <td style="width: 70px;">';

                        if($k->getVisible() == 0){
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="no-visible-check"></label>
                            </div>
                            ';
                        }
                        else{
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="visible-check"></label>
                            </div>';
                        }

                        echo '
                        </td>
                        <td style="width: 80px;">
                            <div class="botones-opciones" >
                                <div class="editar boton-opcion" style="width:80px; font-size:13px" >
                                        <a href="editarProducto.php?id_producto='.$k->getId().'">Editar</a>
                                </div>
                            </div>
            
                        </td>
                    </tr>

                ';
        }

    }

}

else if($visibilidad_seleccionada == 'ver-todo'){
    $lista_productos_visibles = $dao->mostrarTodosLosProductos();
    foreach($lista_productos_visibles as $k){
            echo '
            <tr class="producto-item">
                        <td style="width: 40px;">'.$k->getId().'</td>
                        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
                        <td class="titulo">'.$k->getTitulo().'</td>
                        <td style="width: 120px;">'.$k->getMarca().'</td>
                        <td style="width: 120px;">'.$k->getSubSubCategoria().'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioVenta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">$'.number_format($k->getPrecioOferta(), 0, ',', '.').'</td>
                        <td style="width: 70px;">'.$k->getStockComprado().'</td>
                        <td style="width: 70px;">'.$k->getStockActual().'</td>

                        <td style="width: 70px;">';

                        if($k->getVisible() == 0){
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="no-visible-check"></label>
                            </div>
                            ';
                        }
                        else{
                            echo '
                            <div class="swtich-container">
                                <input type="checkbox" class="switch">
                                <label for="switch" class="visible-check"></label>
                            </div>';
                        }

                        echo '
                        </td>
                        <td style="width: 80px;">
                            <div class="botones-opciones" >
                                <div class="editar boton-opcion" style="width:80px; font-size:13px" >
                                        <a href="editarProducto.php?id_producto='.$k->getId().'">Editar</a>
                                </div>
                            </div>
            
                        </td>
                    </tr>

                ';

    }
}


?>