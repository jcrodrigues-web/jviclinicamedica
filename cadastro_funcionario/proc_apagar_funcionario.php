<?php

  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!empty($id)){
    $result_funcionario = "DELETE FROM funcionario WHERE id='$id'";
    $resultado_funcionario = mysqli_query ($conexao, $result_funcionario);

    // Mensagem de confirmação e erro de exclusão
    if (mysqli_affected_rows($conexao)) {
      $_SESSION['msg'] = "<p style='color:green;'>Funcionario apagado com sucesso</p>";
      header ("Location: consulta_funcionario_administrador.php");
    
  } else {
    $_SESSION['msg'] = "<p style= 'color:rede;'>Erro: o funcionário não foi apagado com sucesso</p>";
    header ("Location: consulta_funcionario_administrador.php");
  }
    
  }else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
    header("Location: consulta_funcionario_administrador.php");
    
  }


  ?>