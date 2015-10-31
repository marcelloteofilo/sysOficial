<?php

require_once("../modelo/mercadoria/mercadoriaSql.php");
session_start();
extract($_REQUEST);
extract($_SESSION);

if ($_GET["editSave"] == "incluirMercadoria") {
    //Classe de Mercadoria
    $mercadoria = new Mercadoria();

    //Atributos da classe Mercadoria/Valores
    $mercadoria->getObjCarga()->setCodCarga($_REQUEST['codCarga']);
    $mercadoria->setDescricaoMercadoria($_REQUEST['descricao']);
    $mercadoria->setPeso($_REQUEST['pesoMercadoria']);
    $mercadoria->setValorMercadoria($_REQUEST['valorMercadoria']);
    $mercadoria->setQuantidade($_REQUEST['quantidade']);

    if (mercadoriaSql::adicionar($mercadoria)) {

        echo json_encode(array('success' => true));

//        $resultado[] = array(
//            'oka' => 'oks',
//        );
    }

    echo(json_encode($resultado));
}

if ($_GET["editSave"] == "alterarMercadoria") {
    $mercadoria = new Mercadoria();

    //Atributos da classe Mercadoria/Valores
    $mercadoria->setId($_REQUEST['id']);
    $mercadoria->getObjCarga()->setCodCarga($_REQUEST['codCarga']);
    $mercadoria->setDescricaoMercadoria($_REQUEST['descricao']);
    $mercadoria->setPeso($_REQUEST['pesoMercadoria']);
    $mercadoria->setValorMercadoria($_REQUEST['valorMercadoria']);
    $mercadoria->setQuantidade($_REQUEST['quantidade']);

    if (mercadoriaSql::alterar($mercadoria)) {
        $resultado[] = array(
            'oka' => 'oks',
        );
    }

    echo(json_encode($resultado));
}


if ($_GET["editSave"] == "deletarMercadoria") {
    $mercadoria = new Mercadoria();

    $mercadoria->setId($_REQUEST['id']);

    if (mercadoriaSql::remover($mercadoria)) {
        $resultado[] = array(
            'ok' => 'ok',
        );
    }
    echo( json_encode($resultado) );
}


if ($_GET["editSave"] == "carregarMercadoria") {

    $listaMercadoria = mercadoriaSql::carregarLista();

    for ($i = 0; $i < count($listaMercadoria); $i++) {
        $resultado[] = array(
            'id' => $listaMercadoria[$i]->getId(),
            'carga' => $listaMercadoria[$i]->getObjCarga()->getCodCarga(),
            'descricao' => $listaMercadoria[$i]->getDescricaoMercadoria(),
            'peso' => $listaMercadoria[$i]->getPeso(),
            'valor' => $listaMercadoria[$i]->getValorMercadoria(),
            'quantidade' => $listaMercadoria[$i]->getQuantidade()
        );
    }

    echo (json_encode($resultado));

    return $resultado;
}
?>