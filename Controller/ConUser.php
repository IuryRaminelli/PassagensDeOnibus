<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/User.php';

    class ConUser{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertUser(User $User){
            $pstmt = $this->conexao->prepare("INSERT INTO user 
            (apelido, nome, senha, CPF, Telefone) VALUES 
            (?,?,?,?,?)");
            $pstmt->bindValue(1, $User->getApelido());
            $pstmt->bindValue(2, $User->getNome());
            $pstmt->bindValue(3, $User->getSenha());
            $pstmt->bindValue(4, $User->getCPF());
            $pstmt->bindValue(5, $User->getTelefone());
            $pstmt->execute();
            return $pstmt;
        }
        function selectLoginUser1($apelido){
            $pstmt = $this->conexao->prepare("SELECT * FROM user us WHERE us.apelido = :apelido ");
            $pstmt->bindValue(":apelido", $apelido);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, user::class);
            return $lista;
        } 

        public function isLoggedIn(){
            if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == true){
                return true;
            }
            return false;
        }
    }

    
?>