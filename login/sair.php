<?php
	session_start();
	session_destroy();
	
	//Remover todas as informações das variáveis globais
	unset ( 
	$_SESSION ['usuarioId'],
	$_SESSION['usuarioNome'],
	$_SESSION['usuarioNivelAcesso'],
	$_SESSION['usuarioLogin'],
	$_SESSION['usuarioSenha']);	
	
	//Redireciona o usuário para a tela de login
	header ("Location: login.php");

?>