<?php
  require_once("banco.php");  
  require_once("coleta.php");  

  class ColetaSql {   
     


    public static function carregarLista(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cl.*,
					nomeMotorista.nomeCompleto as nomeMotorista,
					nomeMotorista.telefone1 as telefoneMotorista,
					placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$coleta = new Coleta();
				$coleta->setCodColeta($row["codColeta"]);
				$coleta->setCodCarga($row["codCarga"]);

				//
				$coleta->setCodMotorista($row["codMotorista"]);
				$coleta->setNomeMotorista($row["nomeMotorista"]);
				$coleta->setTelefoneMotorista($row["telefoneMotorista"]);

				$coleta->setCodVeiculo($row["codVeiculo"]);
				$coleta->setPlacaVeiculo($row["placaVeiculo"]);

				//
				//$dataFormatada = explode("-", $row['data']);
				//$dataBrasileira = $dataFormatada[2]."/".$dataFormatada[1]."/".$dataFormatada[0];

				$coleta->setData($row["data"]);
				$coleta->setHora($row["hora"]);
				//
				$coleta->setColetada($row["coletada"]);
				$coleta->setTelefone($row["telefone"]);
				$coleta->setLogradouro($row["logradouro"]);
				$coleta->setBairro($row["bairro"]);
				$coleta->setNumero($row["numero"]);
				$coleta->setEstado($row["uf"]);
				$coleta->setCidade($row["cidade"]);
				$coleta->setObservacao($row["observacao"]);


			
				$retorno[] = $coleta;
         }
        
        return ($retorno);
      } 
      else
        return null;
    }

    public static function carregarListaAprovados(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cl.*,
					nomeMotorista.nomeCompleto as nomeMotorista,
					nomeMotorista.telefone1 as telefoneMotorista,
					placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga
							where coletada.coletada  = "Aprovado"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$coleta = new Coleta();
				$coleta->setCodColeta($row["codColeta"]);
				$coleta->setCodCarga($row["codCarga"]);

				//
				$coleta->setCodMotorista($row["codMotorista"]);
				$coleta->setNomeMotorista($row["nomeMotorista"]);
				$coleta->setTelefoneMotorista($row["telefoneMotorista"]);

				$coleta->setCodVeiculo($row["codVeiculo"]);
				$coleta->setPlacaVeiculo($row["placaVeiculo"]);

				//
				$coleta->setData($row["data"]);
				$coleta->setHora($row["hora"]);

				//
				$coleta->setColetada($row["coletada"]);
				$coleta->setTelefone($row["telefone"]);
				$coleta->setLogradouro($row["logradouro"]);
				$coleta->setBairro($row["bairro"]);
				$coleta->setNumero($row["numero"]);
				$coleta->setEstado($row["uf"]);
				$coleta->setCidade($row["cidade"]);
				$coleta->setObservacao($row["observacao"]);
			
				$retorno[] = $coleta;
         }
        return ($retorno);
      } 
      else
        return null;
    }

    public static function carregarListaColetadas(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select cl.*,
					nomeMotorista.nomeCompleto as nomeMotorista,
					nomeMotorista.telefone1 as telefoneMotorista,
					placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga
							where coletada.coletada  = "Coletado"';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$coleta = new Coleta();
				$coleta->setCodColeta($row["codColeta"]);
				$coleta->setCodCarga($row["codCarga"]);

				//
				$coleta->setCodMotorista($row["codMotorista"]);
				$coleta->setNomeMotorista($row["nomeMotorista"]);
				$coleta->setTelefoneMotorista($row["telefoneMotorista"]);

				$coleta->setCodVeiculo($row["codVeiculo"]);
				$coleta->setPlacaVeiculo($row["placaVeiculo"]);

				//
				$coleta->setData($row["data"]);
				$coleta->setHora($row["hora"]);

				//
				$coleta->setColetada($row["coletada"]);
				$coleta->setTelefone($row["telefone"]);
				$coleta->setLogradouro($row["logradouro"]);
				$coleta->setBairro($row["bairro"]);
				$coleta->setNumero($row["numero"]);
				$coleta->setEstado($row["uf"]);
				$coleta->setCidade($row["cidade"]);
				$coleta->setObservacao($row["observacao"]);
			
				$retorno[] = $coleta;
         }
        return ($retorno);
      } 
      else
        return null;
    }


     public static function alterarColeta(Coleta $coleta) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codColeta = mysql_real_escape_string($coleta->getCodColeta(), $conexao);
	  $coletada = mysql_real_escape_string($coleta->getColetada(), $conexao); 
	  $codCarga = mysql_real_escape_string($coleta->getCodCarga(), $conexao); 

	  $codMotorista = mysql_real_escape_string($coleta->getCodMotorista(), $conexao);
	  $codVeiculo = mysql_real_escape_string($coleta->getCodVeiculo(), $conexao);

	  $data = mysql_real_escape_string($coleta->getData(), $conexao); 

	  $dataFormatada = explode("/", $data);		
	  $dataAmericana = $dataFormatada[2]."-".$dataFormatada[1]."-".$dataFormatada[0];

	  $hora = mysql_real_escape_string($coleta->getHora(), $conexao); 
	  $coleta = mysql_real_escape_string($coleta->getColetada(), $conexao);
	  $numCte = rand(111111,999999); 

   	  
	  
	   
	   //Inseri uma CTE 
      if($coletada === "Coletado"){
      	$sqlTres    = "insert into ctes (numcte, codCarga, codFrete) values ($numCte ,$codCarga, 1)";
      	mysql_query($sqlTres, $conexao);
  	  }

	  //Atualiza a Carga Relacionada
      $sqlDois = "update cargas set coletada='$coletada' where codCarga=$codCarga";
      mysql_query($sqlDois, $conexao);
          

      //Atualiza a Coleta
	  $sql = "update coleta 
	  			set 
		  			codMotorista=$codMotorista,
		  			codVeiculo=$codVeiculo,
		  			data='$dataAmericana',
		  			hora='$hora'
	  			where 
	  				codColeta=$codColeta";
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);

    }

  }
?>
