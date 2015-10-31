<?php
session_start();
extract($_REQUEST);
?>
<?php
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('');
    $logado = 'Visitante';
} else {
    $logado = $_SESSION['login'];
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>SysTransportes</title>
      <meta name="description" content="Blue One Page Creative HTML5 Template">
      <!-- <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
         <meta name="author" content="Muhammad Morshed"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <!-- CSS
         <!-- Fontawesome Icon font -->
      <link rel="stylesheet" href="../../css/font-awesome.min.css">
      <!-- Twitter Bootstrap css -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- jquery.fancybox  -->
      <link rel="stylesheet" href="../../css/jquery.fancybox.css">
      <!-- animate -->
      <link rel="stylesheet" href="../../css/animate.css">
      <!-- Main Stylesheet -->
      <link rel="stylesheet" href="../../css/main.css">
      <!-- media-queries -->
      <link rel="stylesheet" href="../../css/media-queries.css">
      <!-- Modernizer Script for old Browsers -->
      <script src="../../js/modernizr-2.6.2.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.js"></script>
      <script type="text/javascript" src="../../js/jquery-ui.js"></script>
      <script type="text/javascript" src="../../js/validacaoCampo.js"></script> 
      <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
      <script type="text/javascript" src="../../js/scriptsMercadoria.js"></script>
      <script type="text/javascript" src="../../js/scriptsCarga.js"></script>
      <script type="text/javascript" src="../../js/tabelaDinamica.js"></script>
      <!-- Essential jQuery Plugins -->
      <!-- Main jQuery -->
      <script src="../../js/jquery-1.11.1.min.js"></script>
      <!-- Single Page Nav -->
      <script src="../../js/jquery.singlePageNav.min.js"></script>
      <!-- Twitter Bootstrap -->
      <script src="../../js/bootstrap.min.js"></script>
      <!-- jquery.fancybox.pack -->
      <script src="../../js/jquery.fancybox.pack.js"></script>
      <!-- jquery.mixitup.min -->
      <script src="../../js/jquery.mixitup.min.js"></script>
      <!-- jquery.parallax -->
      <script src="../../js/jquery.parallax-1.1.3.js"></script>
      <!-- jquery.countTo -->
      <script src="../../js/jquery-countTo.js"></script>
      <!-- jquery.appear -->
      <script src="../../js/jquery.appear.js"></script>
      <!-- jquery easing -->
      <script src="../../js/jquery.easing.min.js"></script>
      <!-- jquery easing -->
      <script src="../../js/wow.min.js"></script>
      <!-- Custom Functions -->
      <script src="../../js/custom.js"></script>
      <script>
         var wow = new WOW({
             boxClass: 'wow', // animated element css class (default is wow)
             animateClass: 'animated', // animation css class (default is animated)
             offset: 120, // distance to the element when triggering the animation (default is 0)
             mobile: false, // trigger animations on mobile devices (default is true)
             live: true        // act on asynchronously loaded content (default is true)
         }
         );
         wow.init();
      </script>
	  

	  
   </head>
   <body>
      <!-- preloader -->
      <!-- end preloader -->
      <!--
         Fixed Navigation
         ==================================== -->
      <header class="navbar-fixed-top navbar" style="background:#0EB493;">
         <div class="container">
            <div class="navbar-header">
               <!-- responsive nav button -->
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <i class="fa fa-bars fa-2x"></i>
               </button>
               <!-- /responsive nav button -->
               <!-- logo -->
               <a class="navbar-brand" href="#body">
                  <h1 id="logo">
                     <img src="../../img/logo.png" alt="Brandi">
                  </h1>
               </a>
               <!-- /logo -->
            </div>
            <!-- main nav -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
               <ul  class="nav navbar-nav">
                  <li class="current"><a href="../../index.php">Início</a></li>
				  <li><a href="../empresa.php#empresa">Empresa</a></li>
                  <li><a href="../atuacao.php#atuacao">Atuação</a></li>
                  <li><a href="../contato.php#contato">Contato</a></li>
               </ul>
            </nav>
            <!-- /main nav -->
         </div>
      </header>
      <!--
         End Fixed Navigation
         ==================================== -->
      <!--
         Features
         ==================================== -->
      <section id="viewConsulta" class="features" >
         <div class="container">
            <div class="row">
               <div class="navbar-wrapper">
                  <nav class="navbar">
                     <center>
                        <h1>Consulta Cotação Online</h1>
                        <sup></sup>Faça uma cotação online na SysTransportes!
                        <br><br>
                     </center>
                     <div class="container">
                        <form  method="post" id="frmCotacao" name="frmCotacao" action="cargaWebService.php?editSave=incluir">
                           <table>
                              <!--Dados Pessoais -->
                              <h2>Plano de Viagem</h2>
                              <tr>
                                 <td><b>Estado de Origem</b></td>
                                 <td><b>Estado de Destino</b></td>
                              </tr>
                              <tr>
                                 <td>
                                    <select tabindex="1" class="form-control" id="ufOrigem" onChange="consultaCidades('cidadeOrigem', 'ufOrigem', '0', 'Escolha a Cidade!')">
                                       <option value="">Escolha Estado Origem</option>
                                       <option value="PE">PE</option>
                                       <option value="AC">AC</option>
                                       <option value="AL">AL</option>
                                       <option value="AM">AM</option>
                                       <option value="AP">AP</option>
                                       <option value="BA">BA</option>
                                       <option value="CE">CE</option>
                                       <option value="DF">DF</option>
                                       <option value="ES">ES</option>
                                       <option value="GO">GO</option>
                                       <option value="MA">MA</option>
                                       <option value="MG">MG</option>
                                       <option value="MS">MS</option>
                                       <option value="MT">MT</option>
                                       <option value="PA">PA</option>
                                       <option value="PB">PB</option>
                                       <option value="PI">PI</option>
                                       <option value="PR">PR</option>
                                       <option value="RJ">RJ</option>
                                       <option value="RN">RN</option>
                                       <option value="RO">RO</option>
                                       <option value="RR">RR</option>
                                       <option value="RS">RS</option>
                                       <option value="SC">SC</option>
                                       <option value="SE">SE</option>
                                       <option value="SP">SP</option>
                                       <option value="TO">TO</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select tabindex="1" class="form-control" id="ufDestino" onChange="consultaCidades('cidadeDestino', 'ufDestino', '0', 'Escolha a Cidade!')">
                                       <option value="">Escolha Estado Destino</option>
                                       <option value="PE">PE</option>
                                       <option value="AC">AC</option>
                                       <option value="AL">AL</option>
                                       <option value="AM">AM</option>
                                       <option value="AP">AP</option>
                                       <option value="BA">BA</option>
                                       <option value="CE">CE</option>
                                       <option value="DF">DF</option>
                                       <option value="ES">ES</option>
                                       <option value="GO">GO</option>
                                       <option value="MA">MA</option>
                                       <option value="MG">MG</option>
                                       <option value="MS">MS</option>
                                       <option value="MT">MT</option>
                                       <option value="PA">PA</option>
                                       <option value="PB">PB</option>
                                       <option value="PI">PI</option>
                                       <option value="PR">PR</option>
                                       <option value="RJ">RJ</option>
                                       <option value="RN">RN</option>
                                       <option value="RO">RO</option>
                                       <option value="RR">RR</option>
                                       <option value="RS">RS</option>
                                       <option value="SC">SC</option>
                                       <option value="SE">SE</option>
                                       <option value="SP">SP</option>
                                       <option value="TO">TO</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <td><b>Cidade de Origem</b></td>
                                 <td><b>Cidade de Destino</b></td>
                              </tr>
                              <tr>
                                 <td>
                                    <select class="form-control" id="cidadeOrigem" name="cidadeOrigem"  onChange="juntaCidadeUf(); CalculaDistancia();">
                                       <option  value="">Escolha Cidade Origem</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select class="form-control" id="cidadeDestino" name="cidadeDestino"  onChange="juntaCidadeUf(); CalculaDistancia();">
                                       <option  value="">Escolha Cidade Destino</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                           <br>
                           <table width="100%">
                              <!--Dados Pessoais -->
                              <h2>Dados da Coleta</h2>
                              <tr>
                                 <td><b>Telefone</b></td>
                                 <td><b>Logradouro</b></td>
                                 <td><b>Bairro</b></td>
                                 <td><b>Número</b></td>
                                 <td><b>Estado</b></td>
                                 <td><b>Cidade</b></td>
                              </tr>
                              <tr>
                                 <td><input type="text" id="telefone" name="telefone" class="form-control" placeholder="(00)0000-0000" tabindex="1"  ></td>
                                 <td><input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" tabindex="1"  ></td>
                                 <td><input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" tabindex="1"  ></td>
                                 <td><input type="text" id="numero" name="numero" class="form-control" placeholder="Número" tabindex="1"  ></td>
                                 <td>
                                    <select tabindex="1" class="form-control" id="estado" name="estado">
                                       <option value="">Escolha Estado</option>
                                       <option value="PE">PE</option>
                                       <option value="AC">AC</option>
                                       <option value="AL">AL</option>
                                       <option value="AM">AM</option>
                                       <option value="AP">AP</option>
                                       <option value="BA">BA</option>
                                       <option value="CE">CE</option>
                                       <option value="DF">DF</option>
                                       <option value="ES">ES</option>
                                       <option value="GO">GO</option>
                                       <option value="MA">MA</option>
                                       <option value="MG">MG</option>
                                       <option value="MS">MS</option>
                                       <option value="MT">MT</option>
                                       <option value="PA">PA</option>
                                       <option value="PB">PB</option>
                                       <option value="PI">PI</option>
                                       <option value="PR">PR</option>
                                       <option value="RJ">RJ</option>
                                       <option value="RN">RN</option>
                                       <option value="RO">RO</option>
                                       <option value="RR">RR</option>
                                       <option value="RS">RS</option>
                                       <option value="SC">SC</option>
                                       <option value="SE">SE</option>
                                       <option value="SP">SP</option>
                                       <option value="TO">TO</option>
                                    </select>
                                 </td>
                                 <td><input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" tabindex="1"></td>
                              </tr>
                           </table>
                           <table width="100%">
                              <tr>
                                 <td><b>Observação</b></td>
                              </tr>
                              <tr>
                                 <td><textarea class="form-control"name="observacao"  id="observacao" cols="80" rows="3" ></textarea></td>
                              </tr>
                           </table>
                           <br>
                           <table>
                           <!--Contato -->
                           <h2>Mercadorias</h2>
                           <div id="mensagens"></div>
                           <table width="100%" id="tabelaItens">
                              <thead>
                                 <tr>
                                    <td><b>Item</b></td>
                                    <td><b>Descrição</b></td>
                                    <td><b>Quantidade</b></td>
                                    <td><b>Peso</b></td>
                                    <td><b>Valor</b></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td><input class="form-control"type="text" name="item[]" id="item" value="1" size="4" readonly="readonly"/></td>
                                    <td><input class="form-control"type="text" name="descricao[]" id="descricao" value="" size="90" placeholder="Descrição sobre a mercadoria" maxlength="50" /></td>
                                    <td><input class="form-control"type="text" name="quantidadeMercadoria[]" id="quantidadeMercadoria" value="" size="10" placeholder="0,00" maxlength="8" /></td>
                                    <td><input class="form-control"type="text" name="pesoMercadoria[]" id="pesoMercadoria" value="" size="4" placeholder="0,00" maxlength="8" /></td>
                                    <td><input class="form-control"	type="text" name="valorMercadoria[]" id="valorMercadoria" value="" size="4" placeholder="0,00" maxlength="8" /></td>
                                    <td>&nbsp;</td>
                                 </tr>
                              </tbody>
                           </table>
                           <p><a href="#" class="add" style="color: black"><img src="../../img/plus.png" border="0" /></a><b>Adicionar nova mercadoria</b></p>
                           <br>
                           <table width="100%">
                              <h2>Dados da Carga</h2>
                              <tr>
                                 <td><b>Altura</b></td>
                                 <td><b>Largura</b></td>
                                 <td><b>Peso</b></td>
                                 <td><b>Comprimento</b></td>
                                 <td><b>Qtd.Volumes</b></td>
                                 <td><b>Valor/R$</b></td>
                              </tr>
                              <tr>
                                 <td><input type="text" id="altura" name="altura" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input type="text" id="largura" name="largura" class="form-control" maxlength="14" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input type="text" id="peso" name="peso" class="form-control" maxlength="9" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input type="text" id="comprimento" name="comprimento" maxlength="8" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input type="text" id="quantidade" name="quantidade" class="form-control" maxlength="9" placeholder="0,00" tabindex="1" onKeyPress="return(mascaraInteiro())"></td>
                                 <td><input type="text" id="valor" name="valor" maxlength="8" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"  onBlur="focus_Blur(this, 'white'); CalculaDistancia();"></td>
                              </tr>
                              <td><b>Natureza da Carga</b></td>
                              <tr>
                              </tr>
                              <tr>
                                 <td>
                                    <select class="form-control" id="naturezaCarga" name="naturezaCarga">
                                       <option value=""> --- Escolha o Tipo --- </option>
                                       <option value="Tipo 1">Tipo 1</option>
                                       <option value="Tipo 2">Tipo 2</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                           <br>
                           <table width="100%">
                              <h2>Dados Finais</h2>
                              <tr>
                                 <td><b>Distancia</b></td>
                                 <td><b>Valor Aproximado</b></td>
                                 <td><b>Temdo de Entrega</b></td>
                                 <td><b>Data do Pedido</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly type="text" id="distancia" name="distancia" class="form-control" placeholder="Distancia" tabindex="1"  ></td>
                                 <td><input readonly type="text" id="frete" name="frete" class="form-control" maxlength="14" placeholder="0,00" tabindex="1"></td>
                                 <td><input readonly type="text" id="prazo" name="prazo" class="form-control" maxlength="14" placeholder="0 Dia(as)" tabindex="1"></td>
                                 <td><input readonly type="text" id="dataPedido" name="dataPedido" maxlength="8" class="form-control" placeholder="00/00/0000" tabindex="1"></td>
                           </table>

                           <table>
                              <div><span id="litResultado">&nbsp;</span></div>
                              <div  id="mapaGoogle"  style="padding: 0px 0 0; clear: both">
                                 <iframe width="100%" scrolling="no" height="300" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=S&atilde;o Paulo&daddr=Rio de Janeiro&output=embed"></iframe>
                              </div>
                              <input name="pesquisaOrigem" type="hidden" id="txtOrigem" class="field" value="S&atilde;o Paulo" />
                              <input name="pesquisaDestino" type="hidden" id="txtDestino" class="field" value="Rio de Janeiro" />
                           </table><br>

                           <input class="btn btn-success btn-login-submit" value="Criar Cotação" type="submit" id="btnCriarCota">
                           <input class="btn btn-danger" value="Limpar" type="reset" id="btnLimpar">
                        </form>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>

