//----------------MASCARA DE CPF COM VALIDAÇÃO--------------------------------
function validarCPF( cpf ){
	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
	
	if(!filtro.test(cpf))
	{
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
	}
   
	cpf = remove(cpf, ".");
	cpf = remove(cpf, "-");
	
	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
		cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
		cpf == "88888888888" || cpf == "99999999999")
	{
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
   }

	soma = 0;
	for(i = 0; i < 9; i++)
	{
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}
	
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	if(resto != parseInt(cpf.charAt(9))){
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
	}
	
	soma = 0;
	for(i = 0; i < 10; i ++)
	{
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	
	if(resto != parseInt(cpf.charAt(10))){
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
	}
	
	return true;
 }
 
function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}
	
	return r;
}


function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function cpf_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
	return v
}
//----------------MASCARA DE CPF COM VALIDAÇÃO--------------------------------


//--------------------MASCARA DE RG------------------------------------------
function Rg(v){
        v=v.replace(/\D/g,"");                                     
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");             
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");   
        v=v.replace(/(\d)(\d)$/,"$1-$2");              
      return v
}
//--------------------MASCARA DE RG------------------------------------------


//-------------------MASCARA CEP-------------------------
function mascaraCep(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
//-------------------MASCARA CEP-------------------------


//--------------------VALIDANDO SENHA------------------------------
function verificacaoSenha(){
	var senha = document.getElementById('senha').value;		
	var confirmaSenha = document.getElementById('confirmaSenha').value;			

	if (senha != confirmaSenha) {
		window.alert('Senhas diferentes');
		//senha.focus();
		document.getElementById('senha').focus();			
		document.getElementById('confirmaSenha').value ="";		
		document.getElementById('senha').value ="";			
		return false;
		
	}
}
//--------------------VALIDANDO SENHA------------------------------

//----------------------VALIDAÇÃO DE LETRAS E NUMEROS--------------------------
function validar(dom,tipo){
	switch(tipo){
		case'num':var regex=/[A-Za-z]/g;break;
		case'text':var regex=/\d/g;break;
	}
	dom.value=dom.value.replace(regex,'');
}
//----------------------VALIDAÇÃO DE LETRAS--------------------------


//------------------------MASCARA PARA TELEFONE RESIDENCIAL E CELULAR-------------------------
function telefoneMascara(telefone){ 
   if(telefone.value.length == 0)
     telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(telefone.value.length == 3)
      telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(telefone.value.length == 9)
     telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
  
}
//------------------------MASCARA PARA TELEFONE RESIDENCIAL E CELULAR-------------------------


function MascaraCNPJ(cnpj){
	var cnpj = document.getElementById('cnpj').value;
	
    if(cnpj(cnpj)==""){

        event.returnValue = false;

    }    

    return formataCampo(cnpj, '00.000.000/0000-00', event);

}

function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].data.value = data;
                  return true;
              }
}


function formatar(src, mask){
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
  {
    src.value += texto.substring(0,1);
  }
}

// MUDAR A COR DA CAIXA DE TEXTO E COLOCA TUDO EM MAIUSCULO
	function focus_Blur(me, cor) {	 
	  me.style.background = cor;	 
	  me.style.color = "black";	
	  var minusculo = new String(me.value);
	  var maiusculo = minusculo.toUpperCase();
	  me.value = maiusculo;	  
	}	
		
	//VALIDAÇÃO DE DINHEIRO
	function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
      var sep = 0;
      var key = '';
      var i = j = 0;
      var len = len2 = 0;
      var strCheck = '0123456789';
      var aux = aux2 = '';
      var whichCode = (window.Event) ? e.which : e.keyCode;
       if (whichCode == 13) return true;
      key = String.fromCharCode(whichCode); // Valor para o código da Chave
      if (strCheck.indexOf(key) == -1) return false; // Chave inválida
      len = objTextBox.value.length;
      for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
        aux = '';
      for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
        aux += key;
        len = aux.length;
      if (len == 0) objTextBox.value = '';
      if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
      if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
      if
	  (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
      }
      return false;
    }

	//FORMATA DE FORMA GENERICA OS CAMPOS
    function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 
        
        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 
        
        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
    }		
	
	//VALIDA NUMERO SE É INTEIRO
    function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
    }	 

	//ADICIONA MASCARA DE DATA
    function mascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
     } 
	 

	// EXIBE MENSAGEM PARA DATA INVÁLIDA
	function mensagemData(data){	  
	  if (verificaData(data)==false){
	    alert ('A Data Digitada e Invalida!');	
	  } 
	}		

	//TESTA DATA DIGITADA
	function verificaData(cData) {
        var data = cData.value;       
        var dia = data.substr(0,2)
        var mes = data.substr (3,2)
        var ano = data.substr (6,4)     
        if (ano < 1900) {
          return false;
        }
        if (ano > 2050)     {
         return false;
        }
        switch (mes) {
          case '01':
        if  (dia <= 31) 
         return (true);
         break;
          case '02':
        if  (dia <= 29) 
         return (true);
         break;
          case '03':
        if  (dia <= 31) 
         return (true);
         break;
          case '04':
        if  (dia <= 30) 
         return (true);
         break;
          case '05':
        if  (dia <= 31) 
         return (true);
         break;
          case '06':
        if  (dia <= 30) 
         return (true);
         break;
         case '07':
        if  (dia <= 31) 
         return (true);
         break;
         case '08':
        if  (dia <= 31) 
         return (true);
         break;
         case '09':
        if  (dia <= 30) 
         return (true);
         break;
         case '10':
        if  (dia <= 31) 
         return (true);
         break;
         case '11':
        if  (dia <= 30) 
         return (true);
         break;
         case '12':
        if  (dia <= 31) 
         return (true);
         break;
        }
        {
          return false;
        }
        return true; 
    }
	
	  //FORMATAR MOEDA
	function moeda(valor, casas, separdor_decimal, separador_milhar){ 
	 
	 var valor_total = parseInt(valor * (Math.pow(10,casas)));
	 var inteiros =  parseInt(parseInt(valor * (Math.pow(10,casas))) / parseFloat(Math.pow(10,casas)));
	 var centavos = parseInt(parseInt(valor * (Math.pow(10,casas))) % parseFloat(Math.pow(10,casas)));
	 
	  
	 if(centavos%10 == 0 && centavos+"".length<2 ){
	  centavos = centavos+"0";
	 }else if(centavos<10){
	  centavos = "0"+centavos;
	 }
	  
	 var milhares = parseInt(inteiros/1000);
	 inteiros = inteiros % 1000; 
	 
	 var retorno = "";
	 
	 if(milhares>0){
	  retorno = milhares+""+separador_milhar+""+retorno
	  if(inteiros == 0){
	   inteiros = "000";
	  } else if(inteiros < 10){
	   inteiros = "00"+inteiros; 
	  } else if(inteiros < 100){
	   inteiros = "0"+inteiros; 
	  }
	 }
	  retorno += inteiros+""+separdor_decimal+""+centavos;
	 
	 
	 return retorno;
	 
	}

//mascara para telefone
  function mascara(t, mask){
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)

   if (texto.substring(0,1) != saida)
   {
      t.value += texto.substring(0,1);
    }
  }