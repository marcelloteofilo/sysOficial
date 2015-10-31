<?php
  require_once("/../banco.php");  
  require_once("frete.php");  

 class FreteSql {  
  


 	public static function incluirFrete(Frete $frete) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  //$codFrete = mysql_real_escape_string($frete->getCodFrete(), $conexao); 

	  $codVeiculo = mysql_real_escape_string($frete->getCodVeiculo(), $conexao);
	  $codMotorista = mysql_real_escape_string($frete->getCodMotorista(), $conexao);

	  $ufOrigem = mysql_real_escape_string($frete->getUfOrigem(), $conexao);
	  $ufDestino = mysql_real_escape_string($frete->getUfDestino(), $conexao);
	  $cidadeOrigem = mysql_real_escape_string($frete->getCidadeOrigem(), $conexao);
	  $cidadeDestino = mysql_real_escape_string($frete->getCidadeDestino(), $conexao);

	  $statusFrete = mysql_real_escape_string($frete->getStatusFrete(), $conexao);
	  $codTransp = mysql_real_escape_string($frete->getCodTransp(), $conexao);
   
  	  //Update para a tabela de Usuários do banco de dados
      
      $sql    = "insert into frete (codVeiculo, codMotorista, ufOrigem, ufDestino, cidadeOrigem,cidadeDestino,statusFrete,codTransp) values 
      					($codVeiculo,$codMotorista, '$ufOrigem', '$ufDestino', '$cidadeOrigem','$cidadeDestino','$statusFrete','$codTransp')";	
      //echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }


    public static function alterarFrete(Frete $frete) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao();     
	  
	  //Atributo da tabela usuário
	  $codFrete = mysql_real_escape_string($frete->getCodFrete(), $conexao); 

	  $codVeiculo = mysql_real_escape_string($frete->getCodVeiculo(), $conexao);
	  $codMotorista = mysql_real_escape_string($frete->getCodMotorista(), $conexao);

	  $ufOrigem = mysql_real_escape_string($frete->getUfOrigem(), $conexao);
	  $ufDestino = mysql_real_escape_string($frete->getUfDestino(), $conexao);
	  $cidadeOrigem = mysql_real_escape_string($frete->getCidadeOrigem(), $conexao);
	  $cidadeDestino = mysql_real_escape_string($frete->getCidadeDestino(), $conexao);

	  $statusFrete = mysql_real_escape_string($frete->getStatusFrete(), $conexao);
	  $codTransp = mysql_real_escape_string($frete->getCodTransp(), $conexao);
   
  	  //Update para a tabela de Usuários do banco de dados
	  $sql = "update frete set codVeiculo=$codVeiculo,codMotorista=$codMotorista,ufOrigem='$ufOrigem',ufDestino='$ufDestino',cidadeOrigem='$cidadeOrigem',cidadeDestino='$cidadeDestino',statusFrete='$statusFrete',codTransp='$codTransp' where codFrete=$codFrete";
      echo($sql);
      $resultado = @mysql_query($sql, $conexao);

      return ($resultado === true);
    }

	
    public static function carregarLista(Frete $frete) {
      //Conexão com o banco
      $conexao = Conexao::getInstance()->getConexao(); 
		
		$sql = 'select ft.*,
usuarioMotorista.nomeCompleto as nomeMotorista,
veiculo.placa as placaVeiculo
from frete as ft
INNER JOIN usuarios as usuarioMotorista ON ft.codMotorista = usuarioMotorista.id
INNER JOIN veiculos as veiculo ON ft.codVeiculo = veiculo.id';
	    
		$resultado = @mysql_query($sql, $conexao);

		if ($resultado) {
			$retorno = array();
			while ($row = mysql_fetch_array($resultado)) {
				$frete = new Frete();
				$frete->setCodFrete($row["codFrete"]);

				$frete->setCodVeiculo($row["codVeiculo"]);
				$frete->setPlacaVeiculo($row["placaVeiculo"]);

				$frete->setCodMotorista($row["codMotorista"]);
				$frete->setNomeMotorista($row["nomeMotorista"]);

				$frete->setUfDestino($row["ufDestino"]);
				$frete->setUfOrigem($row["ufOrigem"]);
				$frete->setCidadeOrigem($row["cidadeOrigem"]);
				$frete->setCidadeDestino($row["cidadeDestino"]);

				$frete->setStatusFrete($row["statusFrete"]);
				$frete->setCodTransp($row["codTransp"]);

				$retorno[] = $frete;
         }
        return ($retorno);
      } 
      else
        return null;
    }

    public static function localizarFrete(Frete $frete) {
    $conexao = Conexao::getInstance()->getConexao();

	$codFrete = mysql_real_escape_string($frete->getCodFrete(), $conexao);
	$codTransp = mysql_real_escape_string($frete->getCodTransp(), $conexao);

    $sql = 'Select * from frete';
   
    $resultado = @mysql_query($sql, $conexao);

    if ($resultado) {

        $retorno = array();
        while ($linha = mysql_fetch_array($resultado)) {
          $frete = new Frete();          
          $frete->setCodFrete($linha["codFrete"]);          
		  $frete->setCodTransp($linha["codTransp"]);		  		      
		 	
          $retorno[] = $frete;
         }
        return ($retorno);
      } else
        return null;
    }


  }
?>
