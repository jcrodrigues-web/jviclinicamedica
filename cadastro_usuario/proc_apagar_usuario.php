<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_usuario = "DELETE FROM usuarios WHERE id='$id'";
    $resultado_usuario = mysqli_query ($conexao, $result_usuario);

    // Mensagem para quando o usuário for apagado
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
      header ("Location: consulta_usuario_administrador.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro: Usuário não foi apagado com sucesso</p>";
    header ("Location: consulta_usuario_administrador.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
    header("Location: consulta_usuario_administrador.php");
    
  }


  ?>