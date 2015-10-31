<?php
	require_once("../modelo/usuario/usuarioSql.php");
	require_once("../modelo/veiculo/veiculoSql.php"); 
	require_once("../modelo/frete/freteSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	
//echo("aqui");
	//CONSULTA CLIENTES
	if (isset($_GET["consultaMotorista"])) {			
		$usuario = new Usuario();				
		
		$listaMotoristas = usuarioSql::localizarMotorista($usuario);				
		for ($i=0; $i<count($listaMotoristas); $i++ ){					
			$resultado[] = array(				
				'id'	=>  $listaMotoristas[$i]->getId(),				
				'nomeCompleto'	=>  $listaMotoristas[$i]->getNomeCompleto(),				
			);
		}				
		
		echo( json_encode( $resultado ) );				
	}

	if (isset($_GET["consultaVeiculo"])) {			
		$veiculo = new Veiculo();				
		
		$listaVeiculo = veiculoSql::localizarVeiculo($veiculo);				
		for ($i=0; $i<count($listaVeiculo); $i++ ){					
			$resultado[] = array(				
				'id'	=>  $listaVeiculo[$i]->getIdVeiculo(),				
				'placa'	=>  $listaVeiculo[$i]->getPlaca(),				
			);
		}				
		
		echo( json_encode( $resultado ) );				
	}

	if (isset($_GET["consultaFrete"])) {			
		$frete = new Frete();				
		
		$listaFrete = freteSql::localizarFrete($frete);				
		for ($i=0; $i<count($listaFrete); $i++ ){					
			$resultado[] = array(				
				'codFrete'	=>  $listaFrete[$i]->getCodFrete(),				
				'codTransp'	=>  $listaFrete[$i]->getCodTransp(),				
			);
		}				
		
		echo( json_encode( $resultado ) );				
	}					
?>
	
	