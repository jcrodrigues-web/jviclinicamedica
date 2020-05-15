<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados editado do formulário
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
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

 // Alterar os dados do formulário no banco de dados  
  $result_paciente = "UPDATE paciente SET nomePaciente='$nomePaciente', cpfPaciente='$cpfPaciente', dataNascPaciente='$dataNascPaciente', convenioPaciente='$convenioPaciente', telResPaciente='$telResPaciente', celularPaciente='$celularPaciente', emailPaciente='$emailPaciente', enderecoPaciente='$enderecoPaciente',
  bairroPaciente='$bairroPaciente', cidadePaciente='$cidadePaciente', estadoPaciente='$estadoPaciente', paisPaciente='$paisPaciente', cepPaciente='$cepPaciente' WHERE id='$id'";
  
 $resultado_paciente = mysqli_query($conexao, $result_paciente);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O paciente editado com sucesso </p>";
    header("location: consulta_paciente_atendimento.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O paciente não foi editado com sucesso </p>";
      header("location: consulta_paciente_atendimento.php");
    }

  ?>





