<?php

  session_start();

  include_once("../conexao.php");

  //Receber dados do formulário
  $nomeHistPaciente = filter_input(INPUT_POST, 'nomeHistPaciente', FILTER_SANITIZE_STRING);
  $convenioHistPaciente = filter_input(INPUT_POST, 'convenioHistPaciente', FILTER_SANITIZE_STRING);
  $medicoHistPaciente = filter_input(INPUT_POST, 'medicoHistPaciente', FILTER_SANITIZE_STRING);
  $dataHistPaciente = filter_input(INPUT_POST, 'dataHistPaciente', FILTER_SANITIZE_STRING);
  $exameHistPaciente = filter_input(INPUT_POST, 'exameHistPaciente', FILTER_SANITIZE_STRING);
  $medicamentoHistPaciente = filter_input(INPUT_POST, 'medicamentoHistPaciente', FILTER_SANITIZE_STRING);
  $resultadoHistPaciente = filter_input(INPUT_POST, 'resultadoHistPaciente', FILTER_SANITIZE_STRING);
  

  // Inclusão dos dados do formulário no banco de dados  
  $result_historico = "INSERT INTO historico (nomeHistPaciente, convenioHistPaciente, medicoHistPaciente, dataHistPaciente, exameHistPaciente, medicamentoHistPaciente, resultadoHistPaciente) VALUES 
  ('$nomeHistPaciente', '$convenioHistPaciente', '$medicoHistPaciente', '$dataHistPaciente', '$exameHistPaciente', '$medicamentoHistPaciente', '$resultadoHistPaciente')";
  $resultado_historico = mysqli_query($conexao, $result_historico);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O histórico do paciente foi cadastrado com sucesso </p>";
    header("location: cadastrar_historico_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O Histórico do paciente não foi cadastrado com sucesso </p>";
      header("location: cadastrar_historico_administrador.php");
    }

  ?>