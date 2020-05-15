<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados do formulário
  $nomePacienteExame = filter_input(INPUT_POST, 'nomePacienteExame', FILTER_SANITIZE_STRING);
  $dataNascPacienteExame = filter_input(INPUT_POST, 'dataNascPacienteExame', FILTER_SANITIZE_STRING);
  $convenioPacienteExame = filter_input(INPUT_POST, 'convenioPacienteExame', FILTER_SANITIZE_STRING);
  $medicoPacienteExame = filter_input(INPUT_POST, 'medicoPacienteExame', FILTER_SANITIZE_STRING);
  $crmPacienteExame = filter_input(INPUT_POST, 'crmPacienteExame', FILTER_SANITIZE_STRING);
  $dataPacienteExame = filter_input(INPUT_POST, 'dataPacienteExame', FILTER_SANITIZE_STRING);
  $solicitacaoPacienteExame = filter_input(INPUT_POST, 'solicitacaoPacienteExame', FILTER_SANITIZE_STRING);


  // Inclusão dos dados do formulário no banco de dados  
  $result_exame = "INSERT INTO exame (nomePacienteExame, dataNascPacienteExame, convenioPacienteExame, medicoPacienteExame, crmPacienteExame, dataPacienteExame, solicitacaoPacienteExame) VALUES 
  ('$nomePacienteExame', '$dataNascPacienteExame', '$convenioPacienteExame', '$medicoPacienteExame', '$crmPacienteExame', '$dataPacienteExame', '$solicitacaoPacienteExame')";
  $resultado_exame = mysqli_query($conexao, $result_exame);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O exame foi cadastrado com sucesso </p>";
    header("location: cadastro_exame_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O exame não foi cadastrado com sucesso </p>";
      header("location: cadastro_exame_administrador.php");
    }

  ?>