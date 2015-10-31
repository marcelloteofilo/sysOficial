//VARIAVEIS UTEIS
var contaNumero = 0;
var contaLinha = 0;
var idCotacao = 0;
var idStatus = 0;
var statusCotacao = 0;
var listaDeCotacoes = "";
var aguardaDigitar;
var webServiceCotacao = '../../webServices/cotacaoWebService.php';
var backgroundAnterior = "";
var corAnterior = "";

////OCULTAR O MAPA SEM CONSULTA
//$(document).ready(function () {
//    $("#totalGeral").hide("slow");
//    $("#mapaGoogle").hide("slow");
//    $("#ufOrigem").focus();
//    var acao = document.getElementById('acao').value;
//    if (acao == 'visualizar') {
//        $("#gravarBtn").hide("slow");
//    }
//});

//CONSULTA COTAÇÕES
function consultaCotacoes(aguardarDigitar, campoDigitado) {
    $("#btnVisualizar").hide("slow");
    $("#btnAlterar").hide("slow");
    $("#btnCancelar").hide("slow");
    $("#btnAprovar").hide("slow");
    var realizaConsulta = false;
    var argumento = "";
    if (typeof campoDigitado != "undefined")
    {
        if (campoDigitado.value.length != contaNumero)
        {
            contaNumero = campoDigitado.value.length;
            campoDigitado.style.background = "black";
            campoDigitado.style.color = "white";
            argumento = campoDigitado.value;
            realizaConsulta = true;
        }
    }
    else
    {
        realizaConsulta = true;
    }
    if (realizaConsulta) {
        var jsonParametros = {editSave: 'consultaCotacao', argumento: argumento};
        if (aguardaDigitar) {
            clearTimeout(aguardaDigitar);
            aguardaDigitar = setInterval(function () {
                acessoWebService(jsonParametros, webServiceCotacao);
            }, 1000);
        } else {
            acessoWebService(jsonParametros, webServiceCotacao);
        }
    }
}

//CONSULTA COTACAO POR CODIGO
function consultaCotacao(idCotacao) {
    if (idCotacao > 0) {
        var jsonParametros = {editSave: 'consultaCotacao', idCotacao: idCotacao};
        acessoWebService(jsonParametros, webServiceCotacao);
    }
}


//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
function crudCotacao(acao) {
    //VALIDAR ANTES DE INCLUIR
    if (document.getElementById('cidadeOrigem').value.length == 0) {
        alert('Por Favor, informe a Cidade de Origem!');
        document.getElementById('cidadeOrigem').focus();
        return;
    }
    if (document.getElementById('cidadeDestino').value.length == 0) {
        alert('Por Favor, informe a Cidade de Destino!');
        document.getElementById('cidadeDestino').focus();
        return;
    }
    if (document.getElementById('pesoCotacao').value.length == 0) {
        alert('Por Favor, informe o Peso da Mercadoria!');
        document.getElementById('pesoCotacao').focus();
        return;
    }
    if (document.getElementById('valor').value.length == 0) {
        alert('Por Favor, informe o Valor da Mercadoria!');
        document.getElementById('valor').focus();
        return;
    }

    var idCotacao = document.getElementById('idCotacao');
    var qtdCaixas = document.getElementById('qtdCaixas');
    var cidadeOrigem = document.getElementById('cidadeOrigem').value;
    var codCidadeOrigem = cidadeOrigem.substring(0, 7);
    var cidadeDestino = document.getElementById('cidadeDestino').value;
    var codCidadeDestino = cidadeDestino.substring(0, 7);
    var descricao = document.getElementById('descricaoCotacao');
    var status = document.getElementById('idStatus');

    var altura = document.getElementById('altura');
    var tira_Virgula = altura.value.replace(".", "");
    altura = tira_Virgula.replace(",", ".");

    var largura = document.getElementById('largura');
    var tira_Virgula = largura.value.replace(".", "");
    largura = tira_Virgula.replace(",", ".");

    var peso = document.getElementById('pesoCotacao');
    var tira_Virgula = peso.value.replace(".", "");
    peso = tira_Virgula.replace(",", ".");

    var comprimento = document.getElementById('comprimento');
    var tira_Virgula = comprimento.value.replace(".", "");
    comprimento = tira_Virgula.replace(",", ".");

    var valorCarga = document.getElementById('valor');
    var tira_Virgula = valorCarga.value.replace(".", "");
    valorCarga = tira_Virgula.replace(",", ".");

    var distancia = document.getElementById('txtDistancia');
    var distanciaSemKm = distancia.value.substr(0, (distancia.value.length - 3)); //PEGA  APENAS OS NUMNEROS
    var valorMySql = distanciaSemKm.replace(".", ""); // TIRA OS PONTOS DE MILHAR
    distancia = valorMySql.replace(",", ".");	  // VIRGULA DE CASA DECIMAL VIRA PONTO (PADRÃO AMERICANO)

    var valorFrete = document.getElementById('valorFrete');
    var tira_Virgula = valorFrete.value.replace(".", "");
    valorFrete = tira_Virgula.replace(",", ".");
    valorFrete = valorFrete.substr(3, valorFrete.length);

    var txtPrazo = document.getElementById('txtTempo');
    pegaPrazo = txtPrazo.value;
    var prazo = pegaPrazo.substr(0, (pegaPrazo.length - 7));

    var idUsuario = 1;



    if (acao == 'incluir')
    {
        jsonParametros = {editSave: 'incluirCotacao',
            idUsuario: idUsuario,
            descricao: descricao.value,
            valorFrete: valorFrete,
            prazo: prazo,
            altura: altura,
            largura: largura,
            distancia: distancia,
            peso: peso,
            comprimento: comprimento,
            quantidadeCaixas: qtdCaixas.value,
            valorCarga: valorCarga,
            codCidadeOrigem: codCidadeOrigem,
            codCidadeDestino: codCidadeDestino,
            status: status.value};
    }
    if (acao == 'alterar')
    {
        jsonParametros = {editSave: 'alterarCotacao',
            idCotacao: idCotacao.value,
            idUsuario: idUsuario,
            descricao: descricao.value,
            valorFrete: valorFrete,
            prazo: prazo, altura: altura,
            largura: largura, peso: peso,
            distancia: distancia,
            comprimento: comprimento,
            quantidadeCaixas: qtdCaixas.value,
            valorCarga: valorCarga,
            codCidadeOrigem: codCidadeOrigem,
            codCidadeDestino: codCidadeDestino,
            status: status.value};
    }
    if (acao == 'cancelar')
    {
        jsonParametros = {editSave: 'statusCotacao',
            status: 0,
            idCotacao: idCotacao.value};
    }
    if (acao == 'aprovar')
    {
        jsonParametros = {editSave: 'aprovarCotacao',
            idCotacao: idCotacao.value,
            aprovadoCliente: 1};
    }
    acessoWebService(jsonParametros, webServiceCotacao);

}

//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
function atendenteCotacaoAprovar(acao) {

    var idCotacao = document.getElementById('id');
    jsonParametros = {editSave: 'aprovarCotacao',
        idCotacao: idCotacao.value,
        aprovadoAtendente: 1};

    var $xhr = $.getJSON(webServiceCotacao, jsonParametros);

    $xhr.done(function (resultadoXml) {
        alert('Operação Realizada Com Sucesso!');
        $('#dlg').dialog('close');
        location.reload();
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });


}

//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
function atendenteCotacaoCancelar(acao) {

    var idCotacao = document.getElementById('id');
    jsonParametros = {editSave: 'statusCotacao',
        status: 0,
        idCotacao: idCotacao.value};

    var $xhr = $.getJSON(webServiceCotacao, jsonParametros);

    $xhr.done(function (resultadoXml) {
        alert('Operação Realizada Com Sucesso!');
        $('#dlg').dialog('close');
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });


}



//ACESSO AO WEBSERVICE
function acessoWebService(jsonParametros, nomeWebService) {
    clearInterval(aguardaDigitar);
    var $xhr = $.getJSON(nomeWebService, jsonParametros);

    $xhr.done(function (resultadoXml) {
        trataResultadoWebService(resultadoXml);
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });

}

//TRATA RESULTADO WEBSERVICE
function trataResultadoWebService(resultadoXml) {
    if (resultadoXml[0].resultado == 'ok') {
        alert('Operação Realizada Com Sucesso!');
        irPara('viewConsulta.php', 'consultar');
    }
    if (resultadoXml[0].resultado == 'consulta') {
        listaDeCotacoes = resultadoXml;
        for (var i = 0; i < resultadoXml.length; i++) {
            var status = 'AGUARDANDO ATENDENTE';
            if (i == 0)
            {
                //Cria a tabela
                var trLinhaTitulo = document.createElement("tr");
                trLinhaTitulo.style.background = 'black';
                trLinhaTitulo.style.color = 'white';

                trLinhaTitulo.innerHTML = '<td>ID</td>'
                    + '<td>Cidade Origem</td>'
                    + '<td>UF</td>'
                    + '<td>Cidade Destino</td>'
                    + '<td>UF</td>'
                    + '<td>Valor Carga</td>'
                    + '<td>Frete</td>'
                    + '<td>PRAZO</td>'
                    + '<td>STATUS</td>';

                document.getElementById('tabelaConsulta').appendChild(trLinhaTitulo);
            }

            //Pega a tabela pelo id
            var trLinha = document.createElement("tr");
            trLinha.setAttribute("class", "itens");
            trLinha.setAttribute("onClick", "selecionaCotacao(this)");
            if (resultadoXml[i].status == '0') {

                trLinha.style.background = 'red';
                trLinha.style.color = 'white';
                status = 'CANCELADO';
            }
            if (resultadoXml[i].status == '2') {
                trLinha.style.background = 'BLUE';
                trLinha.style.color = 'white';
                status = 'AGUARDANDO SUA AUTORIZAÇÃO';
            }
            if (resultadoXml[i].status == '3') {
                trLinha.style.background = 'GREEN';
                trLinha.style.color = 'white';
                status = 'COLETA AGENDADA';
            }
            trLinha.name = resultadoXml[i].id;
            trLinha.id = i;
            trLinha.innerHTML = '<td id="idCotacao' + resultadoXml[i].id
                + '">' + resultadoXml[i].id
                + '</td><td>' + (resultadoXml[i].cidadeOrigem).substr(0, 20)
                + '</td><td>' + resultadoXml[i].ufOrigem
                + '</td><td>' + (resultadoXml[i].cidadeDestino).substr(0, 20)
                + '</td><td>' + resultadoXml[i].ufDestino
                + '</td><td>' + resultadoXml[i].valorCarga
                + '</td><td>' + resultadoXml[i].valorFrete
                + '</td><td>' + resultadoXml[i].prazo
                + '</td><td>' + status + '</td>';

            document.getElementById('tabelaConsulta').appendChild(trLinha);
        }
    }

    if (resultadoXml[0].resultado == 'idCotacao') {
        var qtdCaixas = document.getElementById('qtdCaixas');
        var caixaPesquisaOrigem = document.getElementById('txtOrigem');
        var cidadeOrigem = document.getElementById('cidadeOrigem');
        var ufOrigem = document.getElementById('ufOrigem');
        var caixaPesquisaDestino = document.getElementById('txtDestino');
        var cidadeDestino = document.getElementById('cidadeDestino');
        var ufDestino = document.getElementById('ufDestino');
        var altura = document.getElementById('altura');
        var largura = document.getElementById('largura');
        var peso = document.getElementById('pesoCotacao');
        var comprimento = document.getElementById('comprimento');
        var valorCarga = document.getElementById('valor');
        var valorFrete = document.getElementById('valorFrete');
        var descricao = document.getElementById('descricaoCotacao');
        var prazo = document.getElementById('txtTempo');
        var idStatus = document.getElementById('idStatus');
        var status = document.getElementById('status');

        qtdCaixas.value = resultadoXml[0].quantidadeCaixas;
        ufOrigem.value = resultadoXml[0].ufOrigem;
        consultaCidades('cidadeOrigem', 'ufOrigem', resultadoXml[0].codCidadeOrigem, resultadoXml[0].cidadeOrigem);
        ufDestino.value = resultadoXml[0].ufDestino;
        consultaCidades('cidadeDestino', 'ufDestino', resultadoXml[0].codCidadeDestino, resultadoXml[0].cidadeDestino);
        altura.value = resultadoXml[0].altura;
        idStatus.value = resultadoXml[0].status;
        var verificaIdStatus = resultadoXml[0].status;
        if (verificaIdStatus == '0') {
            status.value = "CANCELADO";
            status.style.background = 'red';
            status.style.color = 'white';
        }
        if (verificaIdStatus == '1') {
            status.value = "AGUARDANDO ATENDENTE";
        }
        if (verificaIdStatus == '2') {
            status.value = 'AGUARDANDO SUA AUTORIZAÇÃO';
            status.style.background = 'blue';
            status.style.color = 'white';
        }
        if (verificaIdStatus == '3') {
            status.value = "AUTORIZADO";
            status.style.background = 'green';
            status.style.color = 'white';
        }
        largura.value = resultadoXml[0].largura;
        peso.value = resultadoXml[0].peso;
        comprimento.value = resultadoXml[0].comprimento;
        valorCarga.value = resultadoXml[0].valorCarga;
        prazo.value = resultadoXml[0].prazo + ' Dia(s)';
        valorFrete.value = 'R$:' + resultadoXml[0].valorFrete;
        descricao.value = resultadoXml[0].descricao;
        caixaPesquisaOrigem.value = resultadoXml[0].cidadeOrigem + ' ' + ufOrigem.value;
        caixaPesquisaDestino.value = resultadoXml[0].cidadeDestino + ' ' + ufDestino.value;
        clearTimeout(aguardaDigitar);
        aguardaDigitar = setInterval(function () {
            CalculaDistancia();
        }, 1000);
    }
}

//SELECIONA COTACAO
function selecionaCotacao(cotacaoSelecionada) {
    if (idCotacao != 0) {
        var restauraCor = document.getElementById(idStatus);
        restauraCor.style.background = backgroundAnterior;
        restauraCor.style.color = corAnterior;
    }
    backgroundAnterior = cotacaoSelecionada.style.background;
    corAnterior = cotacaoSelecionada.style.color;
    cotacaoSelecionada.style.background = 'yellow';
    cotacaoSelecionada.style.color = 'black';
    idCotacao = cotacaoSelecionada.name;
    idStatus = cotacaoSelecionada.id;
    statusCotacao = listaDeCotacoes[idStatus].status;
    if (statusCotacao == '1') {
        $("#btnAlterar").show(400);
        $("#btnCancelar").show(400);
        $("#btnAprovar").hide("slow");
        $("#btnVisualizar").show(400);
    } else {
        if (statusCotacao == '2') {
            $("#btnAlterar").hide("slow");
            $("#btnCancelar").show(400);
            $("#btnAprovar").show(400);
            $("#btnVisualizar").show(400);
        } else {
            $("#btnAlterar").hide("slow");
            $("#btnCancelar").hide("slow");
            $("#btnAprovar").hide("slow");
            $("#btnVisualizar").show(400);
        }
    }
}

//MUDA DE PÁGINA
function irPara(paginaSelecionada, acao) {
    window.location.href = paginaSelecionada + '?idCotacao=' + idCotacao + '&acao=' + acao;
}


//EXIBE CLIENTES
function exibeCotacao(me) {
    $("#btnIncluir").show(50);
    $("#btnAlterar").show(50);
    if (typeof me == "undefined") {
        $("#btnAlterar").hide("slow");
    } else {
        $("#btnIncluir").hide("slow");
    }
    var dialogCotacao;
    dialogCotacao = $("#dialogCotacao-form").dialog({});
    dialogCotacao.dialog("open");
}


// PEGAS AS CAIXAS DE DIGITAÇAO E CONCATENA NO CAMPO DE CONSULTA OCULTO
function juntaCidadeUf() {
    var caixaCidadeOrigem = document.getElementById('cidadeOrigem');
    var caixaUfOrigem = document.getElementById('ufOrigem');
    var caixaCidadeDestino = document.getElementById('cidadeDestino');
    var caixaUfDestino = document.getElementById('ufDestino');
    var caixaPesquisaOrigem = document.getElementById('txtOrigem');
    var caixaPesquisaDestino = document.getElementById('txtDestino');
    var cidadeOrigem = caixaCidadeOrigem.value;
    var cidadeDestino = caixaCidadeDestino.value;
    caixaPesquisaOrigem.value = cidadeOrigem.substr(7, 50) + ' ' + caixaUfOrigem.value;
    caixaPesquisaDestino.value = cidadeDestino.substr(7, 50) + ' ' + caixaUfDestino.value;
}

function CalculaDistancia() {
    clearInterval(aguardaDigitar);
    var cidadeOrigem = document.getElementById('cidadeOrigem').value;
    var cidadeDestino = document.getElementById('cidadeOrigem').value;
    var peso = document.getElementById('pesoCotacao').value;
    var valor = document.getElementById('valor').value;
    if (cidadeOrigem != "" && cidadeDestino != "" && peso != "" && valor != "") {
        $('#litResultado').html('Aguarde...');
        // Instancia o DistanceMatrixService.
        var service = new google.maps.DistanceMatrixService();
        // Executa o DistanceMatrixService.
        service.getDistanceMatrix({
            origins: [$("#txtOrigem").val()], // Origem
            destinations: [$("#txtDestino").val()], // Destino
            travelMode: google.maps.TravelMode.DRIVING, // Modo (DRIVING | WALKING | BICYCLING)
            unitSystem: google.maps.UnitSystem.METRIC // Sistema de medida (METRIC | IMPERIAL)
        }, callback); // Vai chamar o callback
    }
}

// Tratar o retorno do DistanceMatrixService
function callback(response, status) {
    // Verificar o status.
    if (status != google.maps.DistanceMatrixStatus.OK) { // Se o status não for "OK".
        $("#litResultado").html(status);
    } else { // Se o status for "OK".
        $("#litResultado").html("&nbsp;"); // Remove o "aguarde".

        //PEGA O VALOR DO KM TOTAL E RETIRA OS STRINGS
        var pegaDistancia = response.rows[0].elements[0].distance.text;
        // Popula os campos.
        $("#txtDistancia").val(pegaDistancia);

        var distanciaSemKm = pegaDistancia.substr(0, (pegaDistancia.length - 3)); //PEGA  APENAS OS NUMNEROS
        var valorMySql = distanciaSemKm.replace(".", ""); // TIRA OS PONTOS DE MILHAR
        pegaDistancia = valorMySql.replace(",", ".");	  // VIRGULA DE CASA DECIMAL VIRA PONTO (PADRÃO AMERICANO)


        // CALCULO EM REAL, NECESSITAREMOS DE UMA TABELA PRA CASO O CLIENTE QUEIRA ALTERAR
        var fretePelaDistancia = pegaDistancia * (0.9);// ME FALARAM QUE O PREÇO POR KM É 0,90;

        //CALCULO DO SEGURO DA CARGA QUE É AVALIADO DE ACORDO COM O VALOR TOTAL DA MERCADORIA
        var caixaValorMercadoria = document.getElementById('valor');
        var valorMercadoria = caixaValorMercadoria.value;
        var valorMySql = valorMercadoria.replace(".", ""); // TIRA OS PONTOS DE MILHAR
        valorMercadoria = valorMySql.replace(",", ".");


        var valorSeguro = (valorMercadoria * 0.5) / 100; //VALOR DO SEGURO É IGUAL A 0.5% DO VALOR DA MERCADORIA;


        // AGORA PEGA O PESO E FRACIONA DE ACORDO COM O TAMANHO DO CAMINHAO
        var caixaPesoMercadoria = document.getElementById('pesoCotacao');
        var pesoMercadoria = caixaPesoMercadoria.value;
        var valorMySql = pesoMercadoria.replace(".", ""); // TIRA OS PONTOS DE MILHAR
        pesoMercadoria = valorMySql.replace(",", ".");

        var capacidadeCaminhao = 0;
        //COMPARA O TAMANHO DO CARRO
        if (pesoMercadoria < 3000) { // peso máximo de ULTILITARIO
            capacidadeCaminhao = 3000;
        } else {
            if (pesoMercadoria < 6000) { // peso máximo de TOCO
                capacidadeCaminhao = 6000;
            } else {
                if (pesoMercadoria < 14000) { // peso máximo de TRUCK
                    capacidadeCaminhao = 14000;
                } else {
                    if (pesoMercadoria < 33000) { // peso máximo de CAVALO MECANICO
                        capacidadeCaminhao = 33000;
                    }
                }
            }
        }

        //EXPECIFICA UM PERCENTUAL BASEADO NO TAMANHO DO CAMINHÃO E O PESO DA CARGA
        var percentualCobrado = pesoMercadoria / capacidadeCaminhao * 100;

        //CALCULA O PERCENTUAL REFERENTE AO  ESPAÇO NO CAMINHAO
        var valorFrete = (fretePelaDistancia * percentualCobrado) / 100; //PRONTO! FRETE CALCULADO!

        //TAXA MINIMA SEMPRE SOMADA PARA DISTANCIAS MUITO CURTAS EX: RECIFE(AEROPORTO) / RECIFE(AFOGADOS)
        var freteMinimo = 30;  //OUTRO VALOR A SER COLOCADO NO BANCO PRA A TRANSPORTADORA ALTERAR SE QUISER

        //SOMA OS VALORES
        var valorFinalFrete = valorFrete + freteMinimo + valorSeguro;


        valorFinalFrete = moeda(valorFinalFrete, 2, ',', '.');


        var tempo = response.rows[0].elements[0].duration.text;
        tempo = tempo.replace("day", "dia").replace("hour", "hora").replace("min", "minuto");
        var escreveTempo = "";
        var diaFinal = "";
        var horaFinal = 0;
        var ponteiroFinal = 0;
        var menosDeUmaHora = true;
        if (tempo.match(/dia/)) {
            menosDeUmaHora = false;
            for (var i = 0; i < tempo.length; i++) {
                if (tempo[i] == " ") {
                    for (var y = i; y < tempo.length; y++) {
                        if (tempo.match(/hora/)) {
                            if (tempo[y] > 0) {
                                if (tempo[y] == " ") {
                                    break;
                                } else {
                                    horaFinal = horaFinal + tempo[y];
                                }
                            }
                        }
                    }
                    diaFinal = (parseInt(diaFinal) * 6) + parseInt(Math.ceil(horaFinal / 4));
                    break;
                } else {
                    diaFinal = diaFinal + tempo[i];
                }
            }
        } else {
            if (tempo.match(/hora/)) {
                menosDeUmaHora = false;
                for (var i = ponteiroFinal; i < tempo.length; i++) {
                    if (tempo[i] == " ") {
                        break;
                    } else {
                        horaFinal = horaFinal + tempo[i];
                    }
                }
                diaFinal = diaFinal + (Math.ceil(horaFinal / 4));
            }
        }
        if (menosDeUmaHora) {
            diaFinal = 1;
        }

        //JOGA O VALOR NA CAIXA DE TEXTO
        var acao = document.getElementById('acao').value;
        if (acao == 'alterar' || acao == 'incluir') {
            $("#valorFrete").val('R$:' + valorFinalFrete);
            $("#txtTempo").val(diaFinal + ' Dia(s)');
        }
        //Atualizar o mapa.
        $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
        $("#totalGeral").show(400);
        $("#mapaGoogle").show(400);
    }
}
