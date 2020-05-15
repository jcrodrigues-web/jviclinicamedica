<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados do formulário
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  $nivel_acesso= filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_STRING);


  // Inclusão dos dados do formulário no banco de dados  
  $result_usuario = "INSERT INTO usuarios (nome, email, login, senha, nivel_acesso_id) VALUES 
  ('$nome', '$email', '$login', '$senha', '$nivel_acesso')";
  $resultado_usuario = mysqli_query($conexao, $result_usuario);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O usuário foi cadastrado com sucesso </p>";
    header("location: cadastro_usuario_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O usuário não foi cadastrado com sucesso </p>";
      header("location: cadastro_usuario_administrador.php");
    }

  ?>





