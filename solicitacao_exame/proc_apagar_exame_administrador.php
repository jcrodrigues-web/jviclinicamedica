<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_exame = "DELETE FROM exame WHERE id='$id'";
    $resultado_exame = mysqli_query ($conexao, $result_exame);

    // Mensagem para quando o usuário for apagado
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>O exame foi apagado com sucesso</p>";
      header ("Location: consulta_exame_administrador.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro: O exame não foi apagado com sucesso</p>";
    header ("Location: consulta_exame_administrador.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma exame</p>";
    header("Location: consulta_exame_administrador.php");
    
  }


  ?>