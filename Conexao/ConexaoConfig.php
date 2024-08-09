<?php

class ConexaoConfig {

	private $sgbd;
	private $host;
	private $bd;
	private $usuario;
	private $senha;
	
	public function __construct(){
		$iniFile = parse_ini_file(__DIR__ . "/config.ini");
		$this->sgbd = $iniFile["sgbd"];
		$this->host = $iniFile["host"];
		$this->bd = $iniFile["bd"];
		$this->usuario = $iniFile["usuario"];
		$this->senha = $iniFile["senha"];
	}
	
	
	public function getSgbd() {
		return $this->sgbd;
	}

	public function getHost() {
		return $this->host;
	}

	public function getBd() {
		return $this->bd;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSgbd($sgbd) {
		$this->sgbd = $sgbd;
	}

	public function setHost($host) {
		$this->host = $host;
	}

	public function setBd($bd) {
		$this->bd = $bd;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}	
}

