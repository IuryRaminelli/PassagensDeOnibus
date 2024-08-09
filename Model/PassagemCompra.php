<?php
    class PassagemCompra{
        private $idPass;
        private $fkOnibus;
        private $fkUser;
        private $preco;
        private $formaPag;
        private $dataHoraComprada;
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
        public function getIdPass(){
            return $this->idPass;
        } 
        public function setIdPass($idPass){
            return $this->idPass = $idPass;
        }
        public function getFkOnibus(){
            return $this->fkOnibus;
        } 
        public function setFkOnibus($fkOnibus){
            return $this->fkOnibus = $fkOnibus;
        }
        public function getFkUser(){
            return $this->fkUser;
        } 
        public function setFkUser($fkUser){
            return $this->fkUser = $fkUser;
        }
        public function getPreco(){
            return $this->preco;
        } 
        public function setPreco($preco){
            return $this->preco = $preco;
        }
        public function getFormaPag(){
            return $this->formaPag;
        } 
        public function setFormaPag($formaPag){
            return $this->formaPag = $formaPag;
        }
        public function getDataHoraComprada(){
            return $this->dataHoraComprada;
        } 
        public function setDataHoraComprada($dataHoraComprada){
            return $this->dataHoraComprada = $dataHoraComprada;
        }
        
        public function __toString(){
            return "idPass: " . $this->idPass . " fkOnibus: " . $this->fkOnibus . " fkUser: "
                    . $this->fkUser . " preco: " . $this->preco . " formaPag: " . $this->formaPag .
                    " dataHoraComprada: " . $this->dataHoraComprada . "<br><br>";
        } 
    }
?>