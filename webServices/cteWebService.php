<?php
	require_once("../modelo/cte/cteSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	

	/*if ($_GET["editSave"] == "incluirCte") {			
		$cte = new Cte();	

		$cte->setNumeroCte($numeroCte); 
		$cte->setCodigoCarga($codigoCarga); 
		$cte->getCodigoRota($codigoRota); 
		$cte->setSituacao($situacao); 
		$cte->setChaveAcesso($chaveAcesso); 
		$cte->setStatusCte($statusCte); 
		$cte->setEmissao($emissao); 			
		
		if (CteSql::adicionar($cte)) {
			$resultado[] = array(				
					'oka'	=>  'oks',						
			);			
		}			
		echo(json_encode($resultado ));	
	}*/


	if ($_GET["editSave"] == "alterarCte") {	
		$cte = new Cte();	

		$cte->setNumeroCte($_REQUEST['numcte']); 
		$cte->setCodigoRota($_REQUEST['codFrete']); 
		$cte->setSituacao($_REQUEST['situacao']); 
		$cte->setChaveAcesso($_REQUEST['chaveAcesso']); 
		$cte->setStatusCte($_REQUEST['statuscte']); 
		$cte->setEmissao($_REQUEST['emissao']); 	
		$cte->setEmissao($_REQUEST['chave_gcm']); 		


		if (CteSql::alterar($cte)){
			echo json_encode(array('success'=>true));
		}	
	}




	if ($_GET["editSave"] == "carregarCte") {
		
		$cte = new Cte();
		
		$listaCtes = CteSql::carregarLista();

		for ($i=0; $i<count($listaCtes); $i++) {
			$resultado[] = array(				
				'numcte' 				=> $listaCtes[$i]->getNumeroCte(),	
				'codCarga' 		=> $listaCtes[$i]->getCodigoCarga(),
				'codFrete' 		=> $listaCtes[$i]->getCodigoRota(),
				'situacao' 	=> $listaCtes[$i]->getSituacao(),
				'chaveAcesso' 		=> $listaCtes[$i]->getChaveAcesso(),
				'statuscte' 	=> $listaCtes[$i]->getStatusCte(),
				'emissao' 			=> $listaCtes[$i]->getEmissao(),
				'chave_gcm' 			=> $listaCtes[$i]->getChaveCgm(),					
			);
		}	
		echo(json_encode($resultado));		
	}

?>
	
	