<?php
    class Assento{
        private $idAssento;
        private $fkOnibus;
        private $fkUser;
        private $numAssento;
        private $tipoAssento;
        public function __construct(){
            if (func_num_args() != 0) {
                $atributos = func_get_args()[0];
                foreach ($atributos as $atributo => $valor) {
                    if(isset($valor) && property_exists(get_class($this), $atributo)){
                        $this->$atributo = $valor;
                    }    			
                }
            }
        }
        public function getidAssento(){
            return $this->idAssento;
        } 
        public function setidAssento($idAssento){
            return $this->idAssento = $idAssento;
        }
        public function getfkOnibus(){
            return $this->fkOnibus;
        } 
        public function setfkOnibus($fkOnibus){
            return $this->fkOnibus = $fkOnibus;
        }
        public function getfkUser(){
            return $this->fkUser;
        } 
        public function setfkUser($fkUser){
            return $this->fkUser = $fkUser;
        }
        public function getnumAssento(){
            return $this->numAssento;
        } 
        public function setnumAssento($numAssento){
            return $this->numAssento = $numAssento;
        }
        public function gettipoAssento(){
            return $this->tipoAssento;
        } 
        public function settipoAssento($tipoAssento){
            return $this->tipoAssento = $tipoAssento;
        }
        
        public function __toString(){
            return "idAssento: " . $this->idAssento . " fkOnibus: " . $this->fkOnibus . " fkUser: "
                    . $this->fkUser . " numAssento: " . $this->numAssento . " tipoAssento: " . $this->tipoAssento . "<br><br>";
        } 
    }
?>