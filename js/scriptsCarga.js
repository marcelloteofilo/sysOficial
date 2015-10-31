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
    var cidadeDestino = document.getElementById('cidadeDestino').value;
    var peso = document.getElementById('peso').value;
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
    } 
    else { // Se o status for "OK".
        $("#litResultado").html("&nbsp;"); // Remove o "aguarde".

        //PEGA O VALOR DO KM TOTAL E RETIRA OS STRINGS
        var pegaDistancia = response.rows[0].elements[0].distance.text;
        // Popula os campos.
        $("#distancia").val(pegaDistancia);

        var distanciaSemKm = pegaDistancia.substr(0, (pegaDistancia.length - 3)); //PEGA  APENAS OS NUMNEROS
        var valorMySql = distanciaSemKm.replace(".", ""); // TIRA OS PONTOS DE MILHAR
        pegaDistancia = valorMySql.replace(",", ".");	  // VIRGULA DE CASA DECIMAL VIRA PONTO (PADRÃO AMERICANO)


        // CALCULO EM REAL, NECESSITAREMOS DE UMA TABELA PRA CASO O CLIENTE QUEIRA ALTERAR
        var fretePelaDistancia = pegaDistancia * (0.9);// ME FALARAM QUE O PREÇO POR KM É 0,90;
        //$("#frete").val(fretePelaDistancia);

        //CALCULO DO SEGURO DA CARGA QUE É AVALIADO DE ACORDO COM O VALOR TOTAL DA MERCADORIA
        var caixaValorMercadoria = document.getElementById('valor');
        var valorMercadoria = caixaValorMercadoria.value;
        var valorMySql = valorMercadoria.replace(".", ""); // TIRA OS PONTOS DE MILHAR
        valorMercadoria = valorMySql.replace(",", ".");


        var valorSeguro = (valorMercadoria * 0.5) / 100; //VALOR DO SEGURO É IGUAL A 0.5% DO VALOR DA MERCADORIA;


        // AGORA PEGA O PESO E FRACIONA DE ACORDO COM O TAMANHO DO CAMINHAO
        var caixaPesoMercadoria = document.getElementById('peso');
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
        $("#frete").val(valorFinalFrete);

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

        $("#prazo").val(diaFinal + ' Dia(s)');

        //JOGA O VALOR NA CAIXA DE TEXTO
        /*var acao = document.getElementById('acao').value;
        if (acao == 'alterar' || acao == 'incluir') {
            $("#valorFrete").val('R$:' + valorFinalFrete);
            $("#txtTempo").val(diaFinal + ' Dia(s)');
        }*/
        //Atualizar o mapa.
        $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
        $("#totalGeral").show(400);
        $("#mapaGoogle").show(400);
    }
}