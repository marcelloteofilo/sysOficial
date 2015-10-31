<?php
class LoginUsuario {
	private $id;
	private $login;
	private $senha;

	public function setId($l) {
		$this -> id = trim($l);
	}

	public function getId() {
		return $this -> id;
	}

	public function setlogin() {
		$this -> objlogin = $login;
	}

	public function getlogin() {
		return $this -> $login;
	}

	public function setsenha($senha) {
		$this -> objsenha = $senha;
	}

	public function getsenha() {
		return $this -> $senha;
	}
}
?>