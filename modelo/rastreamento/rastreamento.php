<?php

class Rastreamento {

    //Atributos
    private $codRastreamento;
    private $codRota;
    private $longitude;
    private $latitude;
    private $localizacao;
    private $data;

    //Id Rastreamento
    public function setId($l) {
        $this->codRastreamento = trim($l);
    }

    public function getId() {
        return $this->codRastreamento;
    }

    public function setCodRota($codRota) {
        $this->codRota = trim($codRota);
    }

    public function getCodRota() {
        return $this->codRota;
    }

    public function setLongitude($longitude) {
        $this->longitude = trim($longitude);
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = trim($latitude);
    }

    public function getLatitude() {
        return $this->latitude;
    }

    //Descricao Rastreamento
    public function setLocalizacao($localizacao) {
        $this->localizacao = trim($localizacao);
    }

    public function getLocalizacao() {
        return $this->localizacao;
    }

    //Descricao Rastreamento
    public function setData($data) {
        $this->data = trim($data);
    }

    public function getData() {
        return $this->data;
    }

}
?>

