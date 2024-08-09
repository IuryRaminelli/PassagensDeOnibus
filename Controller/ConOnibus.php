<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/Onibus.php';

    class ConOnibus{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertOnibus(Onibus $Onibus){
            $pstmt = $this->conexao->prepare("INSERT INTO onibus 
            (fkCIA, numOnibus, localOrigem, localDestino, tipoOnibus, 
            dia, dataHoraSaida, dataHoraPrevisao, preco) VALUES 
            (?,?,?,?,?,?,?,?,?)");
            $pstmt->bindValue(1, $Onibus->getfkCIA());
            $pstmt->bindValue(2, $Onibus->getnumOnibus());
            $pstmt->bindValue(3, $Onibus->getlocalOrigem());
            $pstmt->bindValue(4, $Onibus->getlocalDestino());
            $pstmt->bindValue(5, $Onibus->gettipoOnibus());
            $pstmt->bindValue(6, $Onibus->getDia());
            $pstmt->bindValue(7, $Onibus->getdataHoraSaida());
            $pstmt->bindValue(8, $Onibus->getdataHoraPrevisao());
            $pstmt->bindValue(9, $Onibus->getPreco());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectPesOnibus($origem, $destino, $dia){
            $pstmt = $this->conexao->prepare("SELECT * FROM onibus WHERE localOrigem = ? AND localDestino = ? AND dia = ?");
            $pstmt->bindValue(1, $origem);
            $pstmt->bindValue(2, $destino);
            $pstmt->bindValue(3, $dia);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Onibus::class);
            return $lista;
        }
        public function selectNumOnibus($numOnibus){
            $pstmt = $this->conexao->prepare("SELECT * FROM onibus WHERE numOnibus = ?");
            $pstmt->bindValue(1, $numOnibus);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Onibus::class);
            return $lista;
        }

        public function allOnibus(){
            $stmt = $this->conexao->prepare("SELECT * FROM onibus");
            $stmt->execute();
            $onibus = $stmt->fetchAll();
            $stmt = null;
            return $onibus;
        }
    }

?>