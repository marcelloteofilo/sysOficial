<!DOCTYPE html>
<html lang="en" class="no-js">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>SysTransportes</title>
      <meta name="description" content="Blue One Page Creative HTML5 Template">
      <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
      <meta name="author" content="Muhammad Morshed">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
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
      <link rel="stylesheet" href="../../css/usuario.css">
      
      <script src="../../js/modernizr-2.6.2.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.js"> </script>      
      <script type="text/javascript" src="../../js/jquery-ui.js"></script>
      <script type="text/javascript" src="../../js/scriptsUsuarios.js"></script>
      <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
      <script type="text/javascript" src="../../js/validacaoCampo.js"></script> 
	  
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
         var wow = new WOW ({
             boxClass:     'wow',      // animated element css class (default is wow)
             animateClass: 'animated', // animation css class (default is animated)
             offset:       120,          // distance to the element when triggering the animation (default is 0)
             mobile:       false,       // trigger animations on mobile devices (default is true)
             live:         true        // act on asynchronously loaded content (default is true)
           }
         );
         wow.init();
      </script> 

	  
   </head>
   <body id="body" onload="validaPerfilUsuario()">
      <!-- preloader -->

      <!-- end preloader -->

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
                  <li><a href="#">Cotação Online</a></li>
                  <li><a href="../contato.php#contato">Contato</a></li>
                  <li><a href="login.php#login">Registre-se</a></li>
               </ul>
            </nav>
            <!-- /main nav -->
         </div>
      </header>
      <!-- End Fixed Navigation -->
	  
      <!-- End Home SliderEnd -->
	  
      <!-- Features -->
      <section id="cadastro" class="features">
         <div class="container">
            <div class="row">
               <div class="navbar-wrapper">
                  <nav class="navbar">
                     
                     <div class="container">
                        <form>
                           <table>
                              <!--Dados Pessoais -->
                              <h2>Dados Cadastrais</h2><br>
                              <tr>
                              <td><b>Nome Completo</b></td>
                              <td><b>CPF</b></td>
                              <td><b>RG</b></td>
                              <td><b>Orgão Expedidor</b></td>
                              </tr>
                              <tr>                           
                              <td><input type="text" style="text-transform:uppercase" id="nomeCompleto" name="" size="40" class="form-control" placeholder="Nome Completo" tabindex="1" type="text" onkeyup="validar(this,'text');"></td>
                              <td><input type="text" id="cpf" name="" size="40" class="form-control" maxlength="14" placeholder="CPF" tabindex="1" type="text" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"></td>
                              <td><input type="text" id="rg" name="" size="40" class="form-control" maxlength="9" placeholder="RG" tabindex="1" type="text" onkeypress="javascript: mascara(this, Rg);"></td>
                              <td><input type="text" id="orgaoExpedidor" style="text-transform:uppercase" name="" size="40" maxlength="8" class="form-control" placeholder="Orgão Expedidor" tabindex="1" type="text" onkeyup="validar(this,'text');"></td>
                              </tr>
							         <tr>
                              <td><b>Razão Social</b></td>
                              <td><b>Nome Fantasia</b></td>
                              <td><b>CNPJ</b></td>
                              <td><b>Tipo de Empresa</b></td>
                              </tr>

                              <tr>                           
                              <td><input type="text" id="razaoSocial"maxlength="40" style="text-transform:uppercase"onkeyup="validar(this,'text');"name="" size="40" class="form-control" placeholder="Razão Social" tabindex="1" type="text"></td>
                              <td><input type="text" id="nomeFantasia" maxlength="40"style="text-transform:uppercase"onkeyup="validar(this,'text');"name="" size="40" class="form-control" placeholder="Nome Fantasia" tabindex="1" type="text"></td>
                              <td><input type="text" id="cnpj" onkeyup="formataCampo(this, event)"maxlength="14"name="" size="40"class="form-control"placeholder="CNPJ" tabindex="1" type="text" ></td>
                              <td><select class="form-control" id="tipoEmpresa" name="">
                              <option value=""> --- Selecione o tipo --- </option>
                              <option value="Empresa Privada">Empresa Privada</option>
                              <option value="Empresa Publica">Empresa Publica</option>
                              </select></td>
                              </tr>
                              <tr>
                              <td><b>Tipo de Perfil</b></td>
                           </tr>
                              <td><select class="form-control" id="idPerfil" name="idPerfil" onClick="validaPerfilUsuario()">
                              <option value="Pessoa Fisica">Pessoa Física</option>
                              <option value="Pessoa Juridica">Pessoa Jurídica</option>
                              </select></td>

                           </table><br>

                           <table>
                              <!--Endereço -->
                              <h2>Endereço</h2><br>
                              <tr>
                              <td><b>CEP</b></td>
                              <td><b>Logradouro</b></td>
                              <td><b>Número</b></td>
                              <td><b>Bairro</b></td>
                              </tr>
                              <tr>
                              <td><input required="required" type="text" id="cep" name="" size="40" class="form-control"maxlength="9"placeholder="CEP" tabindex="1"type="text" onkeypress="mascaraCep(this, '#####-###')" onkeyup="validar(this,'num');"></td>
                              <td><input required="required" type="text" id="logradouro" name="" size="40" class="form-control" placeholder="Logradouro" tabindex="1" type="text"style="text-transform:uppercase"></td>
                              <td><input required="required" type="text" id="numero" name="" size="40" maxlength="5"class="form-control"placeholder="Número" tabindex="1"type="text"onkeyup="validar(this,'num');"></td>
                              <td><input required="required" type="text" id="bairro" name="" style="text-transform:uppercase" size="40" class="form-control"placeholder="Bairro" tabindex="1" type="text"onkeyup="validar(this,'text');"></td>
                              </tr>

                              <tr>
                              <td><b>Complemento</b></td>
                              <td><b>Estado</b></td>
                              <td><b>Cidade</b></td>
                              </tr>
                              <tr>
                              <td><input type="text"id="complemento" name="" size="40" style="text-transform:uppercase"class="form-control"placeholder="Complemento"tabindex="1" type="text"></td>
                              <td>
                                    <select required="required" tabindex="3" class="form-control" id="estado" name="estado" >
                                       <option value="">Escolha o seu Estado</option>
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
                              <td><input required="required" type="text"id="cidade" name="cidade" size="40" style="text-transform:uppercase"class="form-control"placeholder="Cidade"tabindex="1"></td>
                              </tr>
                           </table><br>

                           <table>
                              <!--Contato -->
                              <h2>Contato</h2><br>
                              <tr>
                              <td><b>E-mail</b></td>
                              <td><b>Telefne Residencial</b></td>
                              <td><b>Telefone Celular</b></td>
                              </tr>
                              <tr>
                                 <td><input required="required" type="email" id="email" name="email" style="text-transform:uppercase"size="40" class="form-control" placeholder="E-mail@domínio.com" tabindex="1" type="email"></td>
                                 <td><input required="required" type="text" id="telefone1" name="telefone1" maxlength="15"size="40" maxlength="12"class="form-control" placeholder="(00)0000-0000" tabindex="1" type="text"onkeyup="validar(this,'num');"onkeypress="telefoneMascara(this)"onkeypress="mascara(this, '## ####-####')"></td>
                                 <td><input required="required" type="text" id="telefone2" name="telefone2" size="40" maxlength="14"class="form-control"placeholder="(00)0000-0000"tabindex="1" type="text"onkeyup="validar(this,'num');"onkeypress="telefoneMascara(this)"onkeypress="mascara(this, '## ####-####')"></td>
                              </tr>
                           </table><br>

                           <table>
                              <!--Login/Senha -->
                              <h2>Login/Senha</h2><br>

                              <tr>
                              <td><b>Usuário</b></td>
                              <td><b>Senha</b></td>
                              <td><b>Confirmar Senha</b></td>
                              </tr>
                              <tr>
                              <td>
                              <div class="form-group"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                              <input required="required" type="text" id="login" name="" size="40" class="form-control" placeholder="Usuário" tabindex="1" type="text">
                              </div></div>
                              </td>
                              
                              <td>
                                 <div class="form-group"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                                 <input required="required" type="password" size="40" class="form-control" id="senha"placeholder="Senha" tabindex="1" type="text">
                                 </div></div>
                              </td>
                              <td>
                                 <div class="form-group"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-saved"></i></span> 
                                 <input required="required" type="password" id="confirmaSenha" name="" size="40" class="form-control" placeholder="Confirme  sua senha" tabindex="1" type="text"onChange="verificacaoSenha()">
                                 </div></div>
                              </td>
                              </tr>
                           </table>
                           <br>
                           <input href="../../index.php" class="btn btn-success btn-login-submit" value="Confirmar" type="submit" id="btnIncluir" onClick="validaCadastroBotao()">
                           <input class="btn btn-success btn-login-submit" value="Limpar" type="reset" id="btnLimpar">

                        </form>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>