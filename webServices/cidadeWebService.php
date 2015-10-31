<?php
	require_once("../modelo/cidade/cidadeSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	//CONSULTA CLIENTES
	if (isset($_GET["consultaCidades"])) {			
		$consulta = new Cidade();	
		if(isset($_GET["consultaUf"])){
			$consulta->setUf($consultaUf); 
		} 				
		
		$listaCidades = CidadeSql::localizar($consulta);				
		for ($i=0; $i<count($listaCidades); $i++ ){					
			$resultado[] = array(				
				'codigo'	=>  $listaCidades[$i]->getCodigo(),				
				'descricao'	=>  $listaCidades[$i]->getDescricao(),				
				'uf'	=>  $listaCidades[$i]->getUf(),									
			);
		}				
		
		echo( json_encode( $resultado ) );				
	}		
?>
	
	