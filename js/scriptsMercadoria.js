
var url;
function newMercadoria()
{
    $('#dlg').dialog('open').dialog('setTitle', 'Nova Mercadoria');
    $('#fm').form('clear');
    url = '../../webServices/mercadoriasWebService.php?editSave=incluirMercadoria';
}

function editMercadoria()
{
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $('#dlg').dialog('open').dialog('setTitle', 'Editar Mercadoria');
        $('#fm').form('load', row);
        url = '../../webServices/mercadoriasWebService.php?editSave=alterarMercadoria&id=' + row.id;
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

function saveMercadoria()
{
    $('#fm').form('submit', {
        url: url,
        onSubmit: function ()
        {
            return $(this).form('validate');
        },
        success: function (result) {
            $('#dlg').dialog('close');    // close the dialog
            $('#dg').datagrid('reload');  // reload the user data
        }
    });
}

function removeMercadoria()
{
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirm', 'Tem certeza que deseja remover?', function (r) {
            $('#dg').datagrid('reload');

            if (r) {
                $.post('../../webServices/mercadoriasWebService.php?editSave=deletarMercadoria', {id: row.id}, function (resultado) {
//                    if (resultado.success)
//                    {
//                        $('#dlg').dialog('close');
//
//                    } else {
//                        $('#dg').datagrid('reload');	// reload the user data
//                    }
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

function consultaMercadoria()
{
//                var row = $('#dg').datagrid('getSelected');
//                if (row)
//                {
//
//                }
}

//Consulta ajax
function consultaAJAXMercadoria( )
{
    //var document = "../view/mercadoria/telaAdminMercadorias.php";
    var servicoHttp = "../webServices/mercadoriasWebService.php";

    var idCotacao = document.getElementById('idCotacao').value;
    var descricaoMercadoria = document.getElementById('descricaoMercadoria').value;
    var pesoMercadoria = document.getElementById('pesoMercadoria').value;


    var jsonParametros = {incluirMercadoria: 'sim', idCotacao: 'idCotacoes', descricao: 'descricaoMercadoria', pesoMercadoria: 'pesoMercadoria'};

    var $xhr = $.getJSON(servicoHttp, jsonParametros);


    $xhr.done(function (resultadoXml) {
        alert('Mercadoria inserida com sucesso!');
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });
}