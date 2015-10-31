<?php
//require_once("/opt/lampp/htdocs/systransportes/modelo/cidade/cidade.php");
  class Carga {

  //Atributos
  private $codCarga;    
  private $codUsuario;
  private $origem;  
  private $destino;  
  private $altura;  
  private $largura; 
  private $peso;
  private $comprimento;
  private $quantidade;
  private $valor; 

  private $telefone;  
  private $logradouro;  
  private $bairro;  
  private $uf;  
  private $cidade;

  private $numero;
  private $observacao; 

  private $naturezaCarga;
  private $dataPedido;
  private $distancia;
  private $prazo;
  private $frete;

  //status
  private $coletada; // Coleta/Carga
  private $cotado;
  private $statusCarga;


  private $pessoaFisicaNome;
  private $pessoaJuridicaNome;

   
  //Id Usuário     
  public function setCodCarga($codCarga) {
    $this->codCarga = trim($codCarga);
  }
    
  public function getCodCarga() {
    return $this->codCarga;
  }

  // GET/SET
  public function setObjUsuario($codUsuario) {
       $this->codUsuario = trim($codUsuario);
  }

  public function getObjUsuario() {     
    if($this->codUsuario == null){
      $this->codUsuario = new Usuario();
    }   
    return $this->codUsuario;
  } 

  // GET/SET
  public function setObjCidadeOrigem($origem) {
       $this->origem = trim($origem);
  }
  
  public function getObjCidadeOrigem() {     
    if($this->origem == null){
      $this->origem = new Cidade();
    }   
    return $this->origem;
  } 

  // GET/SET
  public function setObjCidadeDestino($destino) {
       $this->destino = trim($destino);
  }

  public function getObjCidadeDestino() {     
    if($this->destino == null){
      $this->destino = new Cidade();
    }   
    return $this->destino;
  }

  // GET/SET
  public function setAltura($altura) {
      $this->altura = trim($altura);
    }
    
    public function getAltura() {
      return $this->altura;
    }

  // GET/SET
  public function setLargura($largura) {
      $this->largura = trim($largura);
    }
    
    public function getLargura() {
      return $this->largura;
    }

    // GET/SET
  public function setPeso($peso) {
      $this->peso = trim($peso);
    }
    
    public function getPeso() {
      return $this->peso;
    }

    // GET/SET
  public function setComprimento($comprimento) {
      $this->comprimento = trim($comprimento);
    }
    
    public function getComprimento() {
      return $this->comprimento;
    }


    // GET/SET
  public function setQuantidade($quantidade) {
      $this->quantidade = trim($quantidade);
    }
    
    public function getQuantidade() {
      return $this->quantidade;
    }

    // GET/SET
  public function setValor($valor) {
      $this->valor = trim($valor);
    }
    
    public function getValor() {
      return $this->valor;
    }

    // GET/SET
  public function setTelefone($telefone) {
      $this->telefone = trim($telefone);
    }
    
    public function getTelefone() {
      return $this->telefone;
    }

    // GET/SET
  public function setLogradouro($logradouro) {
      $this->logradouro = trim($logradouro);
    }
    
    public function getLogradouro() {
      return $this->logradouro;
    }

    // GET/SET
  public function setBairro($bairro) {
      $this->bairro = trim($bairro);
    }
    
    public function getBairro() {
      return $this->bairro;
    }

    // GET/SET
  public function setUf($uf) {
      $this->uf = trim($uf);
    }
    
    public function getUf() {
      return $this->uf;
    }

    // GET/SET
  public function setCidade($cidade) {
      $this->cidade = trim($cidade);
    }
    
    public function getCidade() {
      return $this->cidade;
    }

    // GET/SET
  public function setNumero($numero) {
      $this->numero = trim($numero);
    }
    
    public function getNumero() {
      return $this->numero;
    }

    // GET/SET
  public function setObservacao($observacao) {
      $this->observacao = trim($observacao);
    }
    
    public function getObservacao() {
      return $this->observacao;
    }

    // GET/SET
  public function setNaturezaCarga($naturezaCarga) {
      $this->naturezaCarga = trim($naturezaCarga);
    }
    
    public function getNaturezaCarga() {
      return $this->naturezaCarga;
    }

    // GET/SET
  public function setDataPedido($dataPedido) {
      $this->dataPedido = trim($dataPedido);
    }
    
    public function getDataPedido() {
      return $this->dataPedido;
    }

    // GET/SET
  public function setDistancia($distancia) {
      $this->distancia = trim($distancia);
    }
    
    public function getDistancia() {
      return $this->distancia;
    }

    // GET/SET
  public function setPrazo($prazo) {
      $this->prazo = trim($prazo);
    }
    
    public function getPrazo() {
      return $this->prazo;
    }

    // GET/SET
  public function setFrete($frete) {
      $this->frete = trim($frete);
    }
    
    public function getFrete() {
      return $this->frete;
    }

    // GET/SET
  public function setColetada($coletada) {
      $this->coletada = trim($coletada);
    }
    
    public function getColetada() {
      return $this->coletada;
    }

    // GET/SET
  public function setStatusCarga($statusCarga) {
      $this->statusCarga = trim($statusCarga);
    }
    
    public function getStatusCarga() {
      return $this->statusCarga;
    }

     // GET/SET
  public function setCotado($cotado) {
      $this->cotado = trim($cotado);
    }
    
    public function getCotado() {
      return $this->cotado;
    }

    //GET/SET     
  public function setPessoaFisicaNome($pessoaFisicaNome) {
    $this->pessoaFisicaNome = trim($pessoaFisicaNome);
  }
    
  public function getPessoaFisicaNome() {
    return $this->pessoaFisicaNome;
  }

  //GET/SET     
  public function setPessoaJuridicaNome($pessoaJuridicaNome) {
    $this->pessoaJuridicaNome = trim($pessoaJuridicaNome);
  }
    
  public function getPessoaJuridicaNome() {
    return $this->pessoaJuridicaNome;
  }


  }
?>