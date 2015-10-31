<?php

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $perfil = $_POST['perfil'];

    $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
    $select = mysql_select_db('systransportes') or die('Sem acesso ao DB, Entre em contato com o Administrador');

    $resultPerfil = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha' AND `perfil`= 'Atendente'");
    $resultPerfilFisica = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha' AND `perfil`= 'Pessoa Fisica'");
    $resultPerfilJuridica = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha' AND `perfil`= 'Pessoa Juridica'");
    
    if (mysql_num_rows($resultPerfil) > 0) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location: ../telaAdminSystem.php');
    }
    else if(mysql_num_rows($resultPerfilFisica) > 0 or mysql_num_rows($resultPerfilJuridica) > 0)
    {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location: ../carga/cargaConsulta.php');
    }
    else
    {
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: login.php');
    }
?>