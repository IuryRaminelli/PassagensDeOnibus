<?php
    class CompanhiaOnibus{
        private $idCIA;
        private $nomeCIA;
        private $localCIA;
        private $telefone;
        private $email;
        private $logo;
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
        public function getidCIA(){
            return $this->idCIA;
        } 
        public function setidCIA($idCIA){
            return $this->idCIA = $idCIA;
        }
        public function getnomeCIA(){
            return $this->nomeCIA;
        } 
        public function setnomeCIA($nomeCIA){
            return $this->nomeCIA = $nomeCIA;
        }
        public function getlocalCIA(){
            return $this->localCIA;
        } 
        public function setlocalCIA($localCIA){
            return $this->localCIA = $localCIA;
        }
        public function gettelefone(){
            return $this->telefone;
        } 
        public function settelefone($telefone){
            return $this->telefone = $telefone;
        }
        public function getemail(){
            return $this->email;
        } 
        public function setemail($email){
            return $this->email = $email;
        }
        public function getlogo(){
            return $this->logo;
        } 
        public function setlogo($logo){
            return $this->logo = $logo;
        }
        public function __toString(){
            return "idCIA: " . $this->idCIA . " nomeCIA: " . $this->nomeCIA . " localCIA: "
                    . $this->localCIA . " telefone: " . $this->telefone . " email: " . $this->email  . " logo: " . $this->logo . "<br><br>";
        } 
    }
?>