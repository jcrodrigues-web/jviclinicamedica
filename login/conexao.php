<?php
	$server = "localhost";
	$usr = "root";
	$pass = "";
	$bdname = "clinica";
	
	$conexao = mysqli_connect ($server, $usr, $pass, $bdname) or die ("Erro na conexão"); 
?>