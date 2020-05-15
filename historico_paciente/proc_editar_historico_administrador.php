<?php

  session_start();

  include_once("../conexao.php");

  //Receber dados editado do formulário
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $nomeHistPaciente = filter_input(INPUT_POST, 'nomeHistPaciente', FILTER_SANITIZE_STRING);
  $convenioHistPaciente = filter_input(INPUT_POST, 'convenioHistPaciente', FILTER_SANITIZE_STRING);
  $medicoHistPaciente = filter_input(INPUT_POST, 'medicoHistPaciente', FILTER_SANITIZE_STRING);
  $dataHistPaciente = filter_input(INPUT_POST, 'dataHistPaciente', FILTER_SANITIZE_STRING);
  $exameHistPaciente = filter_input(INPUT_POST, 'exameHistPaciente', FILTER_SANITIZE_STRING);
  $medicamentoHistPaciente = filter_input(INPUT_POST, 'medicamentoHistPaciente', FILTER_SANITIZE_STRING);
  $resultadoHistPaciente = filter_input(INPUT_POST, 'resultadoHistPaciente', FILTER_SANITIZE_STRING);

 // Alterar os dados do formulário no banco de dados  
  $result_historico = "UPDATE historico SET nomeHistPaciente='$nomeHistPaciente', convenioHistPaciente='$convenioHistPaciente', medicoHistPaciente='$medicoHistPaciente', dataHistPaciente='$dataHistPaciente', 
  exameHistPaciente='$exameHistPaciente', medicamentoHistPaciente='$medicamentoHistPaciente', resultadoHistPaciente='$resultadoHistPaciente' WHERE id='$id'";
  
 $result_historico = mysqli_query($conexao, $result_historico);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>Histórico editado com sucesso </p>";
    header("location: consulta_historico_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>Histórico não foi editado com sucesso </p>";
      header("location: consulta_historico_administrador.php");
    }

  ?>





