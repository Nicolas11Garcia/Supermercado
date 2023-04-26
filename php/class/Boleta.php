<?php

    class Boleta{
        private $id_boleta;
        private $id_cliente;
        private $total;
        private $fecha;


        public function Boleta($id_boleta,$id_cliente,$total,$fecha){
            $this->id_boleta = $id_boleta;
            $this->id_cliente = $id_cliente;
            $this->total = $total;
            $this->fecha = $fecha;
        }

        public function getIdBoleta(){
            return $this->id_boleta;
        }

        public function getIdCliente(){
            return $this->id_cliente;
        }

        public function getTotal(){
            return $this->total;
        }

        public function getFecha(){
            return $this->fecha;
        }
    }




?>


<?php

    class VerLoVendido{
        private $numero_boleta;
        private $fecha;
        private $total;


        public function VerLoVendido($numero_boleta,$fecha,$total){
            $this->numero_boleta = $numero_boleta;
            $this->fecha = $fecha;
            $this->total = $total;

        }

        public function getNumeroBoleta(){
            return $this->numero_boleta;
        }

        public function getFecha(){
            return $this->fecha;
        }
        public function getTotal(){
            return $this->total;
        }
    }




?>