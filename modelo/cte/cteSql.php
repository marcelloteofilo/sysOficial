<?php
  require_once("/../banco.php");  
  require_once("cte.php");  

 class CteSql { 

 	/*public static function adicionar(Cte $cte) {

 		$conexao 				= Conexao::getInstance()->getConexao();

 		$numeroCte 				= mysql_real_escape_string($cte->getNumeroCte(), $conexao);  
 		$codigoCarga			= mysql_real_escape_string($cte->getCodigoCarga(), $conexao); 
 		$codigoRota				= mysql_real_escape_string($cte->getCodigoRota(), $conexao); 
 		$situacao				= mysql_real_escape_string($cte->getSituacao(), $conexao);
 		$chaveAcesso			= mysql_real_escape_string($cte->getChaveAcesso(), $conexao);
 		$statusCte				= mysql_real_escape_string($cte->getStatusCte(), $conexao);
 		$emissao				= mysql_real_escape_string($cte->getEmissao(), $conexao);  
	  	
	  	$sql = "insert into cte (numcte, codCarga, codRota, situacao,
	  				chaveAcesso, statuscte, emissao) values ($numeroCte, $codigoCarga,
	  					 $codigoRota, '$situacao', '$status', '$chaveAcesso','$statusCte,'$emissao')"; 

      	$resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);  
 	}

 	public static function alterar(Cte $cte) {

 		$conexao 				= Conexao::getInstance()->getConexao();

 		$numeroCte 				= mysql_real_escape_string($cte->getNumeroCte(), $conexao);  
 		$codigoCarga			= mysql_real_escape_string($cte->getCodigoCarga(), $conexao); 
 		$codigoRota				= mysql_real_escape_string($cte->getCodigoRota(), $conexao); 
 		$situacao				= mysql_real_escape_string($cte->getSituacao(), $conexao);
 		$chaveAcesso			= mysql_real_escape_string($cte->getChaveAcesso(), $conexao);
 		$statusCte				= mysql_real_escape_string($cte->getStatusCte(), $conexao);
 		$emissao				= mysql_real_escape_string($cte->getEmissao(), $conexao);

 		$sql = "update cte set numcte=$numeroCte, codCarga=$codigoCarga,
 					 codRota=$codigoRota, situacao='$situacao', chaveAcesso='chaveAcesso',
 					 	 statuscte='$statusCte', emissao='$emissao' where numcte=$numeroCte";

	    $resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
 	}

 	public static function deletar(Cte $cte) {

 		$conexao 				= Conexao::getInstance()->getConexao();

 		$numeroCte 				= mysql_real_escape_string($cte->getNumeroCte(), $conexao);  

	  	$sql = "delete from cte where numcte=$numeroCte";
      
      	$resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
 	}*/

 	public static function carregarLista() {

 		$conexao = Conexao::getInstance()->getConexao();

 		$rs = mysql_query('select * from ctes');

		$result = array();

		while($row = mysql_fetch_array($rs)) {

			$objCte = new Cte();
			$objCte->setNumeroCte($row['numcte']);
			$objCte->setCodigoCarga($row['codCarga']);
			$objCte->setCodigoRota($row['codFrete']);
			$objCte->setSituacao($row['situacao']);
			$objCte->setChaveAcesso($row['chaveAcesso']);
			$objCte->setStatusCte($row['statuscte']);
			$objCte->setEmissao($row['emissao']);
			$objCte->setChaveCgm($row['chave_gcm']);
			$result[] = $objCte;
		}

		return $result;
 	}


 	public static function alterar(Cte $cte) {

 		$conexao 				= Conexao::getInstance()->getConexao();

 		$numeroCte 				= mysql_real_escape_string($cte->getNumeroCte(), $conexao);  
 		//$codigoCarga			= mysql_real_escape_string($cte->getCodigoCarga(), $conexao); 
 		$codigoRota				= mysql_real_escape_string($cte->getCodigoRota(), $conexao); 
 		$situacao				= mysql_real_escape_string($cte->getSituacao(), $conexao);
 		$chaveAcesso			= mysql_real_escape_string($cte->getChaveAcesso(), $conexao);
 		$statusCte				= mysql_real_escape_string($cte->getStatusCte(), $conexao);
 		$emissao				= mysql_real_escape_string($cte->getEmissao(), $conexao);
 		$chaveCgm 				= mysql_real_escape_string($cte->getChaveCgm(), $conexao);

 		$sql = "update ctes set codFrete=$codigoRota, situacao='$situacao', chaveAcesso='$chaveAcesso',
 					 	 statuscte='$statusCte', emissao='$emissao', chave_gcm='$chaveCgm' where numcte=$numeroCte";
echo($sql);
	    $resultado = @mysql_query($sql, $conexao);

      	return ($resultado === true);
 	}



 	

 }

?> 