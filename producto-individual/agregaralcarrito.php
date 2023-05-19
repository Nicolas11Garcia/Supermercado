<?php

include('../php/class/Dao.php');
$dao = new DAO();

session_start();

$id_producto_url = $_POST['id_producto_url'];
$cantidad_seleccionada = $_POST['cantidad_seleccionada'];



//OBTENER DATOS DEL PRODUCTO EJ: STOCK-ACTUAL
$producto_url = $dao->mostrarProductoPorId($id_producto_url); //INFORMACION DEL PRODUCTO QUE SE QUIERA AGREGAR
$stock_actual = 0;
foreach ($producto_url as $k) {
    $stock_actual = $k->getStockActual();
}


    //Validacion si la cantidad ingresada por el usuario es mayor que el stock actual
    if($cantidad_seleccionada <= $stock_actual){

        //LOGIN
        if (isset($_SESSION["nombre_usuario"]) == true){
            //Cliente logeado
            $id_cliente = $_SESSION['id_usuario'];

            $items_dentro_de_carrito = $dao->mostrarItemsCarrito($id_cliente); //Obtenemos todos los productos en el carrito segun el usuario

            $id_encontrado = 0; 
            $cantidad_nueva_a_ingresar = 0; 

            //NO HAY ITEMS EN EL CARRITO
            if($items_dentro_de_carrito == 0){

            }

            //HAY ITEMS EN EL CARRITO
            else if($items_dentro_de_carrito >= 1){
                foreach ($items_dentro_de_carrito as $k) {
                    //Si desea agregar otra cantidad de un producto que ya esta en el carrito, que se sume la nueva cantidad con la cantidad que ya existe en el carrito
                    if($k->getId() == $id_producto_url){ 
                        $id_encontrado = 1; //Sabemos que el producto que quiere ingresar ya esta en el carrito
                        $cantidad_nueva_a_ingresar =  $k->getCantidadEnCarrito()  + $cantidad_seleccionada; //Sumamos la nueva cantidad con la antigua;
                        break;
                    }
        
                }
            }


            //Existe el producto que quiere ingresar en el carrito? actualiza solo la cantidad
            if($id_encontrado >= 1){
                $actualizar = $dao->actualizarCarrito($id_cliente,$id_producto_url,$cantidad_nueva_a_ingresar);
                echo "<script>
                Swal.fire({
                  title: 'El producto se agrego al carrito correctamente.',
                  icon: 'success',
                  confirmButtonText: 'Aceptar',
                  confirmButtonColor: '#61C923'
                })
                </script>";
            }

            //No existe? agregalo al carrito normalmente
            else{
                $agregaralcarro = $dao->agregarAlCarro($id_cliente,$id_producto_url,$cantidad_seleccionada);
                echo "<script>
                    Swal.fire({
                      title: 'El producto se agrego al carrito correctamente.',
                      icon: 'success',
                      confirmButtonText: 'Aceptar',
                      confirmButtonColor: '#61C923'
                    })
                    </script>";
            }


        }
        //NO LOGIN
        else if((isset($_SESSION["nombre_usuario"]) == false)){
                //SI NO EXISTE LA SESSION DEL CARRITO EJ: NUNCA SE HAN AÑADIDO PRODUCTOS AL CARRITO
                if(!isset($_SESSION["id_productos_carrito"])){
                    $_SESSION["id_productos_carrito"][] = $id_producto_url;
                    $_SESSION["cantidad"][] = $cantidad_seleccionada;

                    echo "<script>
                    Swal.fire({
                      title: 'El producto se agrego al carrito correctamente.',
                      icon: 'success',
                      confirmButtonText: 'Aceptar',
                      confirmButtonColor: '#61C923'
                    })
                    </script>";
                }
                //SI YA EXISTE LA SESION DEL CARRITO, AGREGA LOS NUEVOS PRODUCTOS ACA
                else{
                    $existe_producto = 0;

                    //Busco si el el producto que quiere ingresar ya existe en la lista
                    foreach($_SESSION['id_productos_carrito'] as $key => $value){
                        //Existe el producto en la lista? cambia la cantidad
                        if($value == $id_producto_url){
                            $existe_producto = 1;
                            //RECORRO TODAS LAS CANTIDADES DE LOS PRODUCTOS
                            foreach($_SESSION['cantidad'] as $key_cantidad => $value){
                                //LA LLAVE DEL PRODUCTO [1] ES IGUAL A LA DE CANTIDAD [1] CAMBIARA LA CANTIADAD SUMANDOLA
                                if($key == $key_cantidad){
                                    //Variable que suma la cantidad del producto del carro con la nueva ingresada 
                                    //EJ: 19 cantidad queria del producto 1, quiere 4 mas, sumar a 23
                                    $cantidad_sumada_a_ingresar = $value + $cantidad_seleccionada;

                                    //SI LA CANTIDAD SUMADA QUE DESEA SUPERA EL STOCK ACTUAL
                                    if($cantidad_sumada_a_ingresar <= $stock_actual){
                                        $_SESSION['cantidad'][$key_cantidad] = $cantidad_sumada_a_ingresar;

                                        echo "<script>
                                        Swal.fire({
                                          title: 'El producto se agrego al carrito correctamente.',
                                          icon: 'success',
                                          confirmButtonText: 'Aceptar',
                                          confirmButtonColor: '#61C923'
                                        })
                                        </script>";
                                    }
                                    else{
                                        echo "<script>
                                        Swal.fire({
                                          title: 'La cantidad que deseas, excede nuestro stock.',
                                          icon: 'error',
                                          confirmButtonText: 'Aceptar',
                                          confirmButtonColor: '#61C923'
                                        })
                                        </script>";
                                        break;
                                    }

                                }
                            }
                        }
                    }

                    if($existe_producto == 0){
                        //Si no existe el producto en el carrito
                        $_SESSION["id_productos_carrito"][] = $id_producto_url;
                        $_SESSION["cantidad"][] = $cantidad_seleccionada;

                        echo "<script>
                        Swal.fire({
                          title: 'El producto se agrego al carrito correctamente.',
                          icon: 'success',
                          confirmButtonText: 'Aceptar',
                          confirmButtonColor: '#61C923'
                        })
                        </script>";
                    }
            }
        }
    }

    else{
        
        echo "<script>
        Swal.fire({
          title: 'La cantidad que deseas, excede nuestro stock.',
          icon: 'error',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#61C923'
        })
        </script>";

    }







?>