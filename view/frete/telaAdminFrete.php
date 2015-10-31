  

<?php
   session_start();
   if (!isset($_SESSION['login']) == true and ! isset($_SESSION['senha']) == true) {
       session_destroy();
       unset($_SESSION['login']);
       unset($_SESSION['senha']);
       header('location: ../usuario/login.php#login');
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
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">
      <!-- CSS CRUD -->
      <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
      <link rel="stylesheet" type="text/css" href="../../css/icon.css">
      <link rel="stylesheet" type="text/css" href="../../css/demo.css">
      <link rel="stylesheet" type="text/css" href="../../css/usuario.css">
      <!-- JS CRUD -->
      <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
      <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
      <script type="text/javascript" src="../../js/validacaoCampo.js"></script>
      <script type="text/javascript" src="../../js/validacoes.js"></script>
      <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
      <!--<script type="text/javascript" src="../../js/scriptPesquisa.js"></script>-->
      <script type="text/javascript" src="../../js/scriptsBuscas.js"></script>
      <!-- JS CRUD -->
      <!-- SCRIPT ADMIN -->
      <script type="text/javascript">
         var url;
         function newUser(){
           $('#dlg').dialog('open').dialog('setTitle','Novo Frete');
           $('#fm').form('clear');
           url = '../../webServices/freteWebService.php?editSave=incluirFrete';
         }
         function editUser(){
           var row = $('#dg').datagrid('getSelected');
           if (row){
             $('#dlg').dialog('open').dialog('setTitle','Editar Frete');
             $('#fm').form('load',row);
             url = '../../webServices/freteWebService.php?editSave=alterarFrete&codFrete='+row.codFrete;
           }
         else
         {
           $.messager.show(
               {
                   title: 'Erro!',
                   msg: 'Selecione item da tabela!!!'//result.msg
               });
         }
         }
         function saveUser(){
           $('#fm').form('submit',{
             url: url,
               onSubmit: function(){
               return $(this).form('validate');
             },
             success: function(result){
                 $('#dlg').dialog('close');    // close the dialog
                 $('#dg').datagrid('reload');  // reload the user data
         
             }
           });
         }
         function removeUser(){
           var row = $('#dg').datagrid('getSelected');
           if (row){
             $.messager.confirm('Confirm','Tem certeza que deseja remover o Veículo?',function(r){
               $('#dg').datagrid('reload');
         
               if (r){
                 $.post('../../webServices/veiculoWebService.php?editSave=deletarVeiculo',{id:row.id},function(result){
                   /*if (result.success){
                     
                     $('#dg').datagrid('reload');  // reload the user data
                   } else {
                     $.messager.show({ // show error message
                       title: 'Error',
                       msg: result.msg
                     });
                   }*/
                 },'json');
               }
             });
           }
         else
         {
           $.messager.show(
               {
                   title: 'Erro!',
                   msg: 'Selecione item da tabela!!!'//result.msg
               });
         }
         }
         
      </script>
      <!-- FIM SCRIPT ADMIN -->
      <header class="navbar-fixed-top navbar" style="background:#0EB493;">
         <div class="container">
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
               <ul  class="nav navbar-nav">
                  <li class="current"><a href="../telaAdminSystem.php">Início Admin</a></li>
                  <li><a href="#"><?php echo "Usuario: ".$logado;?></a></li>
               </ul>
            </nav>
            <div class="navbar-header">
               <a  class="navbar-brand" href="#">SysTransportes</a>     
            </div>
         </div>
      </header>
      <br><br>
   </head>
   <body style="background:#F3F8F7" onload="consultaVeiculo(); consultaMotorista();">
      <!-- TABELA ADMIN PESSOA FÍSICA-->
      <center>
         <table id="dg" title="Cadastro de Frete" class="easyui-datagrid" style=" width:1250px;height:495px"
            url="../../webServices/freteWebService.php?editSave=carregarTodos"
            toolbar="#toolbar" pagination="true" 
            rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
               <tr>
                  <th field="nomeMotorista" width="46">Motorista</th>
                  <th field="placaVeiculo" width="64">Veiculo</th>
                  <th field="cidadeOrigem" width="70">Origem</th>
                  <th field="cidadeDestino" width="50">Destino</th>
                  <th field="statusFrete" width="72">Status</th>
                  <th field="codTransp" width="70">Codigo de Trans.</th>
               </tr>
            </thead>
         </table>
         <div id="toolbar">
            <a href="#" class="easyui-linkbutton" iconCls="icon-invoice-icon" plain="true" onclick="newUser()" title="Adicionar Frete">Novo Frete</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="editUser()" title="Alterar Dados do Frete">Editar Frete</a>
            <!--<label for="pesquisar">Localizar Veículos</label>
               &nbsp;&nbsp;
               <input type="text" id="pesquisar" name="pesquisar" size="30" />-->      
         </div>
         </div>
      </center>
      <!-- FIM TABELA ADMIN PESSOA FÍSICA -->
      <!-- DIALOG ADMIN PESSOA FÍSICA -->
      <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:250px;padding:10px 20px"
         closed="true" buttons="#dlg-buttons">
         <div class="ftitle"></div>
         <form id="fm" method="post" novalidate>
            <table>
               <!--Dados Pessoais -->
               <h2>Dados do Frete</h2>
               <!--Dados Pessoa Física -->
               <tr>
                  <td><b>Estado Origem</b></td>
                  <td><b>Estado Destino</b></td>
                  <td><b>Motorista</b></td>
                  <td><b>Veiculo</b></td>
               </tr>
               <tr>
                  <td>
                     <select required="required"  tabindex="1" class="form-control" id="ufOrigem" name="ufOrigem">
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
                     <select required="required"  tabindex="1" class="form-control" id="ufDestino" name="ufDestino">
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
                 <td>
                     <select required="required"  class="form-control" id="codMotorista" name="codMotorista">
                        <option value="">Escolha o Motorista</option>
                     </select>
                  </td>
                  <td>
                     <select required="required"  class="form-control" id="codVeiculo" name="codVeiculo" >
                        <option value="">Escolha o Veículo</option>
                     </select>
                  </td>
               </tr>
               <!--Dados Pessoa Jurídica -->
               <tr>
                  <td><b>Cidade Origem</b></td>
                  <td><b>Cidade Destino</b></td>
                  <td><b>Status Frete</b></td>
                  <td><b>Código Transporte</b></td>
               </tr>
               <tr>
                   <td><input required="required" class="form-control" type="text" id="cidadeOrigem" name="cidadeOrigem" size="23" style="text-transform:uppercase"  placeholder="Cidade Origem" maxlength="10" onkeyup="validar(this,'text');"></td>
                   <td><input required="required" class="form-control" type="text" id="cidadeDestino" name="cidadeDestino" size="23" style="text-transform:uppercase"  placeholder="Cidade Destino" maxlength="10" onkeyup="validar(this,'text');"></td>
                  <td>
                     <select required="required" class="form-control" id="statusFrete" name="statusFrete">
                        <option value=""> --- Qual Status? ---</option>
                        <option value="Aguardando">Aguardando</option>
                        <option value="Iniciada">Iniciada</option>
                        <option value="Finalizada">Finalizada</option>
                     </select>
                  </td>
                  <td><input required="required" class="form-control" type="text" id="codTransp" name="codTransp" size="23" style="text-transform:uppercase"  placeholder="Código de Trans." maxlength="10" onkeyup="validar(this,'num');"></td>
               </tr>
            </table>
         </form>
      </div>
      <div id="dlg-buttons">
         <a href="#" class="easyui-linkbutton" iconCls="icon-App-clean-icon" onclick="saveUser()">Salvar</a>
         <a href="#" class="easyui-linkbutton" iconCls="icon-Actions-edit-delete-icon" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
      </div>
      <br><br>
      <!-- FIM DIALOG ADMIN PESSOA FÍSICA -->
   </body>
</html>
