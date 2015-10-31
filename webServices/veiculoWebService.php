<?php
	require_once("../modelo/veiculo/veiculoSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);


	if ($_GET["editSave"] == "incluirVeiculo"){			
		//Classe de Usuário
		$veiculo = new veiculo();	

		//Atributos da classe Usuário/Valores 
		$veiculo->setPlaca($_REQUEST['placa']); 
		$veiculo->setCapacidadeKg($_REQUEST['capacidadeKg']); 
		$veiculo->setCapacidadeM3($_REQUEST['capacidadeM3']); 
		$veiculo->setAno($_REQUEST['ano']);
		$veiculo->setTipo($_REQUEST['tipo']);
		$veiculo->setUf($_REQUEST['uf']); 
		$veiculo->setCidade($_REQUEST['cidade']);  				
		
		if (VeiculoSql::adicionar($veiculo)){
			echo json_encode(array('success'=>true));
			/*$resultado[] = array(				
				'oka'	=>  'oks',						
			);*/			
		}	
		
		//echo(json_encode($resultado ));			
	}
	
	if ($_GET["editSave"] == "alterarVeiculo"){	
		$veiculo = new veiculo();	

		//Atributos da classe Usuário/Valores 
		$veiculo->setIdVeiculo($_REQUEST['id']); 
		$veiculo->setPlaca($_REQUEST['placa']); 
		$veiculo->setCapacidadeKg($_REQUEST['capacidadeKg']); 
		$veiculo->setCapacidadeM3($_REQUEST['capacidadeM3']); 
		$veiculo->setAno($_REQUEST['ano']);
		$veiculo->setTipo($_REQUEST['tipo']);
		$veiculo->setUf($_REQUEST['uf']); 
		$veiculo->setCidade($_REQUEST['cidade']);  				
		
		if (VeiculoSql::alterar($veiculo)){
			echo json_encode(array('success'=>true));
			/*$resultado[] = array(				
				'oka'	=>  'oks',						
			);	*/		
		}	
		
		//echo(json_encode($resultado ));						
	}	

	
	if ($_GET["editSave"] == "deletarVeiculo"){	
		$veiculo = new veiculo();	

		$veiculo->setIdVeiculo($_REQUEST['id']);  

		if (VeiculoSql::remover($veiculo)){
			echo json_encode(array('success'=>true));
			/*$resultado[] = array(				
				'ok'	=>  'ok',						
			);*/			
		}			
		//echo( json_encode( $resultado ) );				
	}

	
	if ($_GET["editSave"] == "carregarVeiculo") {

		$veiculo = new Veiculo();

		$listaVeiculo = veiculoSql::carregarLista($veiculo);
		
		for ($i=0; $i<count($listaVeiculo); $i++ ){											
			$resultado[] = array(
			    'id'	=>  $listaVeiculo[$i]->getIdVeiculo(),					
				'placa'	=>  $listaVeiculo[$i]->getPlaca(),					
				'capacidadeKg'	=>   $listaVeiculo[$i]->getCapacidadeKg(),				
				'capacidadeM3'	=>  $listaVeiculo[$i]->getCapacidadeM3(),				
				'ano'	=>   $listaVeiculo[$i]->getAno(),				
				'tipo'	=>  $listaVeiculo[$i]->getTipo(),
				'uf'	=>  $listaVeiculo[$i]->getUf(),
				'cidade'	=>  $listaVeiculo[$i]->getCidade(),					
					
					
			);
		}
			//var_dump($resultado);
		//die;
		echo( json_encode( $resultado ) );	
		return $resultado;	
	}

	

?>