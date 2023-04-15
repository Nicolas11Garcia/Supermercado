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


        public function Producto($id,$titulo,$marca,$categoria,$precioventa,$preciooferta,$stockcomprado,$stockactual,$informaciondelproducto,$imagen,$activo,$oferta){
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
    }




?>
