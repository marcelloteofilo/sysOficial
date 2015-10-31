<?php
	require_once("../modelo/frete/freteSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	
if ($_GET["editSave"] == "incluirFrete"){	
		$frete = new Frete();	

		//Atributos da classe Usuário/Valores 
		//$frete->setCodFrete($_REQUEST['codFrete']);

		$frete->setCodMotorista($_REQUEST['codMotorista']);
		$frete->setCodVeiculo($_REQUEST['codVeiculo']);

		$frete->setUfDestino($_REQUEST['ufDestino']);
		$frete->setUfOrigem($_REQUEST['ufOrigem']);
		$frete->setCidadeOrigem($_REQUEST['cidadeOrigem']);
		$frete->setCidadeDestino($_REQUEST['cidadeDestino']);

		$frete->setStatusFrete($_REQUEST['statusFrete']);
		$frete->setCodTransp($_REQUEST['codTransp']);



		if (freteSql::incluirFrete($frete)){
			echo json_encode(array('success'=>true));
		}	
		
		//echo(json_encode($resultado ));						
	}

	if ($_GET["editSave"] == "alterarFrete"){	
		$frete = new Frete();	

		//Atributos da classe Usuário/Valores 
		$frete->setCodFrete($_REQUEST['codFrete']);

		$frete->setCodMotorista($_REQUEST['codMotorista']);
		$frete->setCodVeiculo($_REQUEST['codVeiculo']);

		$frete->setUfDestino($_REQUEST['ufDestino']);
		$frete->setUfOrigem($_REQUEST['ufOrigem']);
		$frete->setCidadeOrigem($_REQUEST['cidadeOrigem']);
		$frete->setCidadeDestino($_REQUEST['cidadeDestino']);

		$frete->setStatusFrete($_REQUEST['statusFrete']);
		$frete->setCodTransp($_REQUEST['codTransp']);



		if (freteSql::alterarFrete($frete)){
			echo json_encode(array('success'=>true));
		}	
		
		//echo(json_encode($resultado ));						
	}
	
	if ($_GET["editSave"] == "carregarTodos") {

		$frete = new Frete();

		$listaFrete = freteSql::carregarLista($frete);
		
		for ($i=0; $i<count($listaFrete); $i++ ){											
			$resultado[] = array(
			    'codFrete'	=>  $listaFrete[$i]->getCodFrete(),

			    'codMotorista'	=>  $listaFrete[$i]->getCodMotorista(),
			    'nomeMotorista'	=>  $listaFrete[$i]->getNomeMotorista(),

				'codVeiculo'	=>  $listaFrete[$i]->getCodVeiculo(),
				'placaVeiculo'	=>  $listaFrete[$i]->getPlacaVeiculo(),	

			    'ufDestino'	=>  $listaFrete[$i]->getUfDestino(),	
				'ufOrigem'	=>  $listaFrete[$i]->getUfOrigem(),		
				'cidadeOrigem'	=>  $listaFrete[$i]->getCidadeOrigem(),	
				'cidadeDestino'	=>  $listaFrete[$i]->getCidadeDestino(),					

				'statusFrete'	=>  $listaFrete[$i]->getStatusFrete(),					
				'codTransp'	=>   $listaFrete[$i]->getCodTransp(),								
			);
		}
			//var_dump($resultado);
		    //die;

		echo(json_encode($resultado));	
		return $resultado;	
	}
	

?>