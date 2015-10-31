<?php
  class Cte {

  	//Atributos
  	private $numeroCte;
  	private $codigoCarga;

    private $codigoRota;
    private $codTransp;

  	private $situacao;
  	private $chaveAcesso;
  	private $statusCte;
  	private $emissao;

    private $chaveCgm;

    public function setChaveCgm($chaveCgm) {
      $this->chaveCgm = trim($chaveCgm);
    }

    public function getChaveCgm() {
      return $this->chaveCgm;
    }

  	public function setNumeroCte($numeroCte) {
    	$this->numeroCte = trim($numeroCte);
  	}
    
  	public function getNumeroCte() {
    	return $this->numeroCte;
  	}

    public function setCodTransp($codTransp) {
      $this->codTransp = trim($codTransp);
    }
    
    public function getCodTransp() {
      return $this->codTransp;
    }

  	public function setCodigoCarga($codigoCarga) {
  		$this->codigoCarga = trim($codigoCarga);
  	}

  	public function getCodigoCarga() {
  		return $this->codigoCarga;
  	}

    public function setCodigoRota($codigoRota) {
      $this->codigoRota = trim($codigoRota);
    }

    public function getCodigoRota() {
      return $this->codigoRota;
    }

  	public function setSituacao($situacao) {
  		$this->situacao = trim($situacao);
  	}

  	public function getSituacao() {
  		return $this->situacao;
  	}

  	public function setChaveAcesso($chaveAcesso) {
  		$this->chaveAcesso = trim($chaveAcesso);
  	}

  	public function getChaveAcesso() {
  		return $this->chaveAcesso;
  	}

  	public function setStatusCte($statusCte) {
  		$this->statusCte = trim($statusCte);
  	}

  	public function getStatusCte() {
  		return $this->statusCte;
  	}

  	public function setEmissao($emissao) {
  		$this->emissao = trim($emissao);
  	}

  	public function getEmissao() {
  		return $this->emissao;
  	}

 }