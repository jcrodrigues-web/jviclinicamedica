<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados do formulário
  $nomePacienteReceita = filter_input(INPUT_POST, 'nomePacienteReceita', FILTER_SANITIZE_STRING);
  $idadePacienteReceita = filter_input(INPUT_POST, 'idadePacienteReceita', FILTER_SANITIZE_STRING);
  $dataNascPacienteReceita = filter_input(INPUT_POST, 'dataNascPacienteReceita', FILTER_SANITIZE_STRING);
  $convenioPacienteReceita = filter_input(INPUT_POST, 'convenioPacienteReceita', FILTER_SANITIZE_STRING);
  $medicoPacienteReceita = filter_input(INPUT_POST, 'medicoPacienteReceita', FILTER_SANITIZE_STRING);
  $crmPacienteReceita = filter_input(INPUT_POST, 'crmPacienteReceita', FILTER_SANITIZE_STRING);
  $dataPacienteReceita = filter_input(INPUT_POST, 'dataPacienteReceita', FILTER_SANITIZE_STRING);
  $receituarioPacienteReceita = filter_input(INPUT_POST, 'receituarioPacienteReceita', FILTER_SANITIZE_STRING);


  // Inclusão dos dados do formulário no banco de dados  
  $result_receita = "INSERT INTO receita (nomePacienteReceita, idadePacienteReceita, dataNascPacienteReceita, convenioPacienteReceita, medicoPacienteReceita, crmPacienteReceita, dataPacienteReceita, receituarioPacienteReceita) VALUES 
  ('$nomePacienteReceita', '$idadePacienteReceita', '$dataNascPacienteReceita', '$convenioPacienteReceita', '$medicoPacienteReceita', '$crmPacienteReceita', '$dataPacienteReceita', '$receituarioPacienteReceita')";
  $resultado_receita = mysqli_query($conexao, $result_receita);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>A receita foi cadastrado com sucesso </p>";
    header("location: cadastro_receita_medico.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>A receita não foi cadastrado com sucesso </p>";
      header("location: cadastro_receita_medico.php");
    }

  ?>