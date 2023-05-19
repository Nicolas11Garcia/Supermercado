<?php

    class Caja{
        private $numero_caja;
        private $estado;


        public function __construct($numero_caja,$estado){
            $this->numero_caja = $numero_caja;
            $this->estado = $estado;
        }

        public function getNumeroCaja(){
            return $this->numero_caja;
        }

        public function getEstado(){
            return $this->estado;
        }

    }




?>

