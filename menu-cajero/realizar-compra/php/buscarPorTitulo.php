<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();


$titulo_producto = $_POST['titulo_producto'];

//Traemos los productos que contenga el mismo LIKE del titulo
$lista_productos = $dao->mostrarProductosPorTitulo($titulo_producto);


//IMPRIMIMOS TABLA
echo '
<table id="tabla-titulo">
                <thead>
                    <tr>
                        <th class="titular-fila">ID</th>
                        <th class="titular-fila">Imagen</th>
                        <th class="titular-fila">Titulo</th>
                        <th class="titular-fila">Marca</th>
                        <th class="titular-fila">Precio venta</th>
                        <th class="titular-fila">Precio oferta</th>
                        <th class="titular-fila"></th>
                    </tr>
                </thead>


';


//Imprimimos los productos que coinciden con lo que escribe el usuario
foreach($lista_productos as $k){
    echo '
    <tr class="producto-item" id="item-producto'.$k->getId().'">
        <td style="width: 120px;">'.$k->getId().'</td>
        <td style="width: 120px;"><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
        <td class="titulo">'.$k->getTitulo().'</td>
        <td style="width: 150px;">'.$k->getMarca().'</td>
        <td style="width: 150px;">'.number_format($k->getPrecioVenta(), 0, ',', '.').'</span></td>
        <td style="width: 150px;">'.number_format($k->getPrecioOferta(), 0, ',', '.'). '<span style="color: #51AA1B;"> (O.F)</span></span></td>
        <td style="width: 150px;"><button type="button" class="btn agregar-al-detalle" style="min-width: 100px; width:150px" id="'.$k->getId().'">Agregar producto</button></td>
    </tr>

    ';

}





?>