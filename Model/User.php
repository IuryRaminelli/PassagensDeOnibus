<?php
    class User{
        private $idUser;
        private $apelido;
        private $nome;
        private $senha;
        private $CPF;
        private $Telefone;
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
        public function getIdUser(){
            return $this->idUser;
        } 
        public function setIdUser($idUser){
            return $this->idUser = $idUser;
        }
        public function getApelido(){
            return $this->apelido;
        } 
        public function setApelido($apelido){
            return $this->apelido = $apelido;
        }
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            return $this->nome = $nome;
        }
        public function getSenha(){
            return $this->senha;
        } 
        public function setSenha($senha){
            return $this->senha = $senha;
        }
        public function getCPF(){
            return $this->CPF;
        } 
        public function setCPF($CPF){
            return $this->CPF = $CPF;
        }

        public function getTelefone(){
            return $this->Telefone;
        } 
        public function setTelefone($Telefone){
            return $this->Telefone = $Telefone;
        }
        
        public function __toString(){
            return "idUser: " . $this->idUser . " apelido: " . $this->apelido . " nome: "
                    . $this->nome . " senha: " . $this->senha .
                    " CPF: " . $this->CPF . " Telefone: " . $this->Telefone ."<br><br>";
        } 
    }
?>