<?php

    class Orden{
        private $numero_orden;
        private $id_cliente;
        private $fecha;

        private $correo;
        private $nombre;
        private $apellido;
        private $rut;
        private $telefono;

        private $region;
        private $comuna;
        private $calle;
        private $numero;

        private $total;
        private $estado;


        public function __construct($numero_orden,$id_cliente,$fecha,$correo,$nombre,$apellido,$rut,$telefono,$region,$comuna,$calle,$numero,$total,$estado){
            $this->numero_orden = $numero_orden;
            $this->id_cliente = $id_cliente;
            $this->fecha = $fecha;

            $this->correo = $correo;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->rut = $rut;
            $this->telefono = $telefono;

            $this->region = $region;
            $this->comuna = $comuna;
            $this->calle = $calle;
            $this->numero = $numero;

            $this->total = $total;
            $this->estado = $estado;
        }

        public function getNumeroOrden(){
            return $this->numero_orden;
        }
        public function getIdCliente(){
            return $this->id_cliente;
        }
        public function getFecha(){
            return $this->fecha;
        }

        public function getCorreo(){
            return $this->correo;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getRut(){
            return $this->rut;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getRegion(){
            return $this->region;
        }

        public function getComuna(){
            return $this->comuna;
        }

        public function getCalle(){
            return $this->calle;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function getTotal(){
            return $this->total;
        }

        public function getEstado(){
            return $this->estado;
        }





    }




?>
