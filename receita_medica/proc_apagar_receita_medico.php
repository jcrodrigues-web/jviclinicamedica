<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_receita = "DELETE FROM receita WHERE id='$id'";
    $resultado_receita = mysqli_query ($conexao, $result_receita);

    // Mensagem para quando o usuário for apagado
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>Receita apagado com sucesso</p>";
      header ("Location: consulta_receita_medico.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro: A receita não foi apagado com sucesso</p>";
    header ("Location: consulta_receita_medico.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma receita</p>";
    header("Location: consulta_receita_medico.php");
    
  }


  ?>