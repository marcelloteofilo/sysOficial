<?php
	session_start();   	
	extract ($_REQUEST);
	extract ($_SESSION);
	require_once("../modelo/usuario/usuarioSql.php");   	
	
	
	

	//CONSULTA USUÁRIO
	if (isset($_GET["incluirUsuario"])) {			
	//if ($_GET["editSave"] == "incluirUsuario"){		
		//Classe de Usuário
		$usuario = new Usuario();	

		//Atributos da classe Usuário/Valores 
		$usuario->setPerfil($perfil);
		$usuario->setStatus($status); 
		$usuario->setNomeCompleto($nomeCompleto); 
		$usuario->setRazaoSocial($razaoSocial); 
		$usuario->setnomeFantasia($nomeFantasia); 
		$usuario->setTipoEmpresa($tipoEmpresa); 
		$usuario->setRg($rg); 
		$usuario->setOrgaoExpedidor($orgaoExpedidor); 
		$usuario->setCpf($cpf); 
		$usuario->setCnpj($cnpj); 

		$usuario->setEmail($email); 
		$usuario->setTelefone1($telefone1); 
		$usuario->setTelefone2($telefone2); 
		$usuario->setLogradouro($logradouro); 
		$usuario->setBairro($bairro); 
		$usuario->setComplemento($complemento); 
		$usuario->setNumero($numero); 
		$usuario->setCep($cep); 
		$usuario->setEstado($estado); 
		$usuario->setCidade($cidade);

		$usuario->setLogin($login); 
		$usuario->setSenha($senha); 				
		
		if (UsuarioSql::adicionar($usuario)){
			$resultado[] = array(				
				'oka'	=>  'oks',						
			);
		}	
		
		//echo(json_encode($resultado ));	
		die;
	}


	if ($_GET["editSave"] == "adicionarUsuario"){	

		//Classe de Usuário
		$usuario = new Usuario();	

		//Atributos da classe Usuário/Valores 
		$usuario->setStatus($_REQUEST['status']); 
		$usuario->setPerfil($_REQUEST['perfil']); 
		$usuario->setNomeCompleto($_REQUEST['nomeCompleto']); 
		$usuario->setRazaoSocial($_REQUEST['razaoSocial']); 
		$usuario->setnomeFantasia($_REQUEST['nomeFantasia']); 
		$usuario->setTipoEmpresa($_REQUEST['tipoEmpresa']); 
		$usuario->setRg($_REQUEST['rg']); 
		$usuario->setOrgaoExpedidor($_REQUEST['orgaoExpedidor']); 
		$usuario->setCpf($_REQUEST['cpf']); 
		$usuario->setCnpj($_REQUEST['cnpj']); 

		$usuario->setEmail($_REQUEST['email']); 
		$usuario->setTelefone1($_REQUEST['telefone1']); 
		$usuario->setTelefone2($_REQUEST['telefone2']); 
		$usuario->setLogradouro($_REQUEST['logradouro']); 
		$usuario->setBairro($_REQUEST['bairro']); 
		$usuario->setComplemento($_REQUEST['complemento']); 
		$usuario->setNumero($_REQUEST['numero']); 
		$usuario->setCep($_REQUEST['cep']); 
		$usuario->setEstado($_REQUEST['estado']); 
		$usuario->setCidade($_REQUEST['cidade']); 


		$usuario->setLogin($_REQUEST['login']); 
		$usuario->setSenha($_REQUEST['senha']); 				
		

		if (UsuarioSql::adicionar($usuario)){
			echo json_encode(array('success'=>true));
			/*$resultado[] = array(				
				'oka'	=>  'oks',						
			);*/			
		}	
		
		/*if ($resultado){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Erro ao inserir dados.'));
		}*/
		//echo(json_encode($resultado));	
	}
	if ($_GET["editSave"] == "alterarUsuario"){
		
	
		$usuario = new Usuario();

		//Atributos da classe Usuário/Valores
		$usuario->setId($_REQUEST['id']);

		$usuario->setStatus($_REQUEST['status']); 
		$usuario->setPerfil($_REQUEST['perfil']); 

		$usuario->setNomeCompleto($_REQUEST['nomeCompleto']);
		$usuario->setRg($_REQUEST['rg']); 
		$usuario->setOrgaoExpedidor($_REQUEST['orgaoExpedidor']); 
		$usuario->setCpf($_REQUEST['cpf']); 

		$usuario->setRazaoSocial($_REQUEST['razaoSocial']);  
		$usuario->setnomeFantasia($_REQUEST['nomeFantasia']);
		$usuario->setTipoEmpresa($_REQUEST['tipoEmpresa']);
		$usuario->setCnpj($_REQUEST['cnpj']);

		$usuario->setEmail($_REQUEST['email']); 
		$usuario->setTelefone1($_REQUEST['telefone1']); 
		$usuario->setTelefone2($_REQUEST['telefone2']); 
		$usuario->setLogradouro($_REQUEST['logradouro']); 
		$usuario->setBairro($_REQUEST['bairro']); 
		$usuario->setComplemento($_REQUEST['complemento']); 
		$usuario->setNumero($_REQUEST['numero']); 
		$usuario->setCep($_REQUEST['cep']);
		$usuario->setEstado($_REQUEST['estado']); 
		$usuario->setCidade($_REQUEST['cidade']);  

		$usuario->setLogin($_REQUEST['login']); 
		$usuario->setSenha($_REQUEST['senha']); 				
		

		if (UsuarioSql::alterar($usuario)){
			echo json_encode(array('success'=>true));
	
			/*$resultado[] = array(				
				'result'	=>  true,						
			);	*/		
		}	
		
		//echo(json_encode($resultado ));

	}
	
	if ($_GET["editSave"] == "removerUsuario"){
		//Classe de Usuário
		$usuario = new Usuario();	

		//Atributos da classe Usuário/Valores
		$usuario->setId($_REQUEST['id']);

		if (UsuarioSql::deletar($usuario)){
			echo json_encode(array('success'=>true));
			/*$resultado[] = array(				
				'oka'	=>  'oks',						
			);*/			
		}		
	}
	if ($_GET["editSave"] == "carrefarUsuario"){		

		
		$usuario = new Usuario();
		if (isset($_GET["nomeCompleto"]))
			$usuario->setNomeCompleto($nomeCompleto); 		
		$listaUsuario = usuarioSql::carregarLista($usuario);
		
		for ($i=0; $i<count($listaUsuario); $i++ ){											
			$resultado[] = array(
			    'id'	=>  $listaUsuario[$i]->getId(),					
				'status'	=>  $listaUsuario[$i]->getStatus(),					
				'perfil'	=>   $listaUsuario[$i]->getPerfil(),				
				'nomeCompleto'	=>  $listaUsuario[$i]->getNomeCompleto(),				
				'rg'	=>   $listaUsuario[$i]->getRg(),				
				'orgaoExpedidor'	=>  $listaUsuario[$i]->getOrgaoExpedidor(),
				'cpf'	=>  $listaUsuario[$i]->getCpf(),
				'razaoSocial'	=>  $listaUsuario[$i]->getRazaoSocial(),					
				'nomeFantasia'	=>   $listaUsuario[$i]->getnomeFantasia(),				
				'tipoEmpresa'	=>   $listaUsuario[$i]->getTipoEmpresa(),				
				'cnpj'	=>  $listaUsuario[$i]->getCnpj(),
				'email'	=>  $listaUsuario[$i]->getEmail(),
				'telefone1'	=>  $listaUsuario[$i]->getTelefone1(),					
				'telefone2'	=>   $listaUsuario[$i]->getTelefone2(),				
				'logradouro'	=>  $listaUsuario[$i]->getLogradouro(),				
				'bairro'	=>   $listaUsuario[$i]->getBairro(),				
				'numero'	=>  $listaUsuario[$i]->getNumero(),
				'complemento'	=>  $listaUsuario[$i]->getComplemento(),
				'estado'	=>  $listaUsuario[$i]->getEstado(),
				'cidade'	=>  $listaUsuario[$i]->getCidade(),
				'cep'	=>   $listaUsuario[$i]->getCep(),				
				'login'	=>  $listaUsuario[$i]->getLogin(),		
				'senha'	=>  $listaUsuario[$i]->getLogin(),						
					
			);
		}
			//var_dump($resultado);
		//die;
		echo( json_encode( $resultado ) );	
		return $resultado;
	}

?>
	
	