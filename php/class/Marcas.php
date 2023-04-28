<?php

    class Marca{
        private $id;
        private $descripcion;


        public function Marca($id,$descripcion){
            $this->id = $id;
            $this->descripcion = $descripcion;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

    }




?>