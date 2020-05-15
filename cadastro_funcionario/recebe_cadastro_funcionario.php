<?php

  session_start();

  include_once("../conexao.php");

  //Recebendo as informações do formulário 
  $nomeFuncionario = filter_input(INPUT_POST, 'nomeFuncionario', FILTER_SANITIZE_STRING);
  $cpfFuncionario = filter_input(INPUT_POST, 'cpfFuncionario', FILTER_SANITIZE_STRING);
  $dataNascFuncionario = filter_input(INPUT_POST, 'dataNascFuncionario', FILTER_SANITIZE_STRING);
  $funcaoFuncionario = filter_input(INPUT_POST, 'funcaoFuncionario', FILTER_SANITIZE_STRING);
  $telResFuncionario = filter_input(INPUT_POST, 'telResFuncionario', FILTER_SANITIZE_STRING);
  $celularFuncionario = filter_input(INPUT_POST, 'celularFuncionario', FILTER_SANITIZE_STRING);
  $emailFuncionario = filter_input(INPUT_POST, 'emailFuncionario', FILTER_SANITIZE_STRING);
  $enderecoFuncionario = filter_input(INPUT_POST, 'enderecoFuncionario', FILTER_SANITIZE_STRING);
  $bairroFuncionario = filter_input(INPUT_POST, 'bairroFuncionario', FILTER_SANITIZE_STRING);
  $cidadeFuncionario = filter_input(INPUT_POST, 'cidadeFuncionario', FILTER_SANITIZE_STRING);
  $estadoFuncionario = filter_input(INPUT_POST, 'estadoFuncionario', FILTER_SANITIZE_STRING);
  $paisFuncionario = filter_input(INPUT_POST, 'paisFuncionario', FILTER_SANITIZE_STRING);
  $cepFuncionario = filter_input(INPUT_POST, 'cepFuncionario', FILTER_SANITIZE_STRING); 

  // Inclusão dos dados do formulário no banco de dados  
  $result_funcionario = "INSERT INTO funcionario (nomeFuncionario, cpfFuncionario, dataNascFuncionario, funcaoFuncionario, telResFuncionario, celularFuncionario, emailFuncionario, enderecoFuncionario, bairroFuncionario, cidadeFuncionario, estadoFuncionario, paisFuncionario, cepFuncionario) VALUES 
  ('$nomeFuncionario', '$cpfFuncionario', '$dataNascFuncionario', '$funcaoFuncionario', '$telResFuncionario', '$celularFuncionario', '$emailFuncionario', '$enderecoFuncionario', '$bairroFuncionario', '$cidadeFuncionario', '$estadoFuncionario', '$paisFuncionario', '$cepFuncionario')";
  $resultado_funcionario = mysqli_query($conexao, $result_funcionario);

  
 // Mensagem de confirmação e erro de cadastro

  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O funcionáro foi cadastrado com sucesso </p>";
    header("location: cadastro_funcionario_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O funcionário não foi cadastrado com sucesso </p>";
      header("location: cadastro_funcionario_administrador.php");
    }

  ?>