	function consultaAJAX() {	
		var servicoHttp = "../../webServices/usuariosWebService.php";				

		var status = "Habilitado";												
		var perfil = document.getElementById('idPerfil').value;										

		var nomeCompleto = document.getElementById('nomeCompleto').value;								
		var orgaoExpedidor = document.getElementById('orgaoExpedidor').value;
		var cpf = document.getElementById('cpf').value;
		var rg = document.getElementById('rg').value;

		var razaoSocial = document.getElementById('razaoSocial').value;								
		var nomeFantasia = document.getElementById('nomeFantasia').value;								
		var tipoEmpresa = document.getElementById('tipoEmpresa').value;							
		var cnpj = document.getElementById('cnpj').value;

		var email = document.getElementById('email').value;	
		var telefone1 = document.getElementById('telefone1').value;								
		var telefone2 = document.getElementById('telefone2').value;

		var logradouro = document.getElementById('logradouro').value;								
		var bairro = document.getElementById('bairro').value;
		var numero = document.getElementById('numero').value;								
		var complemento = document.getElementById('complemento').value;																
		var cep = document.getElementById('cep').value;		
		var estado = document.getElementById('estado').value;	
		var cidade = document.getElementById('cidade').value;		

		var login = document.getElementById('login').value;								
		var senha = document.getElementById('senha').value;							
		
		//jsonParametros = {incluirUsuario: 'sim',  status,perfil,nomeCompleto,razaoSocial,nomeFantasia,tipoEmpresa,rg,orgaoExpedidor,cpf,cnpj,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,codCidade,login,senha};
		jsonParametros = {incluirUsuario: 'sim',  status,perfil,razaoSocial,nomeFantasia,tipoEmpresa,cnpj,nomeCompleto,rg,orgaoExpedidor,cpf,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,estado,cidade,login,senha};

		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {
			//alert('Cadastro realizado com sucesso!');
		});

		$xhr.fail(function(data) {
			//alert('Cadastro realizado com sucesso!');
			//alert(data.responseText);
		});	
		
	}	



function validaCadastroBotao(){
		var aprovado = true;
		
		var perfil = document.getElementById('idPerfil').value;										

		var nomeCompleto = document.getElementById('nomeCompleto').value;								
		var orgaoExpedidor = document.getElementById('orgaoExpedidor').value;
		var cpf = document.getElementById('cpf').value;
		var rg = document.getElementById('rg').value;

		var razaoSocial = document.getElementById('razaoSocial').value;								
		var nomeFantasia = document.getElementById('nomeFantasia').value;								
		var tipoEmpresa = document.getElementById('tipoEmpresa').value;							
		var cnpj = document.getElementById('cnpj').value;

		var email = document.getElementById('email').value;	
		var telefone1 = document.getElementById('telefone1').value;								
		var telefone2 = document.getElementById('telefone2').value;

		var logradouro = document.getElementById('logradouro').value;								
		var bairro = document.getElementById('bairro').value;
		var numero = document.getElementById('numero').value;								
		var complemento = document.getElementById('complemento').value;																
		var cep = document.getElementById('cep').value;		
		var estado = document.getElementById('estado').value;	
		var cidade = document.getElementById('cidade').value;		

		var login = document.getElementById('login').value;								
		var senha = document.getElementById('senha').value;

		if(email == ""){aprovado = false;}
		if(telefone1 == ""){aprovado = false;}
		if(telefone2 == ""){aprovado = false;}
		if(logradouro == ""){aprovado = false;}
		if(bairro == ""){aprovado = false;}
		if(cep == ""){aprovado = false;}
		if(estado == ""){aprovado = false;}
		if(cidade == ""){aprovado = false;}
		if(login == ""){aprovado = false;}
		if(senha == ""){aprovado = false;}
		
		if(perfil == "PF"){
			if(nomeCompleto == "" || orgaoExpedidor == "" || cpf == "" || rg == ""){
				aprovado = false;
			}
		}
		else if(perfil == "PJ"){
			if(razaoSocial == "" || nomeFantasia == "" || tipoEmpresa == "" || cnpj == ""){
				aprovado = false;
			}
		}	
		
		if(aprovado == true){
			consultaAJAX();
			if(perfil == "PF"){
				alert("Parabéns "+nomeCompleto+"! Seu cadastro foi realizado com sucesso!");
			}
			else{
				alert("Parabéns "+razaoSocial+"! Seu cadastro foi realizado com sucesso!");
			}
		}
		else{
			alert("Atenção! Favor verificar o preenchimento de todos os campos obrigatorios!");
		}
}

function validaPerfilUsuario(){

  var perfilUsuario = document.getElementById('idPerfil').value;
  
  if(perfilUsuario == "Pessoa Fisica"){
    //Habilita
    document.getElementById('nomeCompleto').disabled = false;
    document.getElementById('cpf').disabled = false;
    document.getElementById('rg').disabled = false;
    document.getElementById('orgaoExpedidor').disabled = false; 
    //Desabilita
    document.getElementById('razaoSocial').disabled = true;
    document.getElementById('nomeFantasia').disabled = true;
    document.getElementById('cnpj').disabled = true;
    document.getElementById('tipoEmpresa').disabled = true;
    document.getElementById('razaoSocial').value =""; 
    document.getElementById('nomeFantasia').value =""; 
    document.getElementById('cnpj').value =""; 
    document.getElementById('tipoEmpresa').value ="";   
  }
  else{
    //Habilita
    document.getElementById('nomeCompleto').disabled = true;
    document.getElementById('cpf').disabled = true;
    document.getElementById('rg').disabled = true;
    document.getElementById('orgaoExpedidor').disabled = true; 
    document.getElementById('nomeCompleto').value ="";   
    document.getElementById('cpf').value ="";   
    document.getElementById('rg').value ="";   
    document.getElementById('orgaoExpedidor').value ="";   
 
    //Desabilita
    document.getElementById('razaoSocial').disabled = false;
    document.getElementById('nomeFantasia').disabled = false;
    document.getElementById('cnpj').disabled = false;
    document.getElementById('tipoEmpresa').disabled = false; 
  }
}

function validaPerfil(){

  var perfilUsuario = document.getElementById('perfil').value;
  
  if(perfilUsuario == "Pessoa Juridica"){
 //Habilita
    document.getElementById('nomeCompleto').disabled = true;
    document.getElementById('cpf').disabled = true;
    document.getElementById('rg').disabled = true;
    document.getElementById('orgaoExpedidor').disabled = true;  
    //Desabilita
    document.getElementById('razaoSocial').disabled = false;
    document.getElementById('nomeFantasia').disabled = false;
    document.getElementById('cnpj').disabled = false;
    document.getElementById('tipoEmpresa').disabled = false; 
  }
  else{
        //Habilita
    document.getElementById('nomeCompleto').disabled = false;
    document.getElementById('cpf').disabled = false;
    document.getElementById('rg').disabled = false;
    document.getElementById('orgaoExpedidor').disabled = false; 
    //Desabilita
    document.getElementById('razaoSocial').disabled = true;
    document.getElementById('nomeFantasia').disabled = true;
    document.getElementById('cnpj').disabled = true;
    document.getElementById('tipoEmpresa').disabled = true;  
   
  }
}

function validaStatus(){
  
  var statusUsuario = document.getElementById('status').value;
  
  if(statusUsuario == "Habilitado"){
    //Habilita
    document.getElementById('nomeCompleto').disabled = false;
    document.getElementById('cpf').disabled = false;
    document.getElementById('rg').disabled = false;
    document.getElementById('orgaoExpedidor').disabled = false; 
    
    document.getElementById('razaoSocial').disabled = false;
    document.getElementById('nomeFantasia').disabled = false;
    document.getElementById('cnpj').disabled = false;
    document.getElementById('tipoEmpresa').disabled = false; 
    
    document.getElementById('email').disabled = false;
    document.getElementById('telefone1').disabled = false;
    document.getElementById('telefone2').disabled = false;
    document.getElementById('logradouro').disabled = false;  
    document.getElementById('bairro').disabled = false;
    document.getElementById('numero').disabled = false;
    document.getElementById('complemento').disabled = false;
    document.getElementById('cep').disabled = false;
    document.getElementById('estado').disabled = false;
    document.getElementById('cidade').disabled = false;
    document.getElementById('idPerfil').disabled = false;
    document.getElementById('login').disabled = false;
    document.getElementById('senha').disabled = false;
  }
  else{
      //Desabilita
    document.getElementById('nomeCompleto').disabled = true;
    document.getElementById('cpf').disabled = true;
    document.getElementById('rg').disabled = true;
    document.getElementById('orgaoExpedidor').disabled = true;  
    
    document.getElementById('razaoSocial').disabled = true;
    document.getElementById('nomeFantasia').disabled = true;
    document.getElementById('cnpj').disabled = true;
    document.getElementById('tipoEmpresa').disabled = true;  
    
    document.getElementById('email').disabled = true;
    document.getElementById('telefone1').disabled = true;
    document.getElementById('telefone2').disabled = true;
    document.getElementById('logradouro').disabled = true; 
    document.getElementById('bairro').disabled = true;
    document.getElementById('numero').disabled = true;
    document.getElementById('complemento').disabled = true;
    document.getElementById('cep').disabled = true;
    document.getElementById('estado').disabled = true;
    document.getElementById('cidade').disabled = true;
    document.getElementById('idPerfil').disabled = true;
    document.getElementById('login').disabled = true;
    document.getElementById('senha').disabled = true;
  } 
}