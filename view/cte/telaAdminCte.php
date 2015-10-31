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
         /*function newUser(){
           $('#dlg').dialog('open').dialog('setTitle','Novo Frete');
           $('#fm').form('clear');
           url = '../../webServices/veiculoWebService.php?editSave=incluirVeiculo';
         }*/
         function editUser(){
           var row = $('#dg').datagrid('getSelected');
           if (row){
             $('#dlg').dialog('open').dialog('setTitle','Editar Frete');
             $('#fm').form('load',row);
             url = '../../webServices/cteWebService.php?editSave=alterarCte&numcte='+row.numcte;
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
         /*function removeUser(){
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
                 /*},'json');
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
         }*/
         
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
   <body style="background:#F3F8F7" onload="consultaFrete();">
      <!-- TABELA ADMIN PESSOA FÍSICA-->
      <center>
         <table id="dg" title="Consulta da CTE" class="easyui-datagrid" style=" width:1250px;height:495px"
            url="../../webServices/cteWebService.php?editSave=carregarCte"
            toolbar="#toolbar" pagination="true" 
            rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
               <tr>
                  <th field="numcte" width="30">Código CTE</th>
                  <th field="codCarga" width="30">Código Carga</th>
                  <th field="codFrete" width="30">Código Frete</th>
                  <th field="chaveAcesso" width="30">Chave de Acesso</th>
                  <th field="situacao" width="50">Situação</th>
                  <th field="statuscte" width="50">Status da CTE</th>
                  <th field="emissao" width="50">Emissão</th>
               </tr>
            </thead>
         </table>
         <div id="toolbar">
            <a href="#" class="easyui-linkbutton" iconCls="icon-invoice-icon" plain="true" onclick="editUser()" title="Adicionar Frete">Editar CTE</a>
            <!--<a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="editUser()" title="Alterar Dados do Frete">Editar CTE</a>-->
            <!--<label for="pesquisar">Localizar Veículos</label>
               &nbsp;&nbsp;
               <input type="text" id="pesquisar" name="pesquisar" size="30" />-->      
         </div>
         </div>
      </center>
      <!-- FIM TABELA ADMIN PESSOA FÍSICA -->
      <!-- DIALOG ADMIN PESSOA FÍSICA -->
      <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:200px;padding:10px 20px"
         closed="true" buttons="#dlg-buttons">
         <div class="ftitle"></div>
         <form id="fm" method="post" novalidate>
            <table width="100%">
               <!--Dados Pessoais -->
               <h2>Dados do CTE</h2>
               <!--Dados Pessoa Física -->
               <tr> 
               <tr>
                  <td><b>Chave de Acesso</b></td>
                  <td><b>Data de Emissão</b></td>
                  <td><b>Situação</b></td>
                  <td><b>Status da CTE</b></td>
                  <td><b>Frete</b></td>
               </tr>
               <tr>
                  <td><input required="required" class="form-control" type="text" id="chaveAcesso" name="chaveAcesso" placeholder="Chave de Acesso" maxlength="10"></td>

                  <td><input required="required" class="form-control" type="text" id="emissao" name="emissao" placeholder="Data de Emissão" maxlength="10"></td>

                  <td>
                     <select class="form-control" id="situacao" name="situacao">
                        <option value=""> --- Qual Status? ---</option>
                        <option value="Despachada">Despachada</option>
                        <option value="Em Transito">Em Transito</option>
                        <option value="Entregue">Entregue</option>
                     </select>
                  </td>

                  <td>
                     <select class="form-control" id="statuscte" name="statuscte">
                        <option value=""> --- Qual Status? ---</option>
                        <option value="Autorizado">Autorizado</option>
                        <option value="Cancelado">Cancelado</option>
                     </select>
                  </td>

                  <td>
                     <select class="form-control" id="codFrete" name="codFrete">
                        <option value="">FRETE</option>
                     </select>
                  </td>

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
