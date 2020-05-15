<?php

  session_start();

  include_once("../conexao.php");

  //Recebe dados editado do formulário
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $nomeMedicamento = filter_input(INPUT_POST, 'nomeMedicamento', FILTER_SANITIZE_STRING);
  $genericoMedicamento = filter_input(INPUT_POST, 'genericoMedicamento', FILTER_SANITIZE_STRING);
  $fabricanteMedicamento = filter_input(INPUT_POST, 'fabricanteMedicamento', FILTER_SANITIZE_STRING);
  $tipoMedicamento = filter_input(INPUT_POST, 'tipoMedicamento', FILTER_SANITIZE_STRING);
  $nomeGenMedicamento = filter_input(INPUT_POST, 'nomeGenMedicamento', FILTER_SANITIZE_STRING);
  $nomeFabMedicamento = filter_input(INPUT_POST, 'nomeFabMedicamento', FILTER_SANITIZE_STRING);
  $observacoesMedicamento = filter_input(INPUT_POST, 'observacoesMedicamento', FILTER_SANITIZE_STRING); 

  // Alterar os dados do formulário no banco de dados  
  $result_medicamento = "UPDATE medicamento SET nomeMedicamento='$nomeMedicamento', genericoMedicamento='$genericoMedicamento', fabricanteMedicamento='$fabricanteMedicamento', tipoMedicamento='$tipoMedicamento',
  nomeGenMedicamento='$nomeGenMedicamento', nomeFabMedicamento='$nomeFabMedicamento', observacoesMedicamento='$observacoesMedicamento' WHERE id='$id'";
  
  $resultado_medicamento = mysqli_query($conexao, $result_medicamento);
  
  
 // Mensagem de confirmação e erro de cadastro
  if(mysqli_affected_rows($conexao)){
    $_SESSION ['msg'] = "<p style='color:green;'>O medicamento foi editado com sucesso </p>";
    header("location: consulta_medicamento_administrador.php");
  }
    else {
      $_SESSION ['msg'] = "<p style='color:red;'>O medicamento não foi editado com sucesso </p>";
      header("location: consulta_medicamento_administrador.php");
    }

  ?>