function consultaAJAX( ) {	
	var servicoHttp = "../../webServices/cteWebService.php";				

	var numeroCte = document.getElementById('numcte').value;										
	var codigoCarga = document.getElementById('codCarga').value;								
	var codigoRota = document.getElementById('codRota').value;
	var situacao = document.getElementById('situacao').value;
	var chaveAcesso = document.getElementById('chaveAcesso').value;
	var statusCte = document.getElementById('statuscte').value;
	var emissao = document.getElementById('emissao').value;

	jsonParametros = {incluirCte: 'sim', numeroCte, codigoCarga, codigoRota, situacao, chaveAcesso, statusCte, emissao};

	var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
	$xhr.done(function(resultadoXml) {
		//alert('Cadastro realizado com sucesso!');
	});

	$xhr.fail(function(data) {
		//alert('Cadastro realizado com sucesso!');
		//alert(data.responseText);
	});	
		
}	