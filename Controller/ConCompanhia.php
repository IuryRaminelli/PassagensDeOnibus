<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/CompanhiaOnibus.php';

    class ConCompanhia{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertCIA(CompanhiaOnibus $CompanhiaOnibus){
            $pstmt = $this->conexao->prepare("INSERT INTO companhiaonibus 
            (nomeCIA, localCIA, telefone, email, logo) VALUES 
            (?,?,?,?,?)");
            $pstmt->bindValue(1, $CompanhiaOnibus->getnomeCIA());
            $pstmt->bindValue(2, $CompanhiaOnibus->getlocalCIA());
            $pstmt->bindValue(3, $CompanhiaOnibus->gettelefone());
            $pstmt->bindValue(4, $CompanhiaOnibus->getemail());
            $pstmt->bindValue(5, $CompanhiaOnibus->getlogo());
            $pstmt->execute();
            return $pstmt;
        }
        public function selectLogo($fkOn){
            $pstmt = $this->conexao->prepare("SELECT * FROM companhiaonibus WHERE idCIA = ?");
            $pstmt->bindValue(1, $fkOn);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, CompanhiaOnibus::class);
            return $lista;
        }

        public function allCompanhias(){
            $pstmt = $this->conexao->prepare("SELECT * FROM companhiaonibus");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, CompanhiaOnibus::class);
            return $lista;
        }

        public function getCompanhiaById($id) {
            $stmt = $this->conexao->prepare("SELECT * FROM companhiaonibus WHERE idCIA = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $lista = $stmt->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }
    }

    

    
?>