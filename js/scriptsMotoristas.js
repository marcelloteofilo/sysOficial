	//CONSULTA CIDADES	
	function consultaCidades(listaMotoristas) {	
		var servicoHttp = "../../webServices/motoristaWebService.php";				
		
		
		var caixalistaMotoristas = document.getElementById(listaMotoristas);												
		
		
		
		
		jsonParametros = {CarregarMotoristas: 'sim'};
	
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