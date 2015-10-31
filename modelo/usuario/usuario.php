<?php
  class Usuario {

  //Atributos
  private $id;    
  private $status;
  private $perfil;  
  private $nomeCompleto;  
  private $razaoSocial;  
  private $nomeFantasia; 
  private $tipoEmpresa;
  private $rg;
  private $orgaoExpedidor;
  private $cpf; 
  private $cnpj;  

  private $email;  
  private $telefone1;  
  private $telefone2;   
  
  private $cep;
  private $logradouro;    
  private $bairro;
  private $numero;
  private $complemento;
  private $estado;
  private $cidade;

  private $login;
  private $senha;

   
  //Id Usuário     
  public function setId($l) {
    $this->id = trim($l);
  }
    
  public function getId() {
    return $this->id;
  }

  //Status
  public function setStatus($Status) {
    $this->status = trim($Status);
  }
  public function getStatus() {
    return $this->status;
  } 

  //Perfil
	public function setPerfil($perfil) {
    $this->perfil = trim($perfil);
  }
  public function getPerfil() {
    return $this->perfil;
  }	
	
	//Nome Completo
  public function setNomeCompleto($nomeCompleto) {
    $this->nomeCompleto = trim($nomeCompleto);
  }
  public function getNomeCompleto() {
    return $this->nomeCompleto;
  } 

  //Razao Social
  public function setRazaoSocial($razaoSocial) {
    $this->razaoSocial = trim($razaoSocial);
  }
  public function getRazaoSocial() {
    return $this->razaoSocial;
  } 

  //Nome Fantasia
  public function setnomeFantasia($nomeFantasia) {
    $this->nomeFantasia = trim($nomeFantasia);
  }
  public function getnomeFantasia() {
    return $this->nomeFantasia;
  } 

  //Tipo de Empresa
  public function setTipoEmpresa($tipoEmpresa) {
    $this->tipoEmpresa = trim($tipoEmpresa);
  }
  public function getTipoEmpresa() {
    return $this->tipoEmpresa;
  } 

  //RG
  public function setRg($rg) {
    $this->rg = trim($rg);
  }
  public function getRg() {
    return $this->rg;
  } 

  //Orgão Expedidor
  public function setOrgaoExpedidor($orgaoExpedidor) {
    $this->orgaoExpedidor = trim($orgaoExpedidor);
  }
  public function getOrgaoExpedidor() {
    return $this->orgaoExpedidor;
  } 

    //CPF
  public function setCpf($cpf) {
    $this->cpf = trim($cpf);
  }
  public function getCpf() {
    return $this->cpf;
  } 

    //CNPJ
  public function setCnpj($cnpj) {
    $this->cnpj = trim($cnpj);
  }
  public function getCnpj() {
    return $this->cnpj;
  } 

  //Email
  public function setEmail($email) {
    $this->email = trim($email);
  }
  public function getEmail() {
    return $this->email;
  } 

  //Telefone 1
  public function setTelefone1($telefone1) {
    $this->telefone1 = trim($telefone1);
  }
  public function getTelefone1() {
    return $this->telefone1;
  } 

  //Telefone 2
  public function setTelefone2($telefone2) {
    $this->telefone2 = trim($telefone2);
  }
  public function getTelefone2() {
    return $this->telefone2;
  } 

  //Logradouro
  public function setLogradouro($logradouro) {
    $this->logradouro = trim($logradouro);
  }
  public function getLogradouro() {
    return $this->logradouro;
  } 

  //Bairro
  public function setBairro($bairro) {
    $this->bairro = trim($bairro);
  }
  public function getBairro() {
    return $this->bairro;
  } 

  //Número
  public function setNumero($numero) {
    $this->numero = trim($numero);
  }
  public function getNumero() {
    return $this->numero;
  } 

  //Complemento
  public function setComplemento($complemento) {
    $this->complemento = trim($complemento);
  }
  public function getComplemento() {
    return $this->complemento;
  } 

  //CEP
  public function setCep($cep) {
    $this->cep = trim($cep);
  }
  public function getCep() {
    return $this->cep;
  }   


  //cidade
  public function setCidade($cidade) {
    $this->cidade = trim($cidade);
  }
  public function getCidade() {
    return $this->cidade;
  }

  //estado
  public function setEstado($estado) {
    $this->estado = trim($estado);
  }
  public function getEstado() {
    return $this->estado;
  }


  //login
  public function setLogin($login) {
    $this->login = trim($login);
  }
  public function getLogin() {
    return $this->login;
  } 

  //senha
  public function setSenha($senha) {
    $this->senha = trim($senha);
  }
  public function getSenha() {
    return $this->senha;
  } 

  }
?>