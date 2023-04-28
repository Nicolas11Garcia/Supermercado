
<?php
include('Producto.php');
include('CarritoProductos.php');
include('Orden.php');
include('Usuario.php');
include('Boleta.php');
include('Categorias.php');
include('Reporte.php');
include('Marcas.php');

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
    
        $sql = "SELECT productos.id, productos.titulo, marcas.descripcion AS 'marca', categorias.descripcion  AS 'categoria',
        productos.precioventa,productos.preciooferta,productos.stockcomprado,productos.stock_actual,productos.informaciondelproducto,
        productos.imagen,productos.activo,productos.oferta, sub_categorias.descripcion AS 'sub_categoria', sub_sub_categorias.descripcion AS 'sub_sub_categoria', productos.visible
        FROM productos 
        INNER JOIN categorias on categorias.id = productos.fk_categorias_id
        INNER JOIN sub_categorias on sub_categorias.id = productos.fk_sub_categoria_id
        INNER JOIN sub_sub_categorias on sub_sub_categorias.id = productos.fk_sub_sub_categoria_id
        INNER JOIN marcas on marcas.id = productos.fk_marca_id
        ORDER BY productos.id DESC";
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
            $visible = $r['visible'];
            $sub_categoria = $r['sub_categoria'];
            $sub_sub_categoria = $r['sub_sub_categoria'];

            $producto = new Producto($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta,$visible,$sub_categoria,$sub_sub_categoria);
            $lista[] = $producto;
    
        }
        $this->desconectorBD();
    
        return $lista;
    }

    //MOSTRAR PRODUCTO POR ID
    public function mostrarProductoPorId($id){
        $this->conectarBD();
    
        $sql = "SELECT productos.id, productos.titulo, marcas.descripcion AS 'marca', categorias.descripcion  AS 'categoria',
        productos.precioventa,productos.preciooferta,productos.stockcomprado,productos.stock_actual,productos.informaciondelproducto,
        productos.imagen,productos.activo,productos.oferta, sub_categorias.descripcion AS 'sub_categoria', sub_sub_categorias.descripcion AS 'sub_sub_categoria', productos.visible
        FROM productos 
        INNER JOIN categorias on categorias.id = productos.fk_categorias_id
        INNER JOIN sub_categorias on sub_categorias.id = productos.fk_sub_categoria_id
        INNER JOIN sub_sub_categorias on sub_sub_categorias.id = productos.fk_sub_sub_categoria_id
        INNER JOIN marcas on marcas.id = productos.fk_marca_id
        WHERE productos.id = $id";
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
            $visible = $r['visible'];
            $sub_categoria = $r['sub_categoria'];
            $sub_sub_categoria = $r['sub_sub_categoria'];

            $producto = new Producto($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta,$visible,$sub_categoria,$sub_sub_categoria);
            $lista[] = $producto;
    
        }
        $this->desconectorBD();
    
        return $lista;
    }

    //MOSTRAR MARCAS
    public function mostrarMarcas(){
        $this->conectarBD();
    
        $sql = "SELECT * FROM marcas";
        $resultado = $this->con->query($sql);
    
        $lista = array();
    
        while($r = mysqli_fetch_array($resultado)){
            $id = $r['id'];
            $descripcion = $r['descripcion'];

            $marca = new Marca($id,$descripcion);
            $lista[] = $marca;
    
        }
        $this->desconectorBD();
    
        return $lista;
    }
    

    //BUSCAR DATOS DE CLIENTE RUT
    public function datosClienteRut($rut){
        $this->conectarBD();
        $sql = "SELECT * FROM usuarios where rut = '$rut'";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas
        
        $datos_usuario = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id = $r['id'];
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];

                $usuario = new Usuario($id,$rut,$nombre,$apellido);
                $datos_usuario[] = $usuario;

            }
            $this->desconectorBD();
            return $datos_usuario;
        }

        else{
            return 0;
        }
    }

    //BUSCAR DATOS DE CLIENTE RUT POR ID
    public function datosClienteID($id){
        $this->conectarBD();
        $sql = "SELECT * FROM usuarios where id = '$id'";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas
        
        $datos_usuario = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id = $r['id'];
                $rut = $r['rut'];
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];

                $usuario = new Usuario($id,$rut,$nombre,$apellido);
                $datos_usuario[] = $usuario;

            }
            $this->desconectorBD();
            return $datos_usuario;
        }

        else{
            return 0;
        }
    }

    //REGISTRAR CLIENTE
    public function registrar_usuario_caja($rut,$nombre,$apellido){
        $this->conectarBD();
    
        $sql = "INSERT INTO usuarios VALUES(NULL,'$rut','','$nombre','$apellido','',1)";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }

    public function buscarRut($rut){
        $this->conectarBD();
    
        $sql = "SELECT * FROM usuarios where rut = '$rut'";
        $resultado = $this->con->query($sql);
        $filas = mysqli_num_rows($resultado);

        //SI HAY REGISTROS CON ESE RUT
        if($filas >=1){
            return 1;
        }

        //NO HAY REGISTROS CON ESE RUT
        else{
            return 0;
        }
        
        return $filas;

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

        else if(($fila == 1) && ($pass_compara == $pass_cf) && $buscar_pass_estado['fk_rol_id'] == 4){
            $lista_informacion[0] = 4; //rol
            $lista_informacion[1] = $id_de_usuario;
            $lista_informacion[2] = $nombre;
            $lista_informacion[3] = $apellido;

            return $lista_informacion;
        }

        else if(($fila == 1) && ($pass_compara == $pass_cf) && $buscar_pass_estado['fk_rol_id'] == 2){
            $lista_informacion[0] = 2; //rol
            $lista_informacion[1] = $id_de_usuario;
            $lista_informacion[2] = $nombre;
            $lista_informacion[3] = $apellido;

            return $lista_informacion;
        }

        else if(($fila == 1) && ($pass_compara == $pass_cf) && $buscar_pass_estado['fk_rol_id'] == 3){
            $lista_informacion[0] = 3; //rol
            $lista_informacion[1] = $id_de_usuario;
            $lista_informacion[2] = $nombre;
            $lista_informacion[3] = $apellido;

            return $lista_informacion;
        }

        else{
            return 0;

        }
        $this->desconectorBD();
    }

    //REGISTRAR CLIENTE
    public function registrar_cliente($rut,$correo,$nombre,$apellido,$contraseña_normal){
        $this->conectarBD();
    
        $contrasena_encrip= MD5($contraseña_normal);
    
        $sql = "INSERT INTO usuarios VALUES(NULL,'$rut','$correo','$nombre','$apellido','$contrasena_encrip',1)";
        $this->con->query($sql);
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

    //Agregar productos a detalle temporal de la orden
    public function agregarAlDetalleTemportal($id_producto,$precio,$rut){
        $this->conectarBD();
    
        $sql = "INSERT INTO productos_detalle_boleta_temporal VALUES(NULL,$id_producto,$precio,'$rut')";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }

    //MOSTRAMOS TODOS LOS PRODUCTOS AGREGADOS
    public function mostrarItemsDetalleBoleta($rut){
        $this->conectarBD();

        $sql = "SELECT productos_detalle_boleta_temporal.id AS 'id_posicion', productos.id AS 'id_producto', productos.titulo, marcas.descripcion AS 'marca', 
        productos_detalle_boleta_temporal.precio ,productos.informaciondelproducto,productos.imagen,
        productos.activo,productos.oferta
        FROM productos_detalle_boleta_temporal 
        INNER JOIN productos on productos.id = productos_detalle_boleta_temporal.producto_id_fk 
        INNER JOIN marcas on marcas.id = productos.fk_marca_id
        WHERE productos_detalle_boleta_temporal.rut = '$rut'";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_items_detalle_boleta = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_posicion = $r['id_posicion'];
                $id_producto = $r['id_producto'];
                $titulo = $r['titulo'];
                $marca = $r['marca'];
                $precio = $r['precio'];
                $imagen = $r['imagen'];
                $activo = $r['activo'];
                $oferta = $r['oferta'];

                $item = new ProductosDetalleBoleta($id_posicion,$id_producto,$titulo,$marca,$precio,$imagen,$activo,$oferta);

                $lista_items_detalle_boleta[] = $item;

            }
            $this->desconectorBD();
            return $lista_items_detalle_boleta;
        }

        else{
            return 0;
        }
    }

    //BORRAR Producto de
    public function borrarProductoDetalleTemportal($id_posicion){
        $this->conectarBD();
            
        $sql = "DELETE FROM productos_detalle_boleta_temporal WHERE id = $id_posicion";
        $this->con->query($sql);
        $this->desconectorBD();
            
    }

    //CREAR BOLETA
    public function agregarBoleta($id_cliente,$total){
        $this->conectarBD();
        $conexion = $this->con;
    
        $sql = "INSERT INTO boleta VALUES(NULL,$id_cliente,$total,NOW())";
        $conexion->query($sql);

        $last_id = $conexion->insert_id; //obtener el ultimo id insertado para agregarle el detalle
        return $last_id;

        $conexion->desconectorBD();
        $this->desconectorBD();
    
    }

    //Agregar productos al detalle de la boleta
    public function agregarAlDetalleBoleta($boleta,$producto_id,$precio,$cantidad){
        $this->conectarBD();
    
        $sql = "INSERT INTO detalle_boleta VALUES(NULL,$boleta,$producto_id,$precio,$cantidad)";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }

    //BUSCAR BOLETA SEGUN ID
    public function buscarBoletaID($id_boleta){
        $this->conectarBD();

        $sql = "SELECT * FROM boleta WHERE id = $id_boleta";
        $resultado = $this->con->query($sql);

        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_boletas = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_boleta = $r['id'];
                $id_cliente = $r['fk_cliente_fk'];
                $total = $r['total'];
                $fecha = $r['fecha'];

                $boleta = new Boleta($id_boleta,$id_cliente,$total,$fecha);

                $lista_boletas[] = $boleta;

            }
            $this->desconectorBD();
            return $lista_boletas;
        }

        else{
            return 0;
        }
    }

    public function buscarDetalleSegunBoleta($id_boleta){
        $this->conectarBD();

        $sql = "SELECT productos.id AS 'id_producto', productos.titulo,marcas.descripcion AS 'marca',detalle_boleta.precio,productos.imagen, detalle_boleta.cantidad FROM productos INNER JOIN detalle_boleta on productos.id = detalle_boleta.producto_id_fk INNER JOIN marcas on marcas.id = productos.fk_marca_id
        WHERE detalle_boleta.fk_boleta_id = $id_boleta";
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

    //SABER LO VENDIDO
    public function verLoVendido($fecha_desde, $fecha_hasta){
        $this->conectarBD();

         $sql = "SELECT boleta.id,boleta.fecha, boleta.total AS 'total' 
         FROM detalle_boleta 
         INNER JOIN productos on productos.id = detalle_boleta.producto_id_fk
         INNER JOIN boleta on boleta.id = detalle_boleta.fk_boleta_id WHERE boleta.fecha >= '$fecha_desde' AND boleta.fecha <= '$fecha_hasta' 
         GROUP BY boleta.fecha";
        $resultado = $this->con->query($sql);
        
        $lista = array();
            
        
        while($r = mysqli_fetch_array($resultado)){
            $numero_boleta = $r['id'];
            $fecha = $r['fecha'];
            $total = $r['total'];

            $datos = new VerLoVendido($numero_boleta,$fecha,$total);
            $lista[] = $datos;
        }
        $this->desconectorBD();
        
        return $lista;
    }





    //BUSCAR CATEGORIAS
    public function buscarCategorias(){
        $this->conectarBD();

        $sql = "SELECT * FROM categorias";
        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id = $r['id'];
                $descripcion = $r['descripcion'];

                $categorias = new Categorias($id,$descripcion);

                $lista_categorias[] = $categorias;

            }
            $this->desconectorBD();
            return $lista_categorias;
        }
    }

    //BUSCAR SUB-CATEGORIAS
    public function buscarSubCategorias(){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria'
        FROM sub_categorias INNER JOIN categorias on categorias.id = sub_categorias.fk_categorias_id ORDER BY sub_categorias.id DESC";
        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];

                $sub_categorias = new Sub_Categorias($id_sub_categoria,$id_categoria,$descripcion_categoria,$descripcion_sub_categoria);

                $lista_sub_categorias[] = $sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_categorias;
        }
    }

    //BUSCAR SUB-CATEGORIAS SEGUN CATEGORIA
    public function buscarSubCategoriasPorCategoria($id_categoria){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria'
        FROM sub_categorias INNER JOIN categorias on categorias.id = sub_categorias.fk_categorias_id
        WHERE categorias.id = $id_categoria";
        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];

                $sub_categorias = new Sub_Categorias($id_sub_categoria,$id_categoria,$descripcion_categoria,$descripcion_sub_categoria);

                $lista_sub_categorias[] = $sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_categorias;
        }
    }

    //BUSCAR SUB-CATEGORIAS SEGUN SUB-CATEGORIA para saber cual editar
    public function buscarSubCategoriasPorSubCategoria($id_sub_categoria){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria'
        FROM sub_categorias INNER JOIN categorias on categorias.id = sub_categorias.fk_categorias_id
        WHERE sub_categorias.id = $id_sub_categoria";
        
        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];

                $sub_categorias = new Sub_Categorias($id_sub_categoria,$id_categoria,$descripcion_categoria,$descripcion_sub_categoria);

                $lista_sub_categorias[] = $sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_categorias;
        }
    }

    //ACTUALIZAR SUB-CATEGORIA
    public function actualizarSubCategoria($id_sub_categoria_actualizar,$id_categoria_nueva,$descripcion_sub_categoria_nueva){
        $this->conectarBD();
    
        $sql = "UPDATE sub_categorias SET fk_categorias_id = $id_categoria_nueva, descripcion = '$descripcion_sub_categoria_nueva' WHERE id = $id_sub_categoria_actualizar" ;
        $resultado = $this->con->query($sql);
    
        if($resultado){
            return true;
        }
    
        else{
            return false;
        }

        $this->desconectorBD();

    }

    //AGREGAR NUEVA SUB-CATEGORIA
    public function agregarSubCategoria($id_categoria,$descripcion_sub_categoria){
        $this->conectarBD();
    
        $sql = "INSERT INTO sub_categorias VALUES(NULL,$id_categoria,'$descripcion_sub_categoria')";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }




    //BUSCAR SUB-SUB-CATEGORIAS
    public function buscarSubSubCategorias(){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', sub_sub_categorias.id AS 'id_sub_subcategoria', 
        categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria', sub_sub_categorias.descripcion AS 'descripcion_sub_sub_categoria'
        FROM sub_sub_categorias 
        INNER JOIN categorias on categorias.id = sub_sub_categorias.fk_categorias_id
        INNER JOIN sub_categorias on sub_categorias.id = sub_sub_categorias.fk_sub_categorias_id
        ORDER BY sub_sub_categorias.id DESC";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $id_sub_sub_categoria = $r['id_sub_subcategoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];
                $descripcion_sub_sub_categoria = $r['descripcion_sub_sub_categoria'];

                $sub_sub_categorias = new Sub_Sub_Categorias($id_sub_categoria,$id_categoria,$id_sub_sub_categoria,$descripcion_categoria,$descripcion_sub_categoria,$descripcion_sub_sub_categoria);

                $lista_sub_sub_categorias[] = $sub_sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_sub_categorias;
        }
    }

    //Buscar SUB-SUB-CATEGORIAS por ID CATEGORIA
    //OBTIENE SOLO LA CATEGORIA QUE SE SELECCIONO Y NOS MUESTRA LAS SUB-CATEGORIAS Y LAS SUB-SUB-CATEGORIAS
    public function buscarSubSubCategoriasSegunCategoria($id_categoria){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', sub_sub_categorias.id AS 'id_sub_subcategoria', 
        categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria', sub_sub_categorias.descripcion AS 'descripcion_sub_sub_categoria'
        FROM sub_sub_categorias 
        INNER JOIN categorias on categorias.id = sub_sub_categorias.fk_categorias_id
        INNER JOIN sub_categorias on sub_categorias.id = sub_sub_categorias.fk_sub_categorias_id
        WHERE categorias.id = $id_categoria";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $id_sub_sub_categoria = $r['id_sub_subcategoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];
                $descripcion_sub_sub_categoria = $r['descripcion_sub_sub_categoria'];

                $sub_sub_categorias = new Sub_Sub_Categorias($id_sub_categoria,$id_categoria,$id_sub_sub_categoria,$descripcion_categoria,$descripcion_sub_categoria,$descripcion_sub_sub_categoria);

                $lista_sub_sub_categorias[] = $sub_sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_sub_categorias;
        }
    }

    //Buscar SUB-SUB-CATEGORIAS por ID SUB-CATEGORIA
    //OBTIENE SOLO LA SUB-CATEGORIA QUE SELECCIONO Y NOS MUESTRA LAS SUB-CATEGORIAS Y LAS SUB-SUB-CATEGORIAS mediante esa sub-categoria
    public function buscarSubSubCategoriasSegunSubCategoria($id_sub_categoria){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', sub_sub_categorias.id AS 'id_sub_subcategoria', 
        categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria', sub_sub_categorias.descripcion AS 'descripcion_sub_sub_categoria'
        FROM sub_sub_categorias 
        INNER JOIN categorias on categorias.id = sub_sub_categorias.fk_categorias_id
        INNER JOIN sub_categorias on sub_categorias.id = sub_sub_categorias.fk_sub_categorias_id
        WHERE sub_categorias.id = $id_sub_categoria";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $id_sub_sub_categoria = $r['id_sub_subcategoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];
                $descripcion_sub_sub_categoria = $r['descripcion_sub_sub_categoria'];

                $sub_sub_categorias = new Sub_Sub_Categorias($id_sub_categoria,$id_categoria,$id_sub_sub_categoria,$descripcion_categoria,$descripcion_sub_categoria,$descripcion_sub_sub_categoria);

                $lista_sub_sub_categorias[] = $sub_sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_sub_categorias;
        }
    }

    //Buscar SUB-SUB-CATEGORIAS por ID SUB-SUB-CATEGORIA
    //Funcion creada para que cuando en el select de sub-sub seleccione la que quiere, le muestre solo esa sub-sub
    public function buscarSubSubCategoriasSegunSubSubCategoria($id_sub_sub_categoria){
        $this->conectarBD();

        $sql = "SELECT sub_categorias.id AS 'id_sub_categoria', categorias.id AS 'id_categoria', sub_sub_categorias.id AS 'id_sub_subcategoria', 
        categorias.descripcion AS 'descripcion_categoria', sub_categorias.descripcion AS 'descripcion_sub_categoria', sub_sub_categorias.descripcion AS 'descripcion_sub_sub_categoria'
        FROM sub_sub_categorias 
        INNER JOIN categorias on categorias.id = sub_sub_categorias.fk_categorias_id
        INNER JOIN sub_categorias on sub_categorias.id = sub_sub_categorias.fk_sub_categorias_id
        WHERE sub_sub_categorias.id = $id_sub_sub_categoria";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_sub_sub_categorias = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $id_sub_categoria = $r['id_sub_categoria'];
                $id_categoria = $r['id_categoria'];
                $id_sub_sub_categoria = $r['id_sub_subcategoria'];
                $descripcion_categoria = $r['descripcion_categoria'];
                $descripcion_sub_categoria = $r['descripcion_sub_categoria'];
                $descripcion_sub_sub_categoria = $r['descripcion_sub_sub_categoria'];

                $sub_sub_categorias = new Sub_Sub_Categorias($id_sub_categoria,$id_categoria,$id_sub_sub_categoria,$descripcion_categoria,$descripcion_sub_categoria,$descripcion_sub_sub_categoria);

                $lista_sub_sub_categorias[] = $sub_sub_categorias;
            }
            $this->desconectorBD();
            return $lista_sub_sub_categorias;
        }
    }

    //AGREGAR NUEVA SUB-SUB-CATEGORIA
    public function agregarSubSubCategoria($id_categoria,$id_sub_categoria,$descripcion_sub_categoria){
        $this->conectarBD();
    
        $sql = "INSERT INTO sub_sub_categorias VALUES(NULL,$id_categoria,$id_sub_categoria,'$descripcion_sub_categoria')";
        $this->con->query($sql);
        $this->desconectorBD();
    
    }

    //EDITAR SUB-SUB-CATEGORIA
    public function editarSubSubCategoria($categoria_id_nueva, $sub_categoria_id_nueva,$descripcion_sub_sub_categoria_nueva,$id_a_actualizar_sub_sub){
        $this->conectarBD();
    
        $sql = "UPDATE sub_sub_categorias SET fk_categorias_id = $categoria_id_nueva, fk_sub_categorias_id = $sub_categoria_id_nueva ,descripcion = '$descripcion_sub_sub_categoria_nueva' WHERE id = $id_a_actualizar_sub_sub" ;
        $resultado = $this->con->query($sql);
    
        if($resultado){
            return true;
        }
    
        else{
            return false;
        }

        $this->desconectorBD();

    }

    //INGRESAR REPORTE
    public function ingresarReporte($id_producto,$tipo_reporte,$motivo,$id_usuario){
        $this->conectarBD();
        $conexion = $this->con;
    
        $sql = "INSERT INTO reporte VALUES(NULL,$id_producto,'$tipo_reporte','$motivo','Pendiente de revisión',NOW(),$id_usuario)";
        $conexion->query($sql);

        $last_id = $conexion->insert_id; //obtener el ultimo id insertado para agregarle el detalle
        return $last_id;

        $conexion->desconectorBD();
        $this->desconectorBD();
    }

    public function buscarReporteSegunId($id_reporte){
        $this->conectarBD();

        $sql = "SELECT reporte.id as 'numero_de_reporte', reporte.fecha as 'fecha_de_reporte', reporte.tipo_reporte, reporte.producto_id_fk, reporte.estado, reporte.motivo,usuarios.nombre, usuarios.apellido, rol.descripcion AS 'rol'
        FROM reporte
        INNER JOIN usuarios on usuarios.id = reporte.fk_usuario_id
        INNER JOIN productos on productos.id = reporte.producto_id_fk 
        INNER JOIN rol on rol.id = usuarios.fk_rol_id
        WHERE reporte.id = $id_reporte";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_reporte = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $numero_reporte = $r['numero_de_reporte'];
                $fecha = $r['fecha_de_reporte'];
                $tipo_reporte =  $r['tipo_reporte'];
                $id_producto = $r['producto_id_fk'];
                $estado = $r['estado'];
                $motivo = $r['motivo'];
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];
                $rol = $r['rol'];

                $datos_reporte = new Reporte
                ($numero_reporte,$fecha,$tipo_reporte,$id_producto,$estado,$motivo,$nombre,$apellido,$rol);

                $lista_reporte[] = $datos_reporte;
            }
            $this->desconectorBD();
            return $lista_reporte;
        }
    }

    //Borrar REPORTE
    public function borrarReporte($numero_reporte){
        $this->conectarBD();
            
        $sql = "DELETE FROM reporte WHERE id = $numero_reporte";
        $this->con->query($sql);
        $this->desconectorBD();
            
    }

    //VER TODOS LOS REPORTES SEGUN USUARIO
    public function todosLosReportesSegunUsuario($id_usuario){
        $this->conectarBD();

        $sql = "SELECT reporte.id as 'numero_de_reporte', reporte.fecha as 'fecha_de_reporte', reporte.tipo_reporte, reporte.producto_id_fk, reporte.estado, reporte.motivo,usuarios.nombre, usuarios.apellido, rol.descripcion AS 'rol'
        FROM reporte
        INNER JOIN usuarios on usuarios.id = reporte.fk_usuario_id
        INNER JOIN productos on productos.id = reporte.producto_id_fk 
        INNER JOIN rol on rol.id = usuarios.fk_rol_id
        WHERE reporte.fk_usuario_id = $id_usuario
        ORDER BY reporte.fecha DESC";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_reporte = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $numero_reporte = $r['numero_de_reporte'];
                $fecha = $r['fecha_de_reporte'];
                $tipo_reporte =  $r['tipo_reporte'];
                $id_producto = $r['producto_id_fk'];
                $estado = $r['estado'];
                $motivo = $r['motivo'];
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];
                $rol = $r['rol'];

                $datos_reporte = new Reporte
                ($numero_reporte,$fecha,$tipo_reporte,$id_producto,$estado,$motivo,$nombre,$apellido,$rol);

                $lista_reporte[] = $datos_reporte;
            }
            $this->desconectorBD();
            return $lista_reporte;
        }
    }

    public function verTodosLosReportes(){
        $this->conectarBD();

        $sql = "SELECT reporte.id as 'numero_de_reporte', reporte.fecha as 'fecha_de_reporte', reporte.tipo_reporte, reporte.producto_id_fk, reporte.estado, reporte.motivo,usuarios.nombre, usuarios.apellido, rol.descripcion AS 'rol'
        FROM reporte
        INNER JOIN usuarios on usuarios.id = reporte.fk_usuario_id
        INNER JOIN productos on productos.id = reporte.producto_id_fk 
        INNER JOIN rol on rol.id = usuarios.fk_rol_id
        ORDER BY reporte.fecha DESC";

        $resultado = $this->con->query($sql);
        $fila = mysqli_num_rows($resultado); //si hay filas

        $lista_reporte = array();

        if($fila >=1){
            while($r = mysqli_fetch_array($resultado)){
                $numero_reporte = $r['numero_de_reporte'];
                $fecha = $r['fecha_de_reporte'];
                $tipo_reporte =  $r['tipo_reporte'];
                $id_producto = $r['producto_id_fk'];
                $estado = $r['estado'];
                $motivo = $r['motivo'];
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];
                $rol = $r['rol'];

                $datos_reporte = new Reporte
                ($numero_reporte,$fecha,$tipo_reporte,$id_producto,$estado,$motivo,$nombre,$apellido,$rol);

                $lista_reporte[] = $datos_reporte;
            }
            $this->desconectorBD();
            return $lista_reporte;
        }
    }

    //INGRESAR Producto
    public function ingresarProducto($titulo,$marca,$categoria,$sub_categoria,$sub_sub_categoria,$precioventa,$preciooferta,$stockcomprado,$informaciondelproducto,$imagen,$activo,$visible,$oferta){
        $this->conectarBD();
    
        $sql = "INSERT INTO productos VALUES
        (NULL,'$titulo',$marca,$categoria,$sub_categoria,$sub_sub_categoria,$precioventa,$preciooferta,$stockcomprado,$stockcomprado,'$informaciondelproducto','$imagen',$activo,$visible,$oferta)";
        $this->con->query($sql);

        $this->desconectorBD();

    }

    //EDITAR PRODUCTO
    public function editarProducto($id_producto,$titulo,$marca,$categoria,$sub_categoria,$sub_sub_categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$visible,$oferta){
        $this->conectarBD();
    
        $sql = "UPDATE productos SET titulo = '$titulo', fk_marca_id = $marca, 
        fk_categorias_id = $categoria, fk_sub_categoria_id = $sub_categoria, fk_sub_sub_categoria_id = $sub_sub_categoria,
        precioventa = $precioventa, preciooferta = $preciooferta, stockcomprado = $stockcomprado, stock_actual = $stockactual,
        informaciondelproducto = '$informaciondelproducto', imagen = '$imagen', activo = $activo, visible = $visible, oferta = $oferta
        WHERE id = $id_producto";
        $this->con->query($sql);

        $this->desconectorBD();

    }

    public function editarProductoSinImagen($id_producto,$titulo,$marca,$categoria,$sub_categoria,$sub_sub_categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$activo,$visible,$oferta){
        $this->conectarBD();
    
        $sql = "UPDATE productos SET titulo = '$titulo', fk_marca_id = $marca, 
        fk_categorias_id = $categoria, fk_sub_categoria_id = $sub_categoria, fk_sub_sub_categoria_id = $sub_sub_categoria,
        precioventa = $precioventa, preciooferta = $preciooferta, stockcomprado = $stockcomprado, stock_actual = $stockactual,
        informaciondelproducto = '$informaciondelproducto', activo = $activo, visible = $visible, oferta = $oferta
        WHERE id = $id_producto";
        $this->con->query($sql);

        $this->desconectorBD();

    }

    
    




    

}


?>