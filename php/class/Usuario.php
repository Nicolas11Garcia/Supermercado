<?php

    class Usuario{
        private $id;
        private $rut;
        private $correo;
        private $nombre;
        private $apellido;


        public function __construct($id,$correo,$rut,$nombre,$apellido){
            $this->id = $id;
            $this->rut = $rut;
            $this->correo = $correo;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }

        public function getId(){
            return $this->id;
        }
        public function getRut(){
            return $this->rut;
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
    }




?>