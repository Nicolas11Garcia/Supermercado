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


        public function Producto($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta,$visible,$sub_categoria,$sub_sub_categoria){
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
