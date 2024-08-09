<?php
include_once 'ConexaoConfig.php';

class Conexao {
    
    private static $conexao;
    
    private function __construct() {
        // Omitir o construtor para que não se instancie essa classe...
    } 
             
    public static function getConexao() {
    	$config = new ConexaoConfig();
    	
    	if (!isset(self::$conexao)) {
    		self::$conexao = new PDO($config->getSgbd().":host=".$config->getHost()."; dbname=".$config->getBd().";", $config->getUsuario(), $config->getSenha());
    		self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	}
    	
    	return self::$conexao;
    }
        
}

?>

