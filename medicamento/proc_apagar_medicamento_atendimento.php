<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_medicamento = "DELETE FROM medicamento WHERE id='$id'";
    $resultado_medicamento = mysqli_query ($conexao, $result_medicamento);

    // Mensagem para quando o usuário for apagado
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>Medicamento apagado com sucesso</p>";
      header ("Location: consulta_medicamento_atendimento.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro: o medicamento não foi apagado com sucesso</p>";
    header ("Location: consulta_medicamento_atendimento.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um medicamento</p>";
    header("Location: consulta_medicamento_atendimento.php");
    
  }


  ?>