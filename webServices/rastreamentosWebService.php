<?php

require_once("../modelo/rastreamento/rastreamentoSql.php");
session_start();
extract($_REQUEST);
extract($_SESSION);

//if ($_GET["editSave"] == "incluirRastreamento") {
//    //Classe de Rastreamento
//    $rastreamento = new Rastreamento();
//
//    //Atributos da classe Rastreamento/Valores
//    $rastreamento->setCte($_REQUEST['idCte']);
//    $rastreamento->setLocalizacao($_REQUEST['localizacao']);
//
//    if (rastreamentoSql::adicionar($rastreamento)) {
//
//        echo json_encode(array('success' => true));
//
//        $resultado[] = array(
//            'oka' => 'oks',
//        );
//    }
//
//    echo(json_encode($resultado));
//}
//
//if ($_GET["editSave"] == "alterarRastreamento") {
//    $rastreamento = new Rastreamento();
//
//    //Atributos da classe Rastreamento/Valores
//    $rastreamento->setId($_REQUEST['id']);
//    $rastreamento->setLocalizacao($_REQUEST['localizacao']);
//    $rastreamento->setCte($_REQUEST['idCte']);
//
//    if (rastreamentoSql::alterar($rastreamento)) {
//        $resultado[] = array(
//            'oka' => 'oks',
//        );
//    }
//
//    echo(json_encode($resultado));
//}
//
//
//if ($_GET["editSave"] == "deletarRastreamento") {
//    $rastreamento = new Rastreamento();
//
//    $rastreamento->setId($_REQUEST['id']);
//
//    if (rastreamentoSql::remover($rastreamento)) {
//        $resultado[] = array(
//            'ok' => 'ok',
//        );
//    }
//    echo( json_encode($resultado) );
//}


if ($_GET["editSave"] == "carregarRastreamento") {

    $listaRastreamento = rastreamentoSql::carregarLista();

    for ($i = 0; $i < count($listaRastreamento); $i++) {
        $resultado[] = array(
            //'codRastreamento' => $listaRastreamento[$i]->getId(),
            'codRota' => $listaRastreamento[$i]->getCodRota(),
            'localizacao' => $listaRastreamento[$i]->getLocalizacao(),
            'longitude' => $listaRastreamento[$i]->getLongitude(),
            'latitude' => $listaRastreamento[$i]->getLatitude(),
            'data' => $listaRastreamento[$i]->getData()
        );
    }

    echo (json_encode($resultado));

    return $resultado;
}
?>