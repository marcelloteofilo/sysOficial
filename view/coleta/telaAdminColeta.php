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
    <script type="text/javascript" src="../../js/scriptsBuscas.js"></script>
    <!-- JS CRUD -->

    <!-- SCRIPT ADMIN -->
    <script type="text/javascript">
      var url;

        function carregarColeta(){
            $("div.easyui-layout").layout();
            $('#dg').edatagrid({
            url:'../../webServices/coletaWebService.php?editSave=carregarColeta',
            fitColumns: true
            });
            //$('#dg').datagrid('reload');
         }

        function carregarColetasAprovados(){
            $("div.easyui-layout").layout();
            $('#dg').edatagrid({
            url:'../../webServices/coletaWebService.php?editSave=carregarColetaAprovados',
            fitColumns: true
            });
            //$('#dg').datagrid('reload');
         }

         function carregarColetasColetadas(){
            $("div.easyui-layout").layout();
            $('#dg').edatagrid({
            url:'../../webServices/coletaWebService.php?editSave=carregarColetasColetadas',
            fitColumns: true
            });
            //$('#dg').datagrid('reload');
         }
    

      function editUser(){
        var row = $('#dg').datagrid('getSelected');
        var codColetaStatus = row.coletada;
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Editar Coleta');
          $('#fm').form('load',row);

          url = '../../webServices/coletaWebService.php?editSave=alterarColeta&codColeta='+row.codColeta;

          /*if(codColetaStatus == "Aprovado"){
          url = '../../webServices/coletaWebService.php?editSave=alterarColeta&codColeta='+row.codColeta;
          }
          else{
            alert("Este registro de coleta já foi conccluído, a mesma só conta para visualização de dados");
          }*/
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
    <table id="dg" title="Consulta das Coletas" class="easyui-datagrid" style=" width:1250px;height:495px"
      url="../../webServices/coletaWebService.php?editSave=carregarColeta"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>

        <tr>
          <th field="codCarga" width="20">Cod. Carga</th>
          <th field="nomeMotorista" width="30">Motorista</th>
          <th field="placaVeiculo" width="20">Veiculo</th>
          <th field="data" width="30">Data da coleta</th>
          <th field="hora" width="30">Hora da Coleta</th>
          <th field="coletada" width="30">Status da Coleta</th>
          <th field="telefone" width="30">Telefone</th>
          <th field="logradouro" width="30">Logradouro</th>
          <th field="bairro" width="30">Bairro</th>
          <th field="numero" width="20">Número</th>
          <th field="estado" width="15">Estado</th>
          <th field="cidade" width="30">Cidade</th>
        </tr>
      </thead>   
    </table>

    <div id="toolbar">
      <!--<a href="#" class="easyui-linkbutton" iconCls="icon-car-icon" plain="true" onclick="newUser()" title="Adicionar Usuário">Novo Veiculo</a>-->
      <a href="#" class="easyui-linkbutton" iconCls="icon-open-file" plain="true" onclick="editUser()" title="Alterar Dados da Coleta">Visualizar Coleta</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-Stats-icon" plain="true" onclick="carregarColeta()" title="">Listar Todos</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-like-icon" plain="true" onclick="carregarColetasAprovados()" title="">Aprovados</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-box-icon" plain="true" onclick="carregarColetasColetadas()" title="">Coletados</a>
      <!--<a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="removeUser()" title="Remover Dados do Usuário">Remover Coleta</a>-->
      <!--<label for="pesquisar">Localizar Coleta</label>
        &nbsp;&nbsp;
        <input type="text" id="pesquisar" name="pesquisar" size="30" />-->      
    </div>
    </div>
  </center>
    <!-- FIM TABELA ADMIN PESSOA FÍSICA -->

    <!-- DIALOG ADMIN PESSOA FÍSICA -->
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:440px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">
      <div class="ftitle"></div>
      <form id="fm" method="post" novalidate>

        <table >
          <!--Dados Pessoais -->
          <h2>Dados da Coleta</h2>
          <!--Dados Pessoa Física -->
          <tr>
            <!--<td><b>Codigo da Carga</b></td>-->
            <td><b>Veiculo</b></td>
            <td><b>Motorista</b></td>
            <td><b>Status da Coleta</b></td> 
            <td><b>Tel. Motorista</b></td>
            <td><b>Tel. da Coleta</b></td>
              
          </tr>
          
          <tr>

            <td>
            <select required="required"  class="form-control" id="codVeiculo" name="codVeiculo" >
            <option value="">Escolha o Veículo</option>
            </select>
            </td>
            <td>
            <select required="required"  class="form-control" id="codMotorista" name="codMotorista">
            <option value="">Escolha o Motorista</option>
            </select>
            </td>

            <td>
              <select size="1" name="coletada" id="coletada" required="required" class="form-control" style="width:130px">
                <option value="Aprovado">Aprovado</option>
                <option value="Coletado">Coletado</option>
              </select>
            </td>

            <td><input 
              class="form-control" 
              type="text" 
              id="telefoneMotorista"         
              name="telefoneMotorista" 
              placeholder="Telefone Motorista"
              readonly="true">
            </td>

            <td><input  
              class="form-control" 
              type="text" 
              id="telefone"
              onkeypress="mascara(this, '## ####-####')" 
              onkeyup="validar(this,'num');"
              maxlength="12" 
              name="telefone" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Telefone da Coleta"
              readonly="true">
            </td>

            

            </table>
            <table >
            <tr>
            <td><b>Data da Coleta</b></td>
            <td><b>Hora da Coleta</b></td>
                        
            </tr>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="data"
              onkeypress="mascara(this, '##/##/####')"
              onkeyup="validar(this,'num');" 
              maxlength="10" 
              name="data" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Data da Coleta">
            </td>
             <!--maxlength="4" -->

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="hora" 
              onkeypress="mascara(this, '##:##')"
              onkeyup="validar(this,'num');" 
              maxlength="5" 
              name="hora" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="hora da Coleta">
            </td>
            <td><input type="hidden" class="form-control" name="codCarga" name="codCarga"></td>         
          </tr>

        </table>



        <table width="100%">
           <br><h2>Endereço da Coleta</h2>
          <!--Dados Pessoa Física -->
          <tr>
            <td><b>Logradouro</b></td>
            <td><b>Bairro</b></td>
            <td><b>Número</b></td>
            <td><b>Estado</b></td>
            <td><b>Cidade</b></td>
          </tr>

          <tr>
            <td><input  
              class="form-control" 
              type="text" 
              readonly="true"
              id="logradouro" 
              name="logradouro" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Logradouro">
            </td>

            <td><input 
              class="form-control" 
              type="text" 
              readonly="true"
              id="bairro" 
              name="bairro" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Bairro">
            </td>

            <td><input 
              class="form-control" 
              type="text" 
              readonly="true"
              id="numero" 
              name="numero" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Número">
            </td>

            <td><input 
              class="form-control" 
              type="text" 
              readonly="true"
              id="estado" 
              name="estado" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Estado">
            </td>

            <td><input 
              class="form-control" 
              type="text" 
              readonly="true"
              id="cidade" 
              name="cidade" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Cidade">
            </td>
          </tr> 

        </table>
       <table width="100%">
       <tr>
       <td><b>Observação</b></td>
       </tr>
       <tr>
       <td><textarea class="form-control" name="observacao" id="observacao" readonly="true" placeholder="Observações" cols="80" rows="3" ></textarea></td>
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