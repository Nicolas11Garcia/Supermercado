<?php

    class Categorias{
        private $id;
        private $descripcion;


        public function Categorias($id,$descripcion){
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

<?php

    class Sub_Categorias{
        private $id_sub_categoria;
        private $id_categoria;
        private $descripcion_categoria;
        private $descripcion_sub_categoria;


        public function Sub_Categorias($id_sub_categoria,$id_categoria,$descripcion_categoria,$descripcion_sub_categoria){
            $this->id_sub_categoria = $id_sub_categoria;
            $this->id_categoria = $id_categoria;
            $this->descripcion_categoria = $descripcion_categoria;
            $this->descripcion_sub_categoria = $descripcion_sub_categoria;
        }

        public function getIdSubCategoria(){
            return $this->id_sub_categoria;
        }

        public function getIdCategoria(){
            return $this->id_categoria;
        }

        public function getDescripcionCategoria(){
            return $this->descripcion_categoria;
        }

        public function getDescripcionSubCategoria(){
            return $this->descripcion_sub_categoria;
        }

    }

?>

<?php

    class Sub_Sub_Categorias{
        private $id_sub_categoria;
        private $id_categoria;
        private $id_sub_sub_categoria;
        private $descripcion_categoria;
        private $descripcion_sub_categoria;
        private $descripcion_sub_sub_categoria;

        public function Sub_Sub_Categorias($id_sub_categoria,$id_categoria,$id_sub_sub_categoria,$descripcion_categoria,$descripcion_sub_categoria,$descripcion_sub_sub_categoria){
            $this->id_sub_categoria = $id_sub_categoria;
            $this->id_categoria = $id_categoria;
            $this->id_sub_sub_categoria = $id_sub_sub_categoria;
            $this->descripcion_categoria = $descripcion_categoria;
            $this->descripcion_sub_categoria = $descripcion_sub_categoria;
            $this->descripcion_sub_sub_categoria = $descripcion_sub_sub_categoria;
        }

        public function getIdSubCategoria(){
            return $this->id_sub_categoria;
        }

        public function getIdCategoria(){
            return $this->id_categoria;
        }

        public function getIdSubSubCategoria(){
            return $this->id_sub_sub_categoria;
        }

        public function getDescripcionCategoria(){
            return $this->descripcion_categoria;
        }

        public function getDescripcionSubCategoria(){
            return $this->descripcion_sub_categoria;
        }

        public function getDescripcionSubSubCategoria(){
            return $this->descripcion_sub_sub_categoria;
        }

    }

?>