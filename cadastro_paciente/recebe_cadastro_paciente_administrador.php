<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados do formulário
  $nomePaciente = filter_input(INPUT_POST, 'nomePaciente', FILTER_SANITIZE_STRING);
  $cpfPaciente = filter_input(INPUT_POST, 'cpfPaciente', FILTER_SANITIZE_STRING);
  $dataNascPaciente = filter_input(INPUT_POST, 'dataNascPaciente', FILTER_SANITIZE_STRING);
  $convenioPaciente = filter_input(INPUT_POST, 'convenioPaciente', FILTER_SANITIZE_STRING);
  $telResPaciente = filter_input(INPUT_POST, 'telResPaciente', FILTER_SANITIZE_STRING);
  $celularPaciente = filter_input(INPUT_POST, 'celularPaciente', FILTER_SANITIZE_STRING);
  $emailPaciente = filter_input(INPUT_POST, 'emailPaciente', FILTER_SANITIZE_STRING);
  $enderecoPaciente = filter_input(INPUT_POST, 'enderecoPaciente', FILTER_SANITIZE_STRING);
  $bairroPaciente = filter_input(INPUT_POST, 'bairroPaciente', FILTER_SANITIZE_STRING);
  $cidadePaciente = filter_input(INPUT_POST, 'cidadePaciente', FILTER_SANITIZE_STRING);
  $estadoPaciente = filter_input(INPUT_POST, 'estadoPaciente', FILTER_SANITIZE_STRING);
  $paisPaciente = filter_input(INPUT_POST, 'paisPaciente', FILTER_SANITIZE_STRING);
  $cepPaciente = filter_input(INPUT_POST, 'cepPaciente', FILTER_SANITIZE_STRING); 

  // Inclusão dos dados do formulário no banco de dados  
  $result_paciente = "INSERT INTO paciente (nomePaciente, cpfPaciente, dataNascPaciente, convenioPaciente, telResPaciente, celularPaciente, emailPaciente, enderecoPaciente, bairroPaciente, cidadePaciente, estadoPaciente, paisPaciente, cepPaciente) VALUES 
  ('$nomePaciente', '$cpfPaciente', '$dataNascPaciente', '$convenioPaciente', '$telResPaciente', '$celularPaciente', '$emailPaciente', '$enderecoPaciente', '$bairroPaciente', '$cidadePaciente', '$estadoPaciente', '$paisPaciente', '$cepPaciente')";
  $resultado_paciente = mysqli_query($conexao, $result_paciente);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O paciente cadastrado com sucesso </p>";
    header("location: cadastro_paciente_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O paciente não foi cadastrado com sucesso </p>";
      header("location: cadastro_paciente_administrador.php");
    }

  ?>