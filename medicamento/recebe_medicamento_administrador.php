<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados do formulário
  $nomeMedicamento = filter_input(INPUT_POST, 'nomeMedicamento', FILTER_SANITIZE_STRING);
  $genericoMedicamento = filter_input(INPUT_POST, 'genericoMedicamento', FILTER_SANITIZE_STRING);
  $fabricanteMedicamento = filter_input(INPUT_POST, 'fabricanteMedicamento', FILTER_SANITIZE_STRING);
  $tipoMedicamento = filter_input(INPUT_POST, 'tipoMedicamento', FILTER_SANITIZE_STRING);
  $nomeGenMedicamento = filter_input(INPUT_POST, 'nomeGenMedicamento', FILTER_SANITIZE_STRING);
  $nomeFabMedicamento = filter_input(INPUT_POST, 'nomeFabMedicamento', FILTER_SANITIZE_STRING);
  $observacoesMedicamento = filter_input(INPUT_POST, 'observacoesMedicamento', FILTER_SANITIZE_STRING);
  

  // Inclusão dos dados do formulário no banco de dados  
  $result_medicamento = "INSERT INTO medicamento (nomeMedicamento, genericoMedicamento, fabricanteMedicamento, tipoMedicamento, nomeGenMedicamento, nomeFabMedicamento, observacoesMedicamento) VALUES 
  ('$nomeMedicamento', '$genericoMedicamento', '$fabricanteMedicamento', '$tipoMedicamento', '$nomeGenMedicamento', '$nomeFabMedicamento', '$observacoesMedicamento')";
  $resultado_medicamnento = mysqli_query($conexao, $result_medicamento);

  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_insert_id($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>Medicamento foi cadastrado com sucesso </p>";
    header("location: cadastro_medicamento_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>Medicamento não foi cadastrado com sucesso </p>";
      header("location: cadastro_medicamento_administrador.php");
    }

  ?>