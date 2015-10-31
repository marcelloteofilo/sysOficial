<?php
  //require_once("/opt/lampp/htdocs/systransportes/modelo/banco.php");  
  
  require_once("/../banco.php");  
  require_once("cidade.php");  

  class CidadeSql {  

     public static function localizar(Cidade $busca) {
      $conexao = Conexao::getInstance()->getConexao();
	  $uf = mysql_real_escape_string($busca->getUf(), $conexao);	       
      $sql = "Select cidades.codigo, cidades.descricao, cidades.uf from cidades where (1=1)";
	  
	  if ($busca->getUf())
		$sql .= " and cidades.uf like '$uf%'";    
      $resultado = @mysql_query($sql, $conexao);	      
      if ($resultado) {
        $retorno = array();
        while ($linha = mysql_fetch_array($resultado)) {
          $u = new Cidade();          
          $u->setCodigo($linha["codigo"]);          
		  $u->setDescricao($linha["descricao"]);		  		      
          $u->setUf($linha["uf"]);		  		      		  
		 	
          $retorno[] = $u;
         }
        return ($retorno);
      } else
        return null;
    }	
  }
?>
