	//CONSULTA CIDADES	
	function consultaCidades(listaCidades, ufEscolhida, codCidadeSelecionada, cidadeSelecionada) {	
		var servicoHttp = "../../webServices/cidadeWebService.php";				
		
		var caixaUfEscolhida = document.getElementById(ufEscolhida); 
		var caixalistaCidades = document.getElementById(listaCidades);												
		var valorCidade = "";
		
		if(codCidadeSelecionada>0){
			valorCidade = codCidadeSelecionada+cidadeSelecionada;
		}
		
		jsonParametros = {consultaCidades: 'sim',  consultaUf: caixaUfEscolhida.value};
	
		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {

			var options = '<option value="'+valorCidade+'">'+cidadeSelecionada+'</option>';	
			for (var i = 0; i < resultadoXml.length; i++) {
				options += '<option value="' + resultadoXml[i].codigo + resultadoXml[i].descricao +'">' + resultadoXml[i].descricao + '</option>';
			}	
			caixalistaCidades.innerHTML= options;	

		});

		$xhr.fail(function(data) {
			alert(data.responseText);
		});	
		
	}