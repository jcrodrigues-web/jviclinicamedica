<?php

  session_start();

  include_once("../conexao.php");

  //Recebendo as informações editadas do formulário 
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
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

  // Alterar os dados do formulário no banco de dados  
  $result_funcionario = "UPDATE funcionario SET nomeFuncionario='$nomeFuncionario', cpfFuncionario='$cpfFuncionario', dataNascFuncionario='$dataNascFuncionario', funcaoFuncionario='$funcaoFuncionario', telResFuncionario='$telResFuncionario', celularFuncionario='$celularFuncionario', emailFuncionario='$emailFuncionario', enderecoFuncionario='$enderecoFuncionario',
  bairroFuncionario='$bairroFuncionario', cidadeFuncionario='$cidadeFuncionario', cidadeFuncionario='$cidadeFuncionario', estadoFuncionario='$estadoFuncionario', paisFuncionario='$paisFuncionario', cepFuncionario='$cepFuncionario' WHERE id='$id'";
  
  $resultado_funcionario = mysqli_query($conexao, $result_funcionario);
  
  
 // Mensagem de confirmação e erro de edição de cadastro

  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O funcionáro editado com sucesso </p>";
    header("location: consulta_funcionario_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O funcionário não foi editado com sucesso </p>";
      header("location: consulta_funcionario_administrador.php");
    }

  ?>