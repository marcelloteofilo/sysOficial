	//VARIAVEIS ULTILIZADAS	
	var contaNumero = 0;
	var tipoConsulta = 'RAZAO';	
	var itensConsulta = [];	
	
	
	
	//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
	function incluirColeta() {	
		//VALIDAR ANTES DE INCLUIR
		if (document.getElementById('idRemetente').value.length == 0){
			alert ('Por Favor, informe o Remetente!');		 
			document.getElementById('idRemetente').focus();
			return;
		}	   	
		if (document.getElementById('idDestinatario').value.length == 0){
			alert ('Por Favor, informe o Remetente!');		 
			document.getElementById('idDestinatario').focus();
			return;
		}	   	
		if (document.getElementById('dataAgendada').value.length == 0){
			alert ('Por Favor, informe uma Data para Coletar a Mercadoria!');		 
			document.getElementById('dataAgendada').focus();
			return;
		}	   	
		if (document.getElementById('horaAgendada').value.length == 0){
			alert ('Por Favor, informe a Hora para Coletar!');		 
			document.getElementById('horaAgendada').focus();
			return;
		}
		
		var idCotacao = document.getElementById('idCotacao');								
		var idDestinatario = document.getElementById('idDestinatario');										
		var idRemetente = document.getElementById('idRemetente');	
		var dataAgendada = document.getElementById('dataAgendada');	
		var horaAgendada = document.getElementById('horaAgendada');	
		var obs = document.getElementById('obs');	
		
		jsonParametros = {editSave: 'incluirColeta',
			idCotacao: idCotacao.value,
			idDestinatario: idDestinatario.value,
			idRemetente: idRemetente.value,
			idMotorista: '0',
			placaVeiculo : 'aaa-0000',
			dataAgendada: dataAgendada.value,
			horaAgendada: horaAgendada.value,
			obs: obs.value,
			status: '1'};	
	
		var $xhr = $.getJSON('../../webServices/coletaWebService.php', jsonParametros);			
				
		$xhr.done(function(resultadoXml) {
			
			jsonParametros = {editSave: 'aprovarCotacao',
			idCotacao: idCotacao.value,
			aprovadoCliente: 1};				
			
			var $xhr = $.getJSON('../../webServices/cotacaoWebService.php', jsonParametros);			
					
			$xhr.done(function(resultadoXml) {
				alert('Coleta Agendada Com Sucesso!');
				irPara('../cotacao/viewConsulta.php');				
			});

			$xhr.fail(function(data) {			
				alert(data.responseText);			
			});				
		});

		$xhr.fail(function(data) {			
			alert(data.responseText);			
		});			
	}
	
	
	
	//MUDA DE PÁGINA
	function irPara(paginaSelecionada){			
		window.location.href = paginaSelecionada;
	}	
	
	//CONSULTA COTACAO POR CODIGO
	function consultaCotacao(idCotacao) {	
		if (idCotacao>0){
			var jsonParametros = {editSave: 'consultaCotacao', idCotacao: idCotacao};					
			
			var $xhr = $.getJSON('../../webServices/cotacaoWebService.php', jsonParametros);			
				
			$xhr.done(function(resultadoXml) {
				var valorCarga = document.getElementById('valor');			
				var peso = document.getElementById('peso');	
				var qtdCaixas = document.getElementById('qtdCaixas');	
				var valorFrete = document.getElementById('frete');	
				qtdCaixas.value = resultadoXml[0].quantidadeCaixas;			
				valorCarga.value = resultadoXml[0].valorCarga;			
				valorFrete.value = 'R$:'+resultadoXml[0].valorFrete;			
				peso.value = resultadoXml[0].peso;								
			});

			$xhr.fail(function(data) {			
				alert(data.responseText);			
			});	
		}
	}
	
	//SELECIONA CONSULTA
	function selecionarConsulta(me){				 
		 var consultas = document.getElementById('consultas');					 
		 var posicaoArray = me.id;
		if (consultas.value=='REMETENTE'){			 
			var idRemetente = document.getElementById('idRemetente');					 
			idRemetente.value = itensConsulta[posicaoArray].id;
			var cnpjRemetente = document.getElementById('cnpjRemetente');					 
			cnpjRemetente.value = itensConsulta[posicaoArray].cpf;
			var nomeRemetente = document.getElementById('nomeRemetente');					 
			nomeRemetente.value = itensConsulta[posicaoArray].nomeCompleto;			
		}
		if (consultas.value=='DESTINATARIO'){			 
			var idDestinatario = document.getElementById('idDestinatario');					 
			idDestinatario.value = itensConsulta[posicaoArray].id;
			var cnpjDestinatario = document.getElementById('cnpjDestinatario');					 
			cnpjDestinatario.value = itensConsulta[posicaoArray].cpf;
			var nomeDestinatario = document.getElementById('nomeDestinatario');					 
			nomeDestinatario.value = itensConsulta[posicaoArray].nomeCompleto;			
		}
				
		$('#dlg').dialog('close');					
	}
	function incluirRemetente(){	
		$('#dlg').dialog('close'); 	
        $('#dlg_cadastrar').dialog('open').dialog('setTitle','Cadastrar Remetente');       
		$("#btnSalvarRemetente").show(400);			   										
		$("#btnSalvarDestinatario").hide("slow");        				
	}
	
	
    function consultarRemetente(){	 	
        $('#dlg').dialog('open').dialog('setTitle','Consulta Remetente');       
		$("#btnRemetente").show(400);			   								
		var idCotacao = document.getElementById('idCotacao');					  
		$("#btnDestinatario").hide("slow");        
		var tituloConsulta = document.getElementById('tituloConsulta');			
		tituloConsulta.innerHTML = 'CONSULTA REMETENTES PELO CNPJ';				
		var nomesConsulta = document.getElementById('nomesConsulta');		
		nomesConsulta.innerHTML = '<td style="border: 1px solid;  color:white;" bgcolor="green">CNPJ</td><td style="border: 1px solid;  color:white;" bgcolor="green"> RAZAO SOCIAL</td>';		
		var consultas = document.getElementById('consultas');			
		var tempConsultas = document.getElementById('tempConsulta');			
		tempConsulta.focus();
		consultas.value = 'REMETENTE';		
		limparConsultas();		  
	}
	
	function incluirDestinatario(){	 	
		$('#dlg').dialog('close');
        $('#dlg_cadastrar').dialog('open').dialog('setTitle','Cadastrar Destinatario');       
		$("#btnSalvarDestinatario").show(400);			   										
		$("#btnSalvarRemetente").hide("slow");        		
	}		
	
	function consultarDestinatario(){	 	
        $('#dlg').dialog('open').dialog('setTitle','Consulta Destinatario');       
		$("#btnDestinatario").show(400);			   								
		var idCotacao = document.getElementById('idCotacao');					  
		$("#btnRemetente").hide("slow");        
		var tituloConsulta = document.getElementById('tituloConsulta');			
		tituloConsulta.innerHTML = 'CONSULTA REMETENTES PELO CNPJ';				
		var nomesConsulta = document.getElementById('nomesConsulta');		
		nomesConsulta.innerHTML = '<td style="border: 1px solid; color:white;" bgcolor="green">CNPJ</td><td style="border: 1px solid;  color:white;" bgcolor="green">RAZAO SOCIAL</td>';					
		var consultas = document.getElementById('consultas');			
		var tempConsultas = document.getElementById('tempConsulta');			
		tempConsulta.focus();
		consultas.value = 'DESTINATARIO';						
		limparConsultas();		  
	}		
	
	//LIMPAR CONSULTAS
	function limparConsultas(){	 	 
		try{	   			
			for (var z = 0; z < 10; z++) {				
				var trApagada = document.getElementById('trInserida'+z);
				document.getElementById("labConsultas").removeChild(trApagada);								
			}
		} catch(e) {}			 
		var argumentoConsulta = document.getElementById('tempConsulta');		
		argumentoConsulta.value = "";
	}
	
	
	//PESQUISA CLIENTE
	function consultaRemetente(me) {		 
	  var caixaTexto = document.getElementById('tempConsulta'); 
		if (caixaTexto.value.length!=contaNumero){	//COMPARA SE HOUVE AUMENTO OU DIMINUICAO DOS CARACTERES					
			contaNumero = caixaTexto.value.length; 		
			// TENTA LIMPAR A TABELA
			try{	   			
				for (var z = 0; z < 10; z++) {				
					var trApagada = document.getElementById('trInserida'+z);
					document.getElementById("labConsultas").removeChild(trApagada);								
				}
			} catch(e) {}		

			// PREENCHE UMA LINHA INDICANDO QUE ESTÁ PROCURANDO...
			var trInserida = document.createElement("tr");
			var tdCnpj = document.createElement("td");
			var tdRazao = document.createElement("td");
			trInserida.id = "trInserida0";
			tdCnpj.id = "tdCnpj0";
			tdCnpj.style.background ="YELLOW";
			tdCnpj.style.color ="BLACK";
			tdCnpj.innerHTML = '?';
			tdRazao.id = "tdRazao0";
			tdRazao.style.background ="YELLOW";
			tdRazao.style.color ="black";			
			tdRazao.innerHTML = 'CONSULTANDO....';
			trInserida.appendChild(tdCnpj);							
			trInserida.appendChild(tdRazao);				
			document.getElementById("labConsultas").appendChild(trInserida);														
			//PREENCHE A TABELA			
			$.getJSON('../../webServices/usuariosWebService.php?editSave=carrefarUsuario&search=',{'nomeCompleto': me.value, ajax: 'true'}, function(j){					
				//	REMOVE LINHA DE ESPERA				
				try{	   			
				for (var z = 0; z < 10; z++) {				
					var trApagada = document.getElementById('trInserida'+z);
					document.getElementById("labConsultas").removeChild(trApagada);								
				}
				} catch(e) {}						
				
				//PREENCHE A CONSULTA
				if (j.length>0){
					for (var i = 0; i < j.length; i++) {									
						var trInserida = document.createElement("tr");
						trInserida.id = "trInserida"+i;						
						trInserida.innerHTML = '<td colspan="2"><table width="100%"><tr  onclick="selecionarConsulta(this);"  class="itens" id="'+i+'"><td width="110">'+j[i].cpf+'</td><td width="300">'+j[i].nomeCompleto+'</td></tr></table></td>';
						document.getElementById("labConsultas").appendChild(trInserida);						
						//CARREGA OBJETOS															
						itensConsulta[i] = j[i];
					}				
				} else {
						var trInserida = document.createElement("tr");
						var tdCnpj = document.createElement("td");
						var tdRazao = document.createElement("td");
						trInserida.id = "trInserida0";
						tdCnpj.id = "tdCnpj0";
						tdCnpj.style.background ="RED";
						tdCnpj.style.color ="BLACK";
						tdCnpj.innerHTML = '0';
						tdRazao.id = "tdRazao0";
						tdRazao.style.background ="red";
						tdRazao.style.color ="black";			
						tdRazao.innerHTML = 'NADA ENCONTRADO';
						trInserida.appendChild(tdCnpj);							
						trInserida.appendChild(tdRazao);				
						document.getElementById("labConsultas").appendChild(trInserida);											
				}
			});						
			
		}
	}
		
	//INCLUIR CLIENTE
	function incluirRemetDest(remetDest) {			
		var razaoSocial = document.getElementById('razaoSocial');								
		var nomeFantasia = document.getElementById('nomeFantasia');										
		var cnpj = document.getElementById('cnpj');	
		var logradouro = document.getElementById('logradouro');										
		var bairro = document.getElementById('bairro');										
		var cidade = document.getElementById('cidade');										
		var estado = document.getElementById('estado');										
		var numero = document.getElementById('numero');				
		var complemento = document.getElementById('complemento');				
		var cep = document.getElementById('cep');		

		var consultas = document.getElementById('consultas');					 		
		if (remetDest=='Remetente'){			 
			var idRemetente = document.getElementById('idRemetente');					 
			idRemetente.value = '1';
			var cnpjRemetente = document.getElementById('cnpjRemetente');					 
			cnpjRemetente.value = cnpj.value
			var nomeRemetente = document.getElementById('nomeRemetente');					 
			nomeRemetente.value = nomeFantasia.value;			
		}
		if (remetDest=='Destinatario'){			 
			var idDestinatario = document.getElementById('idDestinatario');					 
			idDestinatario.value = '1';
			var cnpjDestinatario = document.getElementById('cnpjDestinatario');					 
			cnpjDestinatario.value = cnpj.value;
			var nomeDestinatario = document.getElementById('nomeDestinatario');					 
			nomeDestinatario.value = nomeFantasia.value;			
		}		
				
		jsonParametros = {editSave: 'adicionarUsuario',
		idStatus: 1,
		idPerfil: 1,
		nomeCompleto: "",
		razaoSocial: razaoSocial.value,
		nomeFantasia: nomeFantasia.value,
		tipoEmpresa: "",
		rg: "",
		orgaoExpedidor: "",
		cpf: "",
		cnpj: cnpj.value,
		email: "",
		telefone1: "",
		telefone2: "",
		logradouro: logradouro.value, 
		bairro: bairro.value,
		numero: numero.value,
		complemento: complemento.value,
		cidade: cidade.value,
		estado: estado.value,
		numero: numero.value,
		login: "*",		
		senha: "*",
		cep: cep.value};			
		
		var $xhr = $.getJSON('../../webservices/usuariosWebService.php', jsonParametros);			
			
		$xhr.done(function(resultadoXml) {
		 alert(remetDest+' Incluido com Sucesso!');
		 $('#dlg_cadastrar').dialog('close');
		});

		$xhr.fail(function(data) {
			alert(remetDest+' Incluido com Sucesso!');
		 $('#dlg_cadastrar').dialog('close');
			//alert(data.responseText);			
		});	
		
	}		
	
	
	