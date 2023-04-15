
<?php
include('Producto.php');
include('CarritoProductos.php');
include('Orden.php');

class DAO{
    private $con;

    public function conectarBD(){
        $servername = "localhost";
        $usuario = "root";
        $password = "";
        $bd = "supermercadooficial";
        
        $this->con = new mysqli($servername,$usuario,$password,$bd);
        
        if ($this->con->connect_errno) {
            echo "error";
        }
    }

    public function desconectorBD(){
        $this->con->close();
    }

    public function conectame(){
        $this->conectarBD();
        $this->desconectorBD();
    }






    //MOSTRAR PRODUCTOS
    public function mostrarTodosLosProductos(){
        $this->conectarBD();
    
        $sql = "SELECT productos.id, productos.titulo, marcas.descripcion AS 'marca', categorias.descripcion AS 'categoria',
        productos.precioventa,productos.preciooferta,productos.stockcomprado,productos.stock_actual,productos.informaciondelproducto,
        productos.imagen,productos.activo,productos.oferta
        FROM productos 
        INNER JOIN categorias on categorias.id = productos.fk_categoria_id 
        INNER JOIN marcas on marcas.id = productos.fk_marca_id";
        $resultado = $this->con->query($sql);
    
        $lista = array();
    
        while($r = mysqli_fetch_array($resultado)){
            $id = $r['id'];
            $titulo = $r['titulo'];
            $marca = $r['marca'];
            $categoria = $r['categoria'];
            $precioventa = $r['precioventa'];
            $preciooferta = $r['preciooferta'];
            $stockcomprado = $r['stockcomprado'];
            $stockactual = $r['stock_actual'];
            $informaciondelproducto = $r['informaciondelproducto'];
            $imagen = $r['imagen'];
            $activo = $r['activo'];
            $oferta = $r['oferta'];

            $producto = new Producto($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta);
            $lista[] = $producto;
    
        }
        $this->desconectorBD();
    
        return $lista;
    }

    //MOSTRAR PRODUCTO POR ID
    public function mostrarProductoPorId($id){
        $this->conectarBD();
    
        $sql = "SELECT productos.id, productos.titulo, marcas.descripcion AS 'marca', categorias.descripcion AS 'categoria',
        productos.precioventa,productos.preciooferta,productos.stockcomprado,productos.stock_actual,productos.informaciondelproducto,
        productos.imagen,productos.activo,productos.oferta
        FROM productos 
        INNER JOIN categorias on categorias.id = productos.fk_categoria_id 
        INNER JOIN marcas on marcas.id = productos.fk_marca_id WHERE productos.id = $id";
        $resultado = $this->con->query($sql);
    
        $lista = array();
    
        while($r = mysqli_fetch_array($resultado)){
            $id = $r['id'];
            $titulo = $r['titulo'];
            $marca = $r['marca'];
            $categoria = $r['categoria'];
            $precioventa = $r['precioventa'];
            $preciooferta = $r['preciooferta'];
            $stockcomprado = $r['stockcomprado'];
            $stockactual = $r['stock_actual'];
            $informaciondelproducto = $r['informaciondelproducto'];
            $imagen = $r['imagen'];
            $activo = $r['activo'];
            $oferta = $r['oferta'];

            $producto = new Producto($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta);
            $lista[] = $producto;
    
        }
        $this->desconectorBD();
    
        return $lista;
    }




    //REGISTRAR CLIENTE
    public function registrar_cliente($correo,$nombre,$apellido,$contraseña_normal){
        $this->conectarBD();
    
        $contrasena_encrip= MD5($contraseña_normal);
    
        $sql = "INSERT INTO usuarios VALUES(NULL,'$correo','$nombre','$apellido','$contrasena_encrip',1)";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }

    //INICIAR SESION
    public function inicioSesion($correo, $pass){
        $this->conectarBD();

        $pass_cf = MD5($pass);

        $sql = "SELECT * FROM usuarios WHERE BINARY correo = '$correo' and contraseña = '$pass_cf';";
        $resultado = $this->con->query($sql);

        $fila = mysqli_num_rows($resultado); //si hay filas

        $buscar_pass_estado = mysqli_fetch_array($resultado); //rol
        $pass_compara = $buscar_pass_estado['contraseña']; //contraseña de fila
        $id_de_usuario = $buscar_pass_estado['id'];
        $nombre = $buscar_pass_estado['nombre'];
        $apellido = $buscar_pass_estado['apellido'];
        

        $lista_informacion = array();

        if(($fila == 1) && ($pass_compara == $pass_cf) && $buscar_pass_estado['fk_rol_id'] == 1){
            $ingresado = 1;

            $lista_informacion[0] = $ingresado;
            $lista_informacion[1] = $id_de_usuario;
            $lista_informacion[2] = $nombre;
            $lista_informacion[3] = $apellido;

            return $lista_informacion;
        }

        else if(($fila == 1) && ($pass_compara == $pass_cf) && $buscar_pass_estado['fk_rol_id'] == 2){
            return 2; //admin
        }

        else{
            return 4;

        }
        $this->desconectorBD();
    }

    //Agregar productos al carrito
    public function agregarAlCarro($id_cliente,$id_producto,$cantidad){
        $this->conectarBD();
    
        $sql = "INSERT INTO carrito_usuarios VALUES($id_cliente,$id_producto,$cantidad)";
        $this->con->query($sql);
        $this->desconectorBD();
    }


    public function mostrarItemsCarrito($id_cliente){
        $this->conectarBD();

        $sql = "SELECT productos.id AS 'id_producto', productos.titulo, marcas.descripcion AS 'marca', productos.precioventa,productos.preciooferta,productos.informaciondelproducto,productos.imagen,productos.activo,productos.oferta,carrito_usuarios.cantidad AS 'cantidad_en_carrito' FROM carrito_usuarios INNER JOIN productos on productos.id = carrito_usuarios.id_producto_fk INNER JOIN marcas on marcas.id = productos.fk_marca_id 
        WHERE id_cliente_fk = $id_cliente;";

        $resultado = $this->con->query($sql);

        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_items_carrito = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_producto = $r['id_producto'];
                $titulo = $r['titulo'];
                $marca = $r['marca'];
                $precioventa = $r['precioventa'];
                $preciooferta = $r['preciooferta'];
                $informaciondelproducto = $r['informaciondelproducto'];
                $imagen = $r['imagen'];
                $activo = $r['activo'];
                $oferta = $r['oferta'];
                $cantidad_en_carrito = $r['cantidad_en_carrito'];

                $item = new CarritoProdutos($id_producto,$titulo,$marca,$precioventa,$preciooferta,$informaciondelproducto,$imagen,$activo,$oferta,$cantidad_en_carrito);

                $lista_items_carrito[] = $item;

            }
            $this->desconectorBD();

            return $lista_items_carrito;
        }

        else{
            return 0;
        }
    }

        //Actualizar Carrito
    public function actualizarCarrito($id_usuario,$id_producto,$cantidad){
        $this->conectarBD();
    
        $sql = "UPDATE carrito_usuarios SET cantidad = $cantidad WHERE id_producto_fk = $id_producto AND id_cliente_fk = $id_usuario" ;
        $resultado = $this->con->query($sql);
    
        if($resultado){
            return true;
        }
    
        else{
            return false;
        }

        $this->desconectorBD();

    }

    //BORRAR ITEM DEL CARRITO
    public function borrarItemCarrito($id_usuario,$id_producto){
        $this->conectarBD();
            
        $sql = "DELETE FROM carrito_usuarios WHERE id_producto_fk = $id_producto AND id_cliente_fk = $id_usuario";
                    
        $this->con->query($sql);

        $this->desconectorBD();
            
    }


             //CREANDOorden
    public function creandoOrden($id_cliente,$correo,$nombre,$apellido,$rut,$telefono,$region,$comuna,$calle,$numero,$total){
        $this->conectarBD();
        $conexion = $this->con;

        $estado = "Pendiente";
    
        $sql = "INSERT INTO orden VALUES(NULL,$id_cliente,NOW(),'$correo','$nombre','$apellido','$rut','$telefono','$region','$comuna','$calle','$numero',$total,'$estado')";
        $conexion->query($sql);

        $last_id = $conexion->insert_id; //obtener el ultimo id insertado para agregarle el detalle
        return $last_id;

        $conexion->desconectorBD();
        $this->desconectorBD();
        }
        
        
    //Agregar productos al detalle de la orden
    public function agregarAlDetalle($orden,$producto_id,$precio,$cantidad){
        $this->conectarBD();
    
        $sql = "INSERT INTO detalle VALUES(NULL,$orden,$producto_id,$precio,$cantidad)";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }

    
    //EDITAR CANTIDAD AL COMPRAR
    public function descontarStock($id_producto, $cantidadcomprada){
        $this->conectarBD();

        $sql = "UPDATE productos SET stock_actual = (stock_actual - $cantidadcomprada) WHERE id = $id_producto";
        $this->con->query($sql);

        $this->desconectorBD();
    }


    //BUSCAR ORDEN
    public function buscarOrden($id_orden){
        $this->conectarBD();

        $sql = "SELECT * FROM orden WHERE id = $id_orden";
        $resultado = $this->con->query($sql);

        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_ordenes = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_orden = $r['id'];
                $id_cliente = $r['fk_cliente_fk'];
                $fecha = $r['fecha'];

                $correo = $r['correo'];
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];
                $rut = $r['rut'];
                $telefono = $r['telefono'];

                $region = $r['region'];
                $comuna = $r['comuna'];
                $calle = $r['calle'];
                $numero = $r['numero'];

                $total =$r['total'];
                $estado =$r['estado'];

                $orden = new Orden($id_orden,$id_cliente,$fecha,$correo,$nombre,$apellido,$rut,$telefono,$region,$comuna,$calle,$numero,$total,$estado);

                $lista_ordenes[] = $orden;

            }
            $this->desconectorBD();

            return $lista_ordenes;
        }

        else{
            return 0;
        }
    }



    public function buscarDetalleSegunOrden($id_orden){
        $this->conectarBD();

        $sql = "SELECT productos.id AS 'id_producto', productos.titulo,marcas.descripcion AS 'marca',detalle.precio,productos.imagen, detalle.cantidad FROM productos INNER JOIN detalle on productos.id = detalle.producto_id_fk INNER JOIN marcas on marcas.id = productos.fk_marca_id 
        WHERE fk_orden_fk = $id_orden";
        $resultado = $this->con->query($sql);

        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id = $r['id_producto'];
                $titulo = $r['titulo'];
                $marca = $r['marca'];
                $precio= $r['precio'];
                $imagen = $r['imagen'];
                $cantidad = $r['cantidad'];

                $detalle = new ProductosComprados($id,$titulo,$marca,$precio,$imagen,$cantidad);

                $lista[] = $detalle;

            }
            $this->desconectorBD();

            return $lista;
        }

        else{
            return 0;
        }
    }


    

}


?>