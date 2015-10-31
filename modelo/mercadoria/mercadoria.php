<?php
//require_once("/opt/lampp/htdocs/systransportes/modelo/carga/carga.php");
require_once("/../../modelo/carga/carga.php");

class Mercadoria {

    //Atributos
    private $id;
    private $descricaoMercadoria;
    private $pesoMercadoria;
    private $objCarga;
    private $quantidade;
    private $valorMercadoria;

    //Id Mercadoria
    public function setId($l) {
        $this->id = trim($l);
    }

    public function getId() {
        return $this->id;
    }

    //Descricao Mercadoria
    public function setDescricaoMercadoria($descricaoMercadoria) {
        $this->descricaoMercadoria = trim($descricaoMercadoria);
    }

    public function getDescricaoMercadoria() {
        return $this->descricaoMercadoria;
    }

    //pesoMercadoria Mercadoria
    public function setPeso($pesoMercadoria) {
        $this->pesoMercadoria = trim($pesoMercadoria);
    }

    public function getPeso() {
        return $this->pesoMercadoria;
    }

    //Id Cotacao
    public function setObjCarga($objCarga) {
        $this->objCarga = trim($objCarga);
    }

    public function getObjCarga() {
        if ($this->objCarga == null) {
            $this->objCarga = new Carga();
        }
        return $this->objCarga;
    }

    public function getValorMercadoria() {
        return $this->valorMercadoria;
    }

    //Id Cotacao
    public function setValorMercadoria($valorMercadoria) {
        $this->valorMercadoria = trim($valorMercadoria);
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    //Id Cotacao
    public function setQuantidade($quantidade) {
        $this->quantidade = trim($quantidade);
    }

}

?>
