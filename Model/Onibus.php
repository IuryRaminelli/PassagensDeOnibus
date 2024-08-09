<?php
    class Onibus{
        private $idOnibus;
        private $fkCIA;
        private $numOnibus;
        private $localOrigem;
        private $localDestino;
        private $tipoOnibus;
        private $dia;
        private $dataHoraSaida;
        private $dataHoraPrevisao;
        private $preco;
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
        public function getidOnibus(){
            return $this->idOnibus;
        } 
        public function setidOnibus($idOnibus){
            return $this->idOnibus = $idOnibus;
        }
        public function getfkCIA(){
            return $this->fkCIA;
        } 
        public function setfkCIA($fkCIA){
            return $this->fkCIA = $fkCIA;
        }
        public function getnumOnibus(){
            return $this->numOnibus;
        } 
        public function setnumOnibus($numOnibus){
            return $this->numOnibus = $numOnibus;
        }
        public function getlocalOrigem(){
            return $this->localOrigem;
        } 
        public function setlocalOrigem($localOrigem){
            return $this->localOrigem = $localOrigem;
        }
        public function getlocalDestino(){
            return $this->localDestino;
        } 
        public function setlocalDestino($localDestino){
            return $this->localDestino = $localDestino;
        }
        public function gettipoOnibus(){
            return $this->tipoOnibus;
        } 
        public function settipoOnibus($tipoOnibus){
            return $this->tipoOnibus = $tipoOnibus;
        }
        public function getdia(){
            return $this->dia;
        } 
        public function setdia($dia){
            return $this->dia = $dia;
        }
        public function getdataHoraSaida(){
            return $this->dataHoraSaida;
        } 
        public function setdataHoraSaida($dataHoraSaida){
            return $this->dataHoraSaida = $dataHoraSaida;
        }

        public function getdataHoraPrevisao(){
            return $this->dataHoraPrevisao;
        } 
        public function setdataHoraPrevisao($dataHoraPrevisao){
            return $this->dataHoraPrevisao = $dataHoraPrevisao;
        }
        public function getPreco(){
            return $this->preco;
        } 
        public function setPreco($preco){
            return $this->preco = $preco;
        }
        
        
        public function __toString(){
            return "idOnibus: " . $this->idOnibus . " fkCIA: " . $this->fkCIA . " numOnibus: "
                    . $this->numOnibus . " localOrigem: " . $this->localOrigem . " localDestino: " . $this->localDestino .
                    " tipoOnibus: " . $this->tipoOnibus . " dia: " . $this->dia . " dataHoraSaida: " . $this->dataHoraSaida .
                    " dataHoraPrevisao: " . $this->dataHoraPrevisao . " Preco: " . $this->preco ."<br><br>";
        } 
    }
?>