<?php
	require_once("/../usuario/usuario.php");  
	require_once("/../carga/carga.php");  
	require_once("/../veiculo/veiculo.php");  
	
  class Coleta {
 
 
  private $codColeta;  
  private $codCarga;
	private $codMotorista;
  private $nomeMotorista;
  private $telefoneMotorista;   	
	private $codVeiculo;
  private $placaVeiculo;   
	private $data;   
	private $hora;
	   
	private $coletada;  	
	private $telefone;  	 
	private $logradouro;   
	private $bairro; 
	private $numero;   
	private $estado;  	
	private $cidade;
	private $observacao;  	  	
            
    public function setCodColeta($codColeta) {
      $this->codColeta = trim($codColeta);
    }
    
    public function getCodColeta() {
      return $this->codColeta;
    }	


    public function setCodCarga($codCarga) {
		   $this->codCarga = trim($codCarga);
	}
	
	public function getCodCarga() {     //da uma olhada depois
		if($this->codCarga == null){
			$this->codCarga = new Carga();
		}		
		return $this->codCarga;
	}

    public function setCodMotorista($codMotorista) {
		   $this->codMotorista = trim($codMotorista);
	}
	
	public function getCodMotorista() {     //da uma olhada depois
		/*if($this->codMotorista == null){
			$this->codMotorista = new Usuario();
		}	*/	
		return $this->codMotorista;
	}

	 public function setCodVeiculo($codVeiculo) {
		   $this->codVeiculo = trim($codVeiculo);
	}
	
	public function getCodVeiculo() {     //da uma olhada depois
		if($this->codVeiculo == null){
			$this->codVeiculo = new Veiculo();
		}		
		return $this->codVeiculo;
	}

   public function setNomeMotorista($nomeMotorista) {
      $this->nomeMotorista = trim($nomeMotorista);
    }
    
    public function getNomeMotorista() {
      return $this->nomeMotorista;
    } 

    public function setPlacaVeiculo($placaVeiculo) {
      $this->placaVeiculo = trim($placaVeiculo);
    }
    
    public function getPlacaVeiculo() {
      return $this->placaVeiculo;
    }

    public function setTelefoneMotorista($telefoneMotorista) {
      $this->telefoneMotorista = trim($telefoneMotorista);
    }
    
    public function getTelefoneMotorista() {
      return $this->telefoneMotorista;
    }

	public function setData($data) {
      $this->data = trim($data);
    }
    
    public function getData() {
      return $this->data;
    }	

    public function setHora($hora) {
      $this->hora = trim($hora);
    }
    
    public function getHora() {
      return $this->hora;
    }	

//////////////////////////// CARGA /////////////////////////////////////////////////
    public function setColetada($coletada) {
      $this->coletada = trim($coletada);
    }
    
    public function getColetada() {
      return $this->coletada;
    }	

    public function setTelefone($telefone) {
      $this->telefone = trim($telefone);
    }
    
    public function getTelefone() {
      return $this->telefone;
    }	

    public function setLogradouro($logradouro) {
      $this->logradouro = trim($logradouro);
    }
    
    public function getLogradouro() {
      return $this->logradouro;
    }

    public function setBairro($bairro) {
      $this->bairro = trim($bairro);
    }
    
    public function getBairro() {
      return $this->bairro;
    }

    public function setNumero($numero) {
      $this->numero = trim($numero);
    }
    
    public function getNumero() {
      return $this->numero;
    }

    public function setEstado($estado) {
      $this->estado = trim($estado);
    }
    
    public function getEstado() {
      return $this->estado;
    }

    public function setCidade($cidade) {
      $this->cidade = trim($cidade);
    }
    
    public function getCidade() {
      return $this->cidade;
    }

    public function setObservacao($observacao) {
      $this->observacao = trim($observacao);
    }
    
    public function getObservacao() {
      return $this->observacao;
    }
  }
?>