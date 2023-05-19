<?php

include('../php/class/Dao.php');
$dao = new DAO();

session_start();

$numero_en_carrito = 0;


    //LOGIN
    if (isset($_SESSION["nombre_usuario"]) == true){
            $id_cliente = $_SESSION['id_usuario'];
            //Lista productos en carrito
            $items_dentro_de_carrito = $dao->mostrarItemsCarrito($id_cliente);
            //NO HAY ITEMS EN EL CARRITO
            if($items_dentro_de_carrito != 0){
                foreach ($items_dentro_de_carrito as $k) {
                    $numero_en_carrito = $numero_en_carrito + $k->getCantidadEnCarrito();
                }

            }
        
        echo $numero_en_carrito;
    }
    //NO LOGIN
    else if((isset($_SESSION["nombre_usuario"]) == false)){

        $contador_cantidad = 0;

        //SI EXISTE LA LISTA (osea si agrego productos al carrito)
        if(isset($_SESSION["id_productos_carrito"])){
            //SI HAY 1 O MAS PRODUCTOS EN EL CARRITO (PUEDE EXISTIR LA LISTA PERO QUE NO TENGA PRODUCTOS)
            if(sizeof($_SESSION["id_productos_carrito"]) >= 1){
                foreach($_SESSION['cantidad'] as $key => $value){
                    $contador_cantidad = $contador_cantidad + $value;
                }
                $numero_en_carrito = $contador_cantidad;

            }
        }
        echo $numero_en_carrito;
    }







?>