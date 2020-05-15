<?php 
    session_start();
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
          <li> <a href="#medicoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus-circle"></i> Médico</a>
            <ul class="collapse list-unstyled" id="medicoSubmenu">
              <li> <a href="../receita_medica/cadastro_receita_administrador.php">Receita</a> </li>
              <li> <a href="../receita_medica/consulta_receita_administrador.php">Consultar Receita</a> </li>
              <li> <a href="../solicitacao_exame/cadastro_exame_administrador.php">Solicitação de Exame</a> </li>
              <li> <a href="../solicitacao_exame/consulta_exame_administrador.php">Consultar Exame</a> </li>
              <li> <a href="../medicamento/cadastro_medicamento_administrador.php">Medicamento</a> </li>
              <li> <a href="../medicamento/consulta_medicamento_administrador.php">Consultar Medicamento</a> </li>
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
            <h3 class="h3" style="margin-left: 100px">Histórico Clínico do Paciente</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
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
      
          <form class="form-horizontal" method="post" action="recebe_historico_paciente_administrador.php">
            <div class="row">
              <div class="col-md-9 mb-3">
                <label for="nomeHistPaciente">Nome:</label>
                <input type="text" name="nomeHistPaciente" class="form-control" id="nomeHistPaciente" placeholder="Nome completo" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="convenioHistPaciente">Convênio:</label>
                <select class="custom-select d-block w-100" name="convenioHistPaciente" id="convenioHistPaciente" required>
                  <option value="">Escolha o convênio</option>
                  <option></option>
                  <option>Unimed</option>
                  <option>Bradesco Saúde</option>
                  <option>CEMIG Saúde</option>
                  <option>Amil</option>
                  <option>Golden Cross</option>
                </select>
                <div class="invalid-feedback"> Please provide a valid state. </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="medicoHistPaciente">Médico Solicitante:</label>
                <input type="text" name="medicoHistPaciente" class="form-control" id="medicoHistPaciente" placeholder="Nome do médico" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="dataHistPaciente">Data da solicitação:</label>
                <input type="date" name="dataHistPaciente" class="form-control" id="dataHistPaciente" placeholder="Data de Nascimento">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="exameHistPaciente">Tipo de Exame:</label>
                <input type="text" name="exameHistPaciente" class="form-control" id="exameHistPaciente" placeholder="Tipo de exame">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="medicamentoHistPaciente">Medicamento Prescrito:</label>
                <input type="text" name="medicamentoHistPaciente" class="form-control" id="medicamentoHistPaciente" placeholder="Medicamento">
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 mb-3">
                <label for="resultadoHistPaciente">Resultados Obtidos:</label>
                <textarea class="form-control" rows="4" name="resultadoHistPaciente" id="resultadoHistPaciente" placeholder="Descrição dos resultados"></textarea>
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
            </div>
            <hr class="mb-4">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button> <a href="../tela_inicial/tela_principal_administrador.php" class="btn btn-info"><i class="fa fa-share"></i> Voltar</a> </form>
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