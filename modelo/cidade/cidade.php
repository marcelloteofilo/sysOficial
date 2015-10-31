<?php
  class Cidade {
    private $codigo;
    private $descricao;  
	private $uf;  	
        
    public function setCodigo($l) {
      $this->codigo = trim($l);
    }
    
    public function getCodigo() {
      return $this->codigo;
    }	
	
    public function setDescricao($l) {
      $this->descricao = trim($l);
    }

    public function getDescricao() {
      return $this->descricao;
    }
	
    public function setUf($l) {
      $this->uf = trim($l);
    }

    public function getUf() {
      return $this->uf;
    }	
  }
?>