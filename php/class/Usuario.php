<?php

    class Usuario{
        private $id;
        private $rut;
        private $nombre;
        private $apellido;


        public function Usuario($id,$rut,$nombre,$apellido){
            $this->id = $id;
            $this->rut = $rut;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }

        public function getId(){
            return $this->id;
        }
        public function getRut(){
            return $this->rut;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
    }




?>