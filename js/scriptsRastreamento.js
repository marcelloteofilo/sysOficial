
var url;
function newRastreamento()
{
    $('#dlg').dialog('open').dialog('setTitle', 'Nova Rastreamento');
    $('#fm').form('clear');
    url = '../../webServices/RastreamentosWebService.php?editSave=incluirRastreamento';
}

function editRastreamento()
{
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $('#dlg').dialog('open').dialog('setTitle', 'Editar Rastreamento');
        $('#fm').form('load', row);
        url = '../../webServices/RastreamentosWebService.php?editSave=alterarRastreamento&id=' + row.id;
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

function saveRastreamento()
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

function removeRastreamento()
{
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirm', 'Tem certeza que deseja remover?', function (r) {
            $('#dg').datagrid('reload');

            if (r) {
                $.post('../../webServices/RastreamentosWebService.php?editSave=deletarRastreamento', {id: row.id}, function (resultado) {
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

function consultaRastreamento()
{
//                var row = $('#dg').datagrid('getSelected');
//                if (row)
//                {
//
//                }
}

//Consulta ajax
function consultaAJAXRastreamento( )
{
    var servicoHttp = "../webServices/rastreamentoWebService.php";

    var rotaRastreamento = document.getElementById('rota').value;

    jsonParametros = {incluirRastreamento: 'sim', rotaRastreamento: 'rota'};

    var $xhr = $.getJSON(servicoHttp, jsonParametros);


    $xhr.done(function (resultadoXml) {
        alert('Rastreamento inserido com sucesso!');
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });
}