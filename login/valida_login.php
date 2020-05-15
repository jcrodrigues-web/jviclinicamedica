<?php
session_start();
include_once ("../conexao.php");

$usuariot = $_POST['usuario'];
$senhat = $_POST['senha'];

$result = "SELECT * FROM usuarios WHERE login='$usuariot' AND senha='$senhat' LIMIT 1";
$resultado = mysqli_query ($conexao, $result);
$resultado_login = mysqli_fetch_assoc($resultado);

if (empty($resultado_login)) {
	//Mensagem de error
	$_SESSION['loginErro'] = "Usuário ou senha inválido";
	
	//Redirecionar o usuário para a tela de login
	header ("Location: login.php");
} else {
	//Define os valores atribuidos na sessão do usuário.
	$_SESSION ['usuarioId'] = $resultado_login['id'];
	$_SESSION['usuarioNome'] = $resultado_login['nome'];
	$_SESSION['usuarioNivelAcesso'] = $resultado_login['nivel_acesso_id'];
	$_SESSION['usuarioLogin'] = $resultado_login['login'];
	$_SESSION['usuarioSenha'] = $resultado_login['senha'];
	
	if ($_SESSION['usuarioNivelAcesso'] == 1) {
		header ("Location: ../tela_inicial/tela_principal_administrador.php");
	}elseif ($_SESSION['usuarioNivelAcesso'] == 2) {
		header("Location: ../tela_inicial/tela_principal_atendimento.php");
	}elseif ($_SESSION['usuarioNivelAcesso'] == 3) {
		header("Location: ../tela_inicial/tela_principal_medico.php");
	}
}
?>