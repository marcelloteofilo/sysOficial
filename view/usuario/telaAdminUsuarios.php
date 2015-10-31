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
        <!--<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />-->
        <!-- JS CRUD -->
        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
        <!-- JS CRUD -->
        <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
        <script type="text/javascript" src="../../js/validacaoCampo.js"></script>
        <script type="text/javascript" src="../../js/scriptsUsuarios.js"></script>
        <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>


        <!-- SCRIPT ADMIN -->
        <script type="text/javascript">
            var url;
            function newUser() {
                $('#dlg').dialog('open').dialog('setTitle', 'Novo Usuário');
                $('#fm').form('clear');
                url = '../../webServices/usuariosWebService.php?editSave=adicionarUsuario';
            }
            function editUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $('#dlg').dialog('open').dialog('setTitle', 'Editar Usuário');
                    $('#fm').form('load', row);
                    url = '../../webServices/usuariosWebService.php?editSave=alterarUsuario&id=' + row.id;
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
            function saveUser() {
                $('#fm').form('submit', {
                    url: url,
                    onSubmit: function () {
                        return $(this).form('validate');
                    },
                    success: function (result) {
                        $('#dlg').dialog('close');    // close the dialog
                        $('#dg').datagrid('reload');  // reload the user data

                    }
                });
            }
            function removeUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirm', 'Tem certeza que deseja remover o Cliente?', function (r) {
                        $('#dg').datagrid('reload');

                        if (r) {
                            $.post('../../webServices/usuariosWebService.php?editSave=removerUsuario', {id: row.id}, function (result) {
                                /*if (result.success){

                                 $('#dg').datagrid('reload');  // reload the user data
                                 } else {
                                 $.messager.show({ // show error message
                                 title: 'Error',
                                 msg: result.msg
                                 });
                                 }*/
                            }, 'json');
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
<body style="background:#F3F8F7">

    <!-- TABELA ADMIN PESSOA FÍSICA-->
<center>
    <table id="dg" title="Cadastro de Usuários" class="easyui-datagrid" style=" width:1250px;height:495px"
           url="../../webServices/usuariosWebService.php?editSave=carrefarUsuario"
           toolbar="#toolbar" pagination="true"
           rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>

            <tr>
                <th field="status" width="46">Status</th>
                <th field="perfil" width="64">Perfil</th>
                <th field="nomeCompleto" width="70">Nome Completo</th>
                <th field="rg" width="50">RG</th>
                <th field="cpf" width="72">CPF</th>
                <th field="razaoSocial" width="70">Razão Social</th>
                <th field="nomeFantasia" width="70">Nome Fantasia</th>
                <th field="cnpj" width="50">CNPJ</th>
                <th field="email" width="100">E-mail</th>
                <th field="telefone1" width="70">Telelefone Res.</th>
                <th field="estado" width="20">UF</th>
                <th field="cidade" width="50">Cidade</th>
                <th field="cep" width="50">CEP</th>
            </tr>
        </thead>
    </table>

    <div id="toolbar">
        <a href="#" class="easyui-linkbutton" iconCls="icon-users-add-icon" plain="true" onclick="newUser()" title="Adicionar Usuário">Novo Usuário</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Editar Usuário</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="removeUser()" title="Remover Dados do Usuário">Remover Usuário</a>
        <label for="pesquisar">Localizar Usuario</label>
        &nbsp;&nbsp;
        <input type="text" id="pesquisar" name="pesquisar" size="30" />
    </div>
</center>
<!-- FIM TABELA ADMIN PESSOA FÍSICA -->

<!-- DIALOG ADMIN PESSOA FÍSICA -->
<div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:610px;padding:10px 20px"
     closed="true" buttons="#dlg-buttons">
    <div class="ftitle"></div>
    <form id="fm" method="post" novalidate>

        <table>
            <!--Dados Pessoais -->
            <h2>Dados Pessoais</h2>
            <!--Dados Pessoa Física -->
            <tr>
                <td><b>Nome Completo</b></td>
                <td><b>CPF</b></td>
                <td><b>RG</b></td>
                <td><b>Orgão Expedidor</b></td>
            </tr>
            <tr>
                <td><input class="form-control" type="text" id="nomeCompleto" name="nomeCompleto" size="23" style="text-transform:uppercase"  placeholder="Nome Completo" type="text" onkeyup="validar(this, 'text');"></td>
                <td><input class="form-control" type="text" id="cpf" name="cpf" size="23" maxlength="14" placeholder="CPF" type="text" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"></td>
                <td><input class="form-control" type="text" id="rg" name="rg" size="23" maxlength="9" placeholder="RG" type="text" onkeypress="javascript: mascara(this, Rg);"></td>
                <td><input class="form-control" type="text" id="orgaoExpedidor" name="orgaoExpedidor" style="text-transform:uppercase" size="23" maxlength="8" placeholder="Orgão Expedidor" type="text" onkeyup="validar(this, 'text');"></td>
            </tr>
            <!--Dados Pessoa Jurídica -->
            <tr>
                <td><b>Razão Social</b></td>
                <td><b>Nome Fantasia</b></td>
                <td><b>CNPJ</b></td>
                <td><b>Tipo de Empresa</b></td>
            </tr>
            <tr>
                <td><input class="form-control" type="text" id="razaoSocial" name="razaoSocial" size="23" style="text-transform:uppercase"  placeholder="Razão Social" type="text" onkeyup="validar(this, 'text');"></td>
                <td><input class="form-control" type="text" id="nomeFantasia" name="nomeFantasia" size="23" maxlength="14" placeholder="Nome Fantasia" type="text" onkeyup="validar(this, 'text');"></td>
                <td><input class="form-control" type="text" id="cnpj" name="cnpj" size="23" maxlength="9" placeholder="CNPJ" type="text"></td>
                <td><select class="form-control" id="tipoEmpresa" name="tipoEmpresa">
                        <option value=""> --- Selecione o tipo --- </option>
                        <option value="Empresa Privada">Empresa Privada</option>
                        <option value="Empresa Publica">Empresa Publica</option>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <!--Endereço -->
            <h2>Endereço</h2>
            <tr>
                <td><b>CEP</b></td>
                <td><b>Logradouro</b></td>
                <td><b>Número</b></td>
                <td><b>Bairro</b></td>
            </tr>
            <tr>
                <td><input required="required" class="form-control" type="text" id="cep" name="cep" size="23" maxlength="9" placeholder="CEP" type="text" onkeypress="mascaraCep(this, '#####-###')" onkeyup="validar(this, 'num');"></td>
                <td><input required="required" class="form-control" type="text" id="logradouro" name="logradouro" size="23" placeholder="Logradouro" type="text" style="text-transform:uppercase"></td>
                <td><input required="required" class="form-control" type="text" id="numero" name="numero" size="23" maxlength="5" placeholder="Número" type="text" onkeyup="validar(this, 'num');"></td>
                <td><input required="required" class="form-control" type="text" id="bairro" name="bairro" style="text-transform:uppercase" size="23" placeholder="Bairro" type="text" onkeyup="validar(this, 'text');"></td>
            </tr>

            <tr>
                <td><b>Complemento</b></td>
                <td><b>Estado</b></td>
                <td><b>Cidade</b></td>
            </tr>
            <tr>
                <td><input class="form-control" type="text" id="complemento" name="complemento" size="23" style="text-transform:uppercase" placeholder="Complemento" type="text"></td>
                <td>
                    <select required="required" class="form-control" id="estado" name="estado">
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
                <td><input required="required" class="form-control" type="text" id="cidade" name="cidade" style="text-transform:uppercase" size="23" placeholder="Cidade"></td>
            </tr>
        </table>
        <br>
        <table>
            <!--Contato -->
            <h2>Contato</h2>
            <tr>
                <td><b>E-mail</b></td>
                <td><b>Telefone Resiencial</b></td>
                <td><b>Telefone Celular</b></td>
            </tr>
            <tr>
                <td><input required="required" class="form-control" type="email" id="email" name="email" style="text-transform:uppercase" size="23" placeholder="E-mail@domínio.com" type="email"></td>
                <td><input required="required" class="form-control" type="text" id="telefone1" name="telefone1" maxlength="15" size="23" maxlength="12" placeholder="(00)00000-0000" type="text" onkeyup="validar(this, 'num');" onkeypress="telefoneMascara(this)" onkeypress="mascara(this, '## ####-####')"></td>
                <td><input required="required" class="form-control" type="text" id="telefone2" name="telefone2" size="23" maxlength="14" placeholder="(00)00000-0000" type="text" onkeyup="validar(this, 'num');" onkeypress="telefoneMascara(this)" onkeypress="mascara(this, '## ####-####')"></td>
            </tr>
        </table>
        <br>
        <table>
            <!--Login/Senha -->
            <h2>Login/Senha</h2>
            </tr>
            <td><b>Usuário</b></td>
            <td><b>Senha</b></td>
            <td><b>Perfil</b></td>
            <td><b>Status</b></td>
            </tr>
            <tr>
                <td><input required="required" class="form-control" type="text" id="login" name="login" size="30" placeholder="Usuário"></td>
                <td><input required="required" class="form-control" type="text" size="30" id="senha" name="senha" placeholder="Senha"></td>
                <td>
                    <select required="required" class="form-control" id="perfil" name="perfil" onclick="validaPerfil()">
                        <option value="Pessoa Fisica">Pessoa Física</option>
                        <option value="Pessoa Juridica">Pessoa Jurídica</option>
                        <option value="Atendente">Atendente</option>
                        <option value="Motorista">Motorista</option>
                    </select>
                </td>
                <td>
                    <select required="required" class="form-control" id="status" name="status" >
                        <option value="Habilitado" >Habilitado</option>
                        <option value="Desabilitado" >Desabilitado</option>
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