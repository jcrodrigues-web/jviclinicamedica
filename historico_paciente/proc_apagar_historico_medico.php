<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_historico = "DELETE FROM historico WHERE id='$id'";
    $resultado_historico = mysqli_query ($conexao, $result_historico);

    // Mensagem para quando o usuário for apagado
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>Histórico apagado com sucesso</p>";
      header ("Location: consulta_historico_medico.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro o histórico não foi apagado com sucesso</p>";
    header ("Location: consulta_historico_medico.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um histórico</p>";
    header("Location: consulta_historico_medico.php");
    
  }


  ?>