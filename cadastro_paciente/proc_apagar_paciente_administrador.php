<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_usuario = "DELETE FROM paciente WHERE id='$id'";
    $resultado_usuario = mysqli_query ($conexao, $result_usuario);

    // Mensagem para quando o usuário for apagado
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>Paciente apagado com sucesso</p>";
      header ("Location: consulta_paciente_administrador.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro o paciente não foi apagado com sucesso</p>";
    header ("Location: consulta_paciente_administrador.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um paciente</p>";
    header("Location: consulta_paciente_administrador.php");
    
  }


  ?>