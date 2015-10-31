	//CONSULTA CIDADES	
	/*function consultaCidades(listaCidades, ufEscolhida, codCidadeSelecionada, cidadeSelecionada) {	
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
		
	}*/


	function consultaAJAX( ) {	
		var servicoHttp = "../../webServices/veiculoWebService.php";				

		var placa = document.getElementById('placa').value;										
		var capacidadeKg = document.getElementById('capacidadeKg').value;								
		var capacidadeM3 = document.getElementById('capacidadeM3').value;
		var ano = document.getElementById('ano').value;
		var tipo = document.getElementById('tipo').value;
		var uf = document.getElementById('uf').value;
		var cidade = document.getElementById('cidade').value;

					
		
		//jsonParametros = {incluirUsuario: 'sim',  status,perfil,nomeCompleto,razaoSocial,nomeFantasia,tipoEmpresa,rg,orgaoExpedidor,cpf,cnpj,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,codCidade,login,senha};
		jsonParametros = {incluirUsuario: 'sim',  placa,capacidadeKg,capacidadeM3,ano,tipo,uf,cidade};

		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {
			//alert('Cadastro realizado com sucesso!');
		});

		$xhr.fail(function(data) {
			//alert('Cadastro realizado com sucesso!');
			//alert(data.responseText);
		});	
		
	}	