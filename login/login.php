<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tela de Login">
    <meta name="author" content="Júlio César">
    <meta name="generator" content="Jekyll v3.8.5">
	<link rel="icon" href="../img/favicon.ico">
    <title>Login do usuário</title>
	<!-- ****** Bootstrap CSS ******-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="../css/signin.css" rel="stylesheet">
	<!-- ****** Bootstrap JavaScript e JQuery ******-->
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.slim.min.js"></script>
	<script src="../js/popper.min.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body class="text-center">
	<?php
		unset ( 
			$_SESSION ['usuarioId'],
			$_SESSION['usuarioNome'],
			$_SESSION['usuarioNivelAcesso'],
			$_SESSION['usuarioLogin'],
			$_SESSION['usuarioSenha']);	
	?>
  
  <div class="container">
    <form class="form-signin" method="POST" action="valida_login.php">	
		<img class="mb-4" src="../img/logo.png" alt="" width="200">
		<h1 class="h3 mb-3 font-weight-normal">Acesso do Usuário</h1>
		<label for="usuario" class="sr-only">Endereço de email</label>
		<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Login do Usuário"> <!--required autofocus --><br>
		<label for="senha" class="sr-only">Senha</label>
		<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
		<div class="checkbox mb-3">
		<label>
		<input type="checkbox" value="remember-me"> Esqueceu a senha?
		</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	</form>
	
	<p class="text-center text-danger">
		<?php
			if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}
		?>
	</p>
	</div>
  </body>
</html>