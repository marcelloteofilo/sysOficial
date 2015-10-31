<?php
	require_once ("/../banco.php");
	require_once ("veiculo.php");
	


	class VeiculoSql {
			//Método responsável em adicionar um determinado veículo
		public static function adicionar(Veiculo $veiculo) {
		
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe veiculo sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco
			$placa 				= mysql_real_escape_string($veiculo->getPlaca(), $conexao);
			$capacidadeKg 		= mysql_real_escape_string($veiculo->getCapacidadeKg(), $conexao);
			$capacidadeM3 		= mysql_real_escape_string($veiculo->getCapacidadeM3(), $conexao);
			$ano 				= mysql_real_escape_string($veiculo->getAno(), $conexao);
			$tipo 				= mysql_real_escape_string($veiculo->getTipo(), $conexao);
			$uf 				= mysql_real_escape_string($veiculo->getUf(), $conexao);
			$cidade 			= mysql_real_escape_string($veiculo->getCidade(), $conexao);

			//Inserção na tabela de veiculo relacionada ao banco de dados systransporte
		    $sql    = "insert into veiculos (placa, capacidadeKg, capacidadeM3, ano, tipo,uf,cidade) values ('$placa',
								  '$capacidadeKg', '$capacidadeM3', '$ano', '$tipo','$uf','$cidade')";			
		    $resultado = @mysql_query($sql, $conexao);
		    return ($resultado === true);
		}

		//Método responsável em alterar um determinado veículo
		public static function alterar(Veiculo $veiculo) {
			//Criando a conexão com o banco de dados
			$conexao = Conexao::getInstance()->getConexao();

			//Atributos da classe veiculo sendo definidas em uma variável, obtidas em um método para realização da
			//obtenção do valor e logo em seguida, realizando a chamada do banco	
			$id 				= mysql_real_escape_string($veiculo->getIdVeiculo(), $conexao);
			$placa 				= mysql_real_escape_string($veiculo->getPlaca(), $conexao);
			$capacidadeKg 		= mysql_real_escape_string($veiculo->getCapacidadeKg(), $conexao);
			$capacidadeM3 		= mysql_real_escape_string($veiculo->getCapacidadeM3(), $conexao);
			$ano 				= mysql_real_escape_string($veiculo->getAno(), $conexao);
			$tipo 				= mysql_real_escape_string($veiculo->getTipo(), $conexao);
			$uf 				= mysql_real_escape_string($veiculo->getUf(), $conexao);
			$cidade 			= mysql_real_escape_string($veiculo->getCidade(), $conexao);

			///Alteração na tabela de veiculo relacionada ao banco de dados systransporte
			$sql  = "update veiculos set placa='$placa', capacidadeKg='$capacidadeKg', capacidadeM3='$capacidadeM3',
								  ano='$ano', tipo='$tipo',uf='$uf',cidade='$cidade' where id = $id ";			
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		public static function remover(Veiculo $veiculo) {
			$conexao = Conexao::getInstance()->getConexao();

			$id 				= mysql_real_escape_string($veiculo->getIdVeiculo(), $conexao);

			$sql       			= "delete from veiculos where id = '$id' ";			
		    $resultado = @mysql_query($sql, $conexao);

		    return ($resultado === true);
		}

		public static function carregarLista() {
	      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		  $sql = 'select * from veiculos';
		  
		  $resultado = @mysql_query($sql, $conexao);
		  
		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$veiculo = new Veiculo();
				$veiculo->setIdVeiculo($row["id"]);
				$veiculo->setPlaca($row["placa"]);
				$veiculo->setCapacidadeKg($row["capacidadeKg"]);
				$veiculo->setCapacidadeM3($row["capacidadeM3"]);
				$veiculo->setAno($row["ano"]);
				$veiculo->setTipo($row["tipo"]);
				$veiculo->setUf($row["uf"]);
				$veiculo->setCidade($row["cidade"]);			
				$retorno[] = $veiculo;
         	}
        return ($retorno);
      } 
      else
        return null;
      }
    

    public static function localizarVeiculo(veiculo $veiculo) {
    $conexao = Conexao::getInstance()->getConexao();

	$id = mysql_real_escape_string($veiculo->getIdVeiculo(), $conexao);
	$placa = mysql_real_escape_string($veiculo->getPlaca(), $conexao);

    $sql = 'Select * from veiculos';
   
    $resultado = @mysql_query($sql, $conexao);

    if ($resultado) {

        $retorno = array();
        while ($linha = mysql_fetch_array($resultado)) {
          $veiculo = new Veiculo();          
          $veiculo->setIdVeiculo($linha["id"]);          
		  $veiculo->setPlaca($linha["placa"]);		  		      
		 	
          $retorno[] = $veiculo;
         }
        return ($retorno);
      } else
        return null;
    }
}

    
		
	
?>