<?php

  session_start();

  include_once("../conexao.php");
  
  //Recebe dados editado do formulário
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $cpfPaciente = filter_input(INPUT_POST, 'cpfPaciente', FILTER_SANITIZE_STRING);
  $nomePacienteReceita = filter_input(INPUT_POST, 'nomePacienteReceita', FILTER_SANITIZE_STRING);
  $idadePacienteReceita = filter_input(INPUT_POST, 'idadePacienteReceita', FILTER_SANITIZE_STRING);
  $dataNascPacienteReceita = filter_input(INPUT_POST, 'dataNascPacienteReceita', FILTER_SANITIZE_STRING);
  $convenioPacienteReceita = filter_input(INPUT_POST, 'convenioPacienteReceita', FILTER_SANITIZE_STRING);
  $medicoPacienteReceita = filter_input(INPUT_POST, 'medicoPacienteReceita', FILTER_SANITIZE_STRING);
  $crmPacienteReceita = filter_input(INPUT_POST, 'crmPacienteReceita', FILTER_SANITIZE_STRING);
  $dataPacienteReceita = filter_input(INPUT_POST, 'dataPacienteReceita', FILTER_SANITIZE_STRING);
  $receituarioPacienteReceita = filter_input(INPUT_POST, 'receituarioPacienteReceita', FILTER_SANITIZE_STRING);

  // Alterar os dados do formulário no banco de dados  dataNascPacienteReceita
  $result_receita = "UPDATE receita SET cpfPaciente='$cpfPaciente', nomePacienteReceita='$nomePacienteReceita', idadePacienteReceita='$idadePacienteReceita', dataNascPacienteReceita='$dataNascPacienteReceita', convenioPacienteReceita='$convenioPacienteReceita',
  medicoPacienteReceita='$medicoPacienteReceita', crmPacienteReceita='$crmPacienteReceita', dataPacienteReceita='$dataPacienteReceita', receituarioPacienteReceita='$receituarioPacienteReceita' WHERE id='$id'";
  
  $resultado_receita = mysqli_query($conexao, $result_receita);
  
  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>A receita foi editado com sucesso </p>";
    header("location: consulta_receita_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>A receita não foi editado com sucesso </p>";
      header("location: consulta_receita_administrador.php");
    }

  ?>