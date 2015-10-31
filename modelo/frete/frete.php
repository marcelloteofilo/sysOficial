<?php
  class Frete {

  //Atributos
  private $codFrete;


  private $codVeiculo;
  private $placaVeiculo;

  private $codMotorista;
  private $nomeMotorista;


  private $ufDestino;
  private $ufOrigem;
  private $cidadeOrigem;
  private $cidadeDestino;   
    
  private $statusFrete; 
  private $codTransp;

  //Id Usuário     
  public function setCodFrete($codFrete) {
    $this->codFrete = trim($codFrete);
  }
    
  public function getCodFrete() {
    return $this->codFrete;
  }

  // GET/SET
  public function setCodVeiculo($codVeiculo) {
       $this->codVeiculo = trim($codVeiculo);
  }

  public function getCodVeiculo() {     
    if($this->codVeiculo == null){
      $this->codVeiculo = new Veiculo();
    }   
    return $this->codVeiculo;
  }

  // GET/SET
  public function setCodMotorista($codMotorista) {
       $this->codMotorista = trim($codMotorista);
  }

  public function getCodMotorista() {     
    if($this->codMotorista == null){
      $this->codMotorista = new Usuario();
    }   
    return $this->codMotorista;
  }  

//////////////////////////////////////////////////////////////////////
  
// GET/SET
  public function setUfDestino($ufDestino) {
      $this->ufDestino = trim($ufDestino);
    }
    
    public function getUfDestino() {
      return $this->ufDestino;
    }
    // GET/SET
  public function setUfOrigem($ufOrigem) {
      $this->ufOrigem = trim($ufOrigem);
    }
    
    public function getUfOrigem() {
      return $this->ufOrigem;
    }
    // GET/SET
  public function setCidadeOrigem($cidadeOrigem) {
      $this->cidadeOrigem = trim($cidadeOrigem);
    }
    
    public function getCidadeOrigem() {
      return $this->cidadeOrigem;
    }
    // GET/SET
  public function setCidadeDestino($cidadeDestino) {
      $this->cidadeDestino = trim($cidadeDestino);
    }
    
    public function getCidadeDestino() {
      return $this->cidadeDestino;
    }
    // GET/SET
  public function setPlacaVeiculo($placaVeiculo) {
      $this->placaVeiculo = trim($placaVeiculo);
    }
    
    public function getPlacaVeiculo() {
      return $this->placaVeiculo;
    }
    // GET/SET
  public function setNomeMotorista($nomeMotorista) {
      $this->nomeMotorista = trim($nomeMotorista);
    }
    
    public function getNomeMotorista() {
      return $this->nomeMotorista;
    }

  // GET/SET
  public function setStatusFrete($statusFrete) {
      $this->statusFrete = trim($statusFrete);
    }
    
    public function getStatusFrete() {
      return $this->statusFrete;
    }

  // GET/SET
  public function setCodTransp($codTransp) {
      $this->codTransp = trim($codTransp);
    }
    
    public function getCodTransp() {
      return $this->codTransp;
    }

  

  }
?>