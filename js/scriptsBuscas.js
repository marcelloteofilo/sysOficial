	//CONSULTA CIDADES	
	function consultaMotorista() {	
		
		var servicoHttp = "../../webServices/consultasWebService.php";				

		var caixalistaMotorista = document.getElementById('codMotorista');

		var valorCaixa = caixalistaMotorista.value;		
		
		if(valorCaixa == ""){
		jsonParametros = {consultaMotorista: 'sim'};
	
		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {

			var options = '<option value="'+2+'">'+"MOTORISTA"+'</option>';	
			for (var i = 0; i < resultadoXml.length; i++) {
				options += '<option value="' + resultadoXml[i].id +'">' + resultadoXml[i].nomeCompleto + '</option>';
			}	
			caixalistaMotorista.innerHTML= options;	

		});

		$xhr.fail(function(data) {
			alert(data.responseText);
		});	
		}
	}

		//CONSULTA CIDADES	
	function consultaVeiculo() {	
		
		var servicoHttp = "../../webServices/consultasWebService.php";				

		var caixalistaVeiculo = document.getElementById('codVeiculo');

		var valorCaixa = caixalistaVeiculo.value;		
		
		if(valorCaixa == ""){
		jsonParametros = {consultaVeiculo: 'sim'};
	
		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {

			var options = '<option value="'+1+'">'+"VEICULO"+'</option>';	
			for (var i = 0; i < resultadoXml.length; i++) {
				options += '<option value="' + resultadoXml[i].id +'">' + resultadoXml[i].placa + '</option>';
			}	
			caixalistaVeiculo.innerHTML= options;	

		});

		$xhr.fail(function(data) {
			alert(data.responseText);
		});	
		}
	}


		function consultaFrete() {	
		
		var servicoHttp = "../../webServices/consultasWebService.php";				

		var caixalistaFrete = document.getElementById('codFrete');

		var valorCaixa = caixalistaFrete.value;		
		
		if(valorCaixa == ""){
		jsonParametros = {consultaFrete: 'sim'};
	
		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {

			var options = '<option value="'+1+'">'+"FRETE"+'</option>';	
			for (var i = 0; i < resultadoXml.length; i++) {
				options += '<option value="' + resultadoXml[i].codFrete +'">' + resultadoXml[i].codTransp + '</option>';
			}	
			caixalistaFrete.innerHTML= options;	

		});

		$xhr.fail(function(data) {
			alert(data.responseText);
		});	
		}
	}
