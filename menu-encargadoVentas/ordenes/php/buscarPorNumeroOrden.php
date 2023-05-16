<?php
include('../../../php/class/Dao.php');
session_start();
$dao = new DAO();

$numero_orden = $_POST['numero_orden'];


//AL INGRESAR NADA EN EL INPUT ID, QUIERO QUE LE MUESTRE TODAS LOS PRODUCTOS
if(is_numeric($numero_orden) || $numero_orden == ""){
    if($numero_orden == ""){
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
    echo '
        </table>'; 

    }


    //SI EXISTE EL ID QUE INGRESO QUE LE MUESTRE LA ORDEN

    //Primer IF para cuando haya escrito, pero lo borre y quede en "" el input, no existe el error
    else if($numero_orden >= 0){
        $lista_datos_orden = $dao->buscarOrden($numero_orden);
        //SI Existe el id del producto que quiere, que lo imprima
        if($lista_datos_orden){
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
        
                    foreach($lista_datos_orden as $k){
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
        echo '
            </table>'; 
        }
        
        else{
            echo 'No existe orden con ese numero';
        }
    }
}

else{
    echo 'Solo aceptamos numeros';
}


?>