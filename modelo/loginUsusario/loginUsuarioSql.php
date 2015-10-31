<?php
  require_once("/../banco.php");  
  require_once("loginUsuario.php");  

  class LoginUsuarioSql 
  {  
  
     public static function adicionar(LoginUsuario $u) 
	{
      $conexao = Conexao::getInstance()->getConexao();     
      $login = mysql_real_escape_string($u->getLogin(), $conexao);
	  $senha = mysql_real_escape_string($u->getSenha(), $conexao);
	  
	  
	  $sql = "insert into usuarios (login, senha) 
	  values ($login,$senha )";	  -
      $resultado = @mysql_query($sql, $conexao);
      return ($resultado === true);
    }
	
  }
?>
