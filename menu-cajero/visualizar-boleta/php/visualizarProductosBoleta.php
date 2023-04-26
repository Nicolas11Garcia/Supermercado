<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$numero_boleta = $_POST['numero_boleta']; //Recupero ID de producto de caja 

$productos_comprados_boleta = $dao->buscarDetalleSegunBoleta($numero_boleta);
if($productos_comprados_boleta == 0){
    echo 'no hay ';
}

else{
    echo '
    <table id="tabla">
        <thead>
            <tr>
                <th class="titular-fila">ID</th>
                <th class="titular-fila">Imagen</th>
                <th class="titular-fila">Titulo</th>
                <th class="titular-fila">Marca</th>
                <th class="titular-fila">Precio unitario</th>
                <th class="titular-fila">Cantidad</th>
            </tr>
        </thead>
    </table> 

    ';

    foreach($productos_comprados_boleta as $k){
        echo '
            <tr class="producto-item">
            <td >'.$k->getIdProducto().'</td>
            <td ><img class="img-producto" src="../../assets/imagenes/Productos/'.$k->getImagen().'"></td>
            <td class="titulo">'.$k->getTitulo().'</td>
            <td >'.$k->getMarca().'</td>
            <td >'.number_format($k->getPrecio(), 0, ',', '.').'</span></td>
            <td>1</td>
        </tr>
        
        ';
    }

}






?>