<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/Assento.php';

    class ConAssento{
        private $conexao;

        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }

        function insertASS(Assento $Assento){
            $pstmt = $this->conexao->prepare("INSERT INTO assentos 
            (fkOnibus, fkUser, numAssento, tipoAssento) VALUES 
            (?,?,?,?)");
            $pstmt->bindValue(1, $Assento->getfkOnibus());
            $pstmt->bindValue(2, $Assento->getfkUser());
            $pstmt->bindValue(3, $Assento->getnumAssento());
            $pstmt->bindValue(4, $Assento->gettipoAssento());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectDisponivel($fkOnibus) {
            $pstmt = $this->conexao->prepare("SELECT COUNT(fkOnibus) AS count FROM assentos WHERE tipoAssento = 'disponivel' AND fkOnibus = ?");
            $pstmt->bindValue(1, $fkOnibus);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        }
        
        public function selectOcupado($fkOnibus) {
            $pstmt = $this->conexao->prepare("SELECT COUNT(fkOnibus) AS count FROM assentos WHERE tipoAssento = 'ocupado' AND fkOnibus = ?");
            $pstmt->bindValue(1, $fkOnibus);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        }
        function updateAss($fkUser, $tipoAssento, $numAssento, $fkOnibus){
            $pstmt = $this->conexao->prepare("UPDATE assentos SET fkUser = ?, tipoAssento = ?
            WHERE fkOnibus = ? AND numAssento = ?");
            $pstmt->bindValue(1, $fkUser);
            $pstmt->bindValue(2, $tipoAssento);
            $pstmt->bindValue(3, $fkOnibus);
            $pstmt->bindValue(4, $numAssento);
            $pstmt->execute();
            return $pstmt;
        }



        function selectEstado($fkOnibus){
            $pstmt = $this->conexao->prepare("SELECT * FROM assentos WHERE fkOnibus = ?");
            $pstmt->bindValue(1, $fkOnibus);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Assento::class);
            return $lista;
        }



    }
?>