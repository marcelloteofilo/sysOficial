<?php
	require_once("../modelo/loginUsuario/loginUsuarioSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	//CONSULTA CLIENTES
	if (isset($_GET["incluirloginUsuario"])) {			
		$loginUsuario = new LoginUsuario();				
		$loginUsuario->setLogin($login);  
		$loginUsuario->setSenha($senha); 
				
		echo('1');
		if (LoginUsuarioSql::adicionar($loginUsuario)){
			$resultado[] = array(				
				'ok'	=>  'ok',						
			);			
		}	
		
		echo( json_encode( $resultado ) );			
	
	}		
?>
	
	