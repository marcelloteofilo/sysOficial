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