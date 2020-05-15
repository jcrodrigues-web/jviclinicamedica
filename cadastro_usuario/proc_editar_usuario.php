<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados editado do formulário
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  $nivel_acesso= filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_STRING);

  // Alterar os dados do formulário no banco de dados  dataNascPacienteReceita
  $result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', login='$login', senha='$senha', nivel_acesso_id='$nivel_acesso' WHERE id='$id'";
  
  $resultado_usuario = mysqli_query($conexao, $result_usuario);
  
  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O usuário foi editado com sucesso </p>";
    header("location: consulta_usuario_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O usuário não foi editado com sucesso </p>";
      header("location: consulta_usuario_administrador.php");
    }

  ?>