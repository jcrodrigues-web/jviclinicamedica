<?php
  session_start();
  include_once("../conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
  $resultado_usuario = mysqli_query($conexao, $result_usuario);
  $row_usuario = mysqli_fetch_assoc($resultado_usuario); 
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JVI Clínica Médica</title>
    <link rel="icon" href="../img/favicon.ico" />
    <meta name="keywords" content="Clinica, médico, paciente">
    <meta name="description" content="Sistema de clínica médica para atendimento">
    <meta name="author" content="Júlio César">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>

  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar" style="background-color:#104E8B">
        <div class="sidebar-header"> <img src="../img/logo.png" class="img-responsive" style="margin:-40px auto -50px auto" width="200x" alt="Logo Clínica"> </div>
        <ul class="list-unstyled components menu_lateral">
          <li> <a href="../tela_inicial/tela_principal_administrador.php"><i class="fa fa-home"></i> Início</a> </li>
          <hr class="mb-1">
          <li> <a href="#usuarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> Usuário</a>
            <ul class="collapse list-unstyled" id="usuarioSubmenu">
              <li> <a href="../cadastro_usuario/cadastro_usuario_administrador.php"><i class="fa fa-user-circle"></i> Cadastrar</a> </li>
              <li> <a href="../cadastro_usuario/consulta_usuario_administrador.php"><i class="fa fa-search"></i> Consultar</a> </li>
            </ul>
          </li>
          <hr class="mb-1">
          <li> <a href="#pacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bed"></i> Paciente</a>
            <ul class="collapse list-unstyled" id="pacienteSubmenu">
              <li> <a href="../cadastro_paciente/cadastro_paciente_administrador.php"><i class="fa fa-user-plus"></i> Cadastrar</a> </li>
              <li> <a href="../cadastro_paciente/consulta_paciente_administrador.php"><i class="fa fa-search"></i> Consultar</a> </li>
              <li> <a href="../historico_paciente/cadastrar_historico_administrador.php"><i class="fa fa-history"></i> Cadastrar Histórico</a> </li>
              <li> <a href="../historico_paciente/consulta_historico_administrador.php"><i class="fa fa-search"></i> Consultar Histórico</a> </li>
            </ul>
          </li>
          <hr class="mb-1">
          <li> <a href="#funcionarioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> Funcionário</a>
            <ul class="collapse list-unstyled" id="funcionarioSubmenu">
              <li> <a href="../cadastro_funcionario/cadastro_funcionario_administrador.php"><i class="fa fa-briefcase"></i> Cadastrar</a> </li>
              <li> <a href="../cadastro_funcionario/consulta_funcionario_administrador.php"><i class="fa fa-search"></i> Consultar</a> </li>
            </ul>
          </li>
          <hr class="mb-1">
          <li> <a href="#medicoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus-circle"></i> Médico</a>
            <ul class="collapse list-unstyled" id="medicoSubmenu">
              <li> <a href="../receita_medica/cadastro_receita_administrador.php"><i class="fa fa-clipboard"></i> Receita</a> </li>
              <li> <a href="../receita_medica/consulta_receita_administrador.php"><i class="fa fa-search"></i> Consultar Receita</a> </li>
              <li> <a href="../solicitacao_exame/cadastro_exame_administrador.php"><i class="fa fa-heartbeat"></i> Solicitação de Exame</a> </li>
              <li> <a href="../solicitacao_exame/consulta_exame_administrador.php"><i class="fa fa-search"></i> Consultar Exame</a> </li>
              <li> <a href="../medicamento/cadastro_medicamento_administrador.php"><i class="fa fa-medkit"></i> Medicamento</a> </li>
              <li> <a href="../medicamento/consulta_medicamento_administrador.php"><i class="fa fa-search"></i> Consultar Medicamento</a> </li>
            </ul>
          </li>
          <hr class="mb-1">
          <li> <a href="../agenda/agenda_administrador.php"><i class="fa fa-calendar"></i> Agenda</a> </li>
          <hr class="mb-1">
          <li> <a href="../login/sair.php"><i class="fa fa-share"></i> Sair</a> </li>
        </ul>
      </nav>
      
      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light menu" style="background-color:#E8E8E8">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info"> <i class="fas fa-align-left"></i> <span>Ocultar barra lateral</span> </button>
            <h3 class="h3" style="margin-left: 160px">Editar Usuário</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active"> </li>
              </ul>
            </div>
          </div>
        </nav>
        
        <!-- Mensagem de confirmação de cadastro -->
        <?php
				if(isset($_SESSION ['msg'])) {
					echo $_SESSION ['msg'];
						unset ($_SESSION ['msg']);
					}
			?>
        
          <form class="form-horizontal" method="post" action="proc_editar_usuario.php">
            <div class="row">
              <div class="col-md-2 mb-3">
                <label for="id">Código:</label>
                <input type="text" name="id" class="form-control" id="id" placeholder="" value="<?php echo $row_usuario['id']; ?>" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
              <div class="col-md-8 mb-3">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do usuário" value="<?php echo $row_usuario['nome']; ?>" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="email">E-mail:</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="meuemail@dominio.com.br" value="<?php echo $row_usuario['email']; ?>">
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="login">Login:</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login de acesso" value="<?php echo $row_usuario['login']; ?>" required>
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Informe uma senha" value="<?php echo $row_usuario['senha']; ?>" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="nivel_acesso">Nível de Acesso:</label>
                <select class="custom-select d-block w-100" name="nivel_acesso" id="nivel_acesso" required>
                  <option value="<?php echo $row_usuario['nivel_acesso_id']; ?>">
                    <?php echo $row_usuario['nivel_acesso_id']; ?>
                  </option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
                <div class="invalid-feedback"> Please provide a valid state. </div>
              </div>
            </div>
            <hr class="mb-4">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button> <a class="btn btn-info" href="consulta_usuario_administrador.php"><i class="fa fa-reply"></i>Voltar</a> </form>
      </div>
      <div class="line"></div>
    </div>
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
          theme: "minimal"
        });
        $('#sidebarCollapse').on('click', function () {
          $('#sidebar, #content').toggleClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
      });
    </script>
    
  </body>

</html>