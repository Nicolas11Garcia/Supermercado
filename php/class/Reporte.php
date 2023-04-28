<?php

    class Reporte{
        private $numero_reporte;
        private $fecha;
        private $tipo_reporte;
        private $id_producto;
        private $estado;
        private $motivo;
        private $nombre;
        private $apellido;
        private $rol;


        public function Reporte($numero_reporte,$fecha,$tipo_reporte,$id_producto,$estado,$motivo,$nombre,$apellido,$rol){
            $this->numero_reporte = $numero_reporte;
            $this->fecha = $fecha;
            $this->tipo_reporte = $tipo_reporte;
            $this->id_producto = $id_producto;
            $this->estado = $estado;
            $this->motivo = $motivo;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->rol = $rol;
        }

        public function getNumeroReporte(){
            return $this->numero_reporte;
        }
        public function getFecha(){
            return $this->fecha;
        }

        public function getTipoDeReporte(){
            return $this->tipo_reporte;
        }

        public function getIdProducto(){
            return $this->id_producto;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function getMotivo(){
            return $this->motivo;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }

        public function getRol(){
            return $this->rol;
        }
    }




?>