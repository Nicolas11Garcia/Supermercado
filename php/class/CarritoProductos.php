<?php

    class CarritoProdutos{
        private $id;
        private $titulo;
        private $marca;
        private $precioventa;
        private $preciooferta;
        private $informaciondelproducto;
        private $imagen;
        private $activo;
        private $oferta;
        private $cantidad_en_carrito;


        public function __construct($id,$titulo,$marca,$precioventa,$preciooferta,$informaciondelproducto,$imagen,$activo,$oferta,$cantidad_en_carrito){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->marca = $marca;
            $this->precioventa = $precioventa;
            $this->preciooferta = $preciooferta;
            $this->informaciondelproducto = $informaciondelproducto;
            $this->imagen = $imagen;
            $this->activo = $activo;
            $this->oferta = $oferta;
            $this->cantidad_en_carrito = $cantidad_en_carrito;

        }

        public function getId(){
            return $this->id;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function getPrecioVenta(){
            return $this->precioventa;
        }

        public function getPrecioOferta(){
            return $this->preciooferta;
        }

        public function getInformacionDelProducto(){
            return $this->informaciondelproducto;
        }
        public function getImagen(){
            return $this->imagen;
        }

        public function getActivo(){
            return $this->activo;
        }
        public function getOferta(){
            return $this->oferta;
        }

        public function getCantidadEnCarrito(){
            return $this->cantidad_en_carrito;
        }
    }
?>


<?php

    class ProductosComprados{
        private $id_producto;
        private $titulo;
        private $marca;
        private $precio;
        private $imagen;
        private $cantidad;


        public function __construct($id_producto,$titulo,$marca,$precio,$imagen,$cantidad){
            $this->id_producto = $id_producto;
            $this->titulo = $titulo;
            $this->marca = $marca;
            $this->precio = $precio;
            $this->imagen = $imagen;
            $this->cantidad = $cantidad;
        }

        public function getIdProducto(){
            return $this->id_producto;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function getCantidad(){
            return $this->cantidad;
        }
    }
?>


<?php

    class ProductosDetalleBoleta{
        private $id_posicion;
        private $id_producto;
        private $titulo;
        private $marca;
        private $precio;
        private $imagen;
        private $activo;
        private $oferta;
        private $cantidad;
        private $precio_oferta;


        public function __construct($id_posicion,$id_producto,$titulo,$marca,$precio,$imagen,$activo,$oferta,$cantidad,$precio_oferta){
            $this->id_posicion = $id_posicion;
            $this->id_producto = $id_producto;
            $this->titulo = $titulo;
            $this->marca = $marca;
            $this->precio= $precio;
            $this->imagen = $imagen;
            $this->activo = $activo;
            $this->oferta = $oferta;
            $this->cantidad = $cantidad;
            $this->precio_oferta = $precio_oferta;

        }

        public function getIdPosicion(){
            return $this->id_posicion;
        }
        public function getIdProducto(){
            return $this->id_producto;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function getPrecio(){
            return $this->precio;
        }
        public function getImagen(){
            return $this->imagen;
        }

        public function getActivo(){
            return $this->activo;
        }
        public function getOferta(){
            return $this->oferta;
        }

        public function getCantidad(){
            return $this->cantidad;
        }
        public function getPrecioOfertaDescuento(){
            return $this->precio_oferta;
        }
    }
?>









<?php

    class ProductosDetalleBoleta2{
        private $id_posicion;
        private $id_producto;
        private $titulo;
        private $marca;
        private $precio;
        private $imagen;
        private $activo;
        private $oferta;


        public function __construct($id_posicion,$id_producto,$titulo,$marca,$precio,$imagen,$activo,$oferta){
            $this->id_posicion = $id_posicion;
            $this->id_producto = $id_producto;
            $this->titulo = $titulo;
            $this->marca = $marca;
            $this->precio= $precio;
            $this->imagen = $imagen;
            $this->activo = $activo;
            $this->oferta = $oferta;

        }

        public function getIdPosicion(){
            return $this->id_posicion;
        }
        public function getIdProducto(){
            return $this->id_producto;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function getPrecio(){
            return $this->precio;
        }
        public function getImagen(){
            return $this->imagen;
        }
        public function getActivo(){
            return $this->activo;
        }
        public function getOferta(){
            return $this->oferta;
        }
    }
?>