<?php

    class Producto{
        private $id;
        private $titulo;
        private $marca;
        private $categoria;
        private $precioventa;
        private $preciooferta;
        private $stockcomprado;
        private $stockactual;
        private $informaciondelproducto;
        private $imagen;
        private $activo;
        private $oferta;
        private $visible;
        private $sub_categoria;
        private $sub_sub_categoria;


        public function __construct($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta,$visible,$sub_categoria,$sub_sub_categoria){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->marca = $marca;
            $this->categoria = $categoria;
            $this->precioventa = $precioventa;
            $this->preciooferta = $preciooferta;
            $this->stockcomprado = $stockcomprado;
            $this->stockactual = $stockactual;
            $this->informaciondelproducto = $informaciondelproducto;
            $this->imagen = $imagen;
            $this->activo = $activo;
            $this->oferta = $oferta;
            $this->visible = $visible;
            $this->sub_categoria = $sub_categoria;
            $this->sub_sub_categoria = $sub_sub_categoria;

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
        public function getCategoria(){
            return $this->categoria;
        }
        public function getPrecioVenta(){
            return $this->precioventa;
        }

        public function getPrecioOferta(){
            return $this->preciooferta;
        }

        public function getStockComprado(){
            return $this->stockcomprado;
        }
        public function getStockActual(){
            return $this->stockactual;
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

        public function getVisible(){
            return $this->visible;
        }

        public function getSubCategoria(){
            return $this->sub_categoria;
        }

        public function getSubSubCategoria(){
            return $this->sub_sub_categoria;
        }
    }




?>




<?php

    class ProductoOferta1{
        private $id;
        private $titulo;
        private $marca;
        private $precioventa;
        private $preciooferta;
        private $stockcomprado;
        private $stockactual;
        private $imagen;
        private $activo;
        private $oferta;
        private $visible;
        private $cantidad;
        private $porcentaje;


        public function __construct($id,$titulo,$marca,$precioventa,$preciooferta,$stockcomprado,$stockactual,$imagen,$activo,$oferta,$visible,$cantidad,$porcentaje){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->marca = $marca;
            $this->precioventa = $precioventa;
            $this->preciooferta = $preciooferta;
            $this->stockcomprado = $stockcomprado;
            $this->stockactual = $stockactual;
            $this->imagen = $imagen;
            $this->activo = $activo;
            $this->oferta = $oferta;
            $this->visible = $visible;
            $this->cantidad = $cantidad;
            $this->porcentaje = $porcentaje;

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

        public function getStockComprado(){
            return $this->stockcomprado;
        }
        public function getStockActual(){
            return $this->stockactual;
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

        public function getVisible(){
            return $this->visible;
        }

        public function getCantidad(){
            return $this->cantidad;
        }

        public function getPorcentaje(){
            return $this->porcentaje;
        }
    }




?>



<?php

    class ProductoOferta2{
        private $id;
        private $fk_producto_1;
        private $fk_producto_2;
        private $porcentaje;


        public function __construct($id,$fk_producto_1,$fk_producto_2,$porcentaje){
            $this->id = $id;
            $this->fk_producto_1 = $fk_producto_1;
            $this->fk_producto_2= $fk_producto_2;
            $this->porcentaje = $porcentaje;

        }

        public function getId(){
            return $this->id;
        }

        public function getFkProducto1(){
            return $this->fk_producto_1;
        }

        public function getFkProducto2(){
            return $this->fk_producto_2;
        }

        public function getPorcentaje(){
            return $this->porcentaje;
        }
    }




?>