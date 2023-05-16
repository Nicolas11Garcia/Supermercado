<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$estado_seleccionada = $_POST['estado_seleccionada'];

echo '
<table id="tabla">
<thead>
    <tr>
        <th class="titular-fila">N° de orden</th>
        <th class="titular-fila">Fecha</th>
        <th class="titular-fila">Total del pedido</th>
        <th class="titular-fila">Estado</th>
        <th class="titular-fila"></th>
    </tr>
</thead>

';

if($estado_seleccionada == 'pendientes'){
    $lista_ordenes = $dao->mostrarTodasOrdenes();
    foreach($lista_ordenes as $k){
        //SOLO IMPRIMOS LOS VISIBLES, NO HACE FALTA HACER OTRA FUNCION EN  DAO;
        if($k->getEstado() == 'Pendiente'){
            echo '
            <tr class="producto-item">
                <td>'.$k->getNumeroOrden().'</td>
                <td class="titulo">'.$k->getFecha().'</td>
                <td>$'.number_format($k->getTotal(), 0, ',', '.').'</td>
                <td style="width:200px">'.$k->getEstado().'</td>
                <td style="width:200px;">
                    <div class="botones-opciones" >
                            <div class="editar boton-opcion" style="width:120px; font-size:13px; background: #51AA1B;" >
                            <i style="margin-top: 3px;" class="fi fi-rr-eye"></i><a href="visualizarOrden.php?numero_orden='.$k->getNumeroOrden().'">Ver orden</a>
                        </div>
                    </div>

                </td>
            </tr>
            ';
        }

    }

    echo '</table>';
}

else if($estado_seleccionada == 'finalizadas'){
    $lista_ordenes = $dao->mostrarTodasOrdenes();
    foreach($lista_ordenes as $k){

        if($k->getEstado() == 'Finalizada'){
            echo '
            <tr class="producto-item">
                <td>'.$k->getNumeroOrden().'</td>
                <td class="titulo">'.$k->getFecha().'</td>
                <td>$'.number_format($k->getTotal(), 0, ',', '.').'</td>
                <td style="width:200px">'.$k->getEstado().'</td>
                <td style="width:200px;">
                    <div class="botones-opciones" >
                    <div class="editar boton-opcion" style="width:120px; font-size:13px; background: #51AA1B;" >
                    <i style="margin-top: 3px;" class="fi fi-rr-eye"></i><a href="visualizarOrden.php?numero_orden='.$k->getNumeroOrden().'">Ver orden</a>
                </div>
                    </div>

                </td>
            </tr>
            ';
        }

    }

}

else if($estado_seleccionada == 'ver-todo'){
    $lista_ordenes = $dao->mostrarTodasOrdenes();
    foreach($lista_ordenes as $k){
            echo '
            <tr class="producto-item">
                <td>'.$k->getNumeroOrden().'</td>
                <td class="titulo">'.$k->getFecha().'</td>
                <td>$'.number_format($k->getTotal(), 0, ',', '.').'</td>
                <td style="width:200px">'.$k->getEstado().'</td>
                <td style="width:200px;">
                    <div class="botones-opciones" >
                    <div class="editar boton-opcion" style="width:120px; font-size:13px; background: #51AA1B;" >
                    <i style="margin-top: 3px;" class="fi fi-rr-eye"></i><a href="visualizarOrden.php?numero_orden='.$k->getNumeroOrden().'">Ver orden</a>
                </div>
                    </div>

                </td>
            </tr>
            ';
    }
}


?>