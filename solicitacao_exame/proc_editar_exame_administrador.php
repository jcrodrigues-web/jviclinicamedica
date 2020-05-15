<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados editado do formulário
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $nomePacienteExame = filter_input(INPUT_POST, 'nomePacienteExame', FILTER_SANITIZE_STRING);
  $dataNascPacienteExame = filter_input(INPUT_POST, 'dataNascPacienteExame', FILTER_SANITIZE_STRING);
  $convenioPacienteExame = filter_input(INPUT_POST, 'convenioPacienteExame', FILTER_SANITIZE_STRING);
  $medicoPacienteExame = filter_input(INPUT_POST, 'medicoPacienteExame', FILTER_SANITIZE_STRING);
  $crmPacienteExame = filter_input(INPUT_POST, 'crmPacienteExame', FILTER_SANITIZE_STRING);
  $dataPacienteExame = filter_input(INPUT_POST, 'dataPacienteExame', FILTER_SANITIZE_STRING);
  $solicitacaoPacienteExame = filter_input(INPUT_POST, 'solicitacaoPacienteExame', FILTER_SANITIZE_STRING);

  // Alterar os dados do formulário no banco de dados  dataNascPacienteExame
  $result_exame = "UPDATE exame SET nomePacienteExame='$nomePacienteExame', dataNascPacienteExame='$dataNascPacienteExame', convenioPacienteExame='$convenioPacienteExame',
  medicoPacienteExame='$medicoPacienteExame', crmPacienteExame='$crmPacienteExame', dataPacienteExame='$dataPacienteExame', solicitacaoPacienteExame='$solicitacaoPacienteExame' WHERE id='$id'";
  
  $resultado_exame = mysqli_query($conexao, $result_exame);
  
  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O Exame foi editado com sucesso </p>";
    header("location: consulta_exame_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O Exame não foi editado com sucesso </p>";
      header("location: consulta_exame_administrador.php");
    }

  ?>