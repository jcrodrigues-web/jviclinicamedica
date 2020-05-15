<!-- Início de sessão -->
<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica</title>
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
			<li> <a href="../tela_inicial/tela_principal_atendimento.php"><i class="fa fa-home"></i> Início</a> </li>
			<hr class="mb-1">
			<li> <a href="#pacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bed"></i> Paciente</a>
			  <ul class="collapse list-unstyled" id="pacienteSubmenu">
				<li> <a href="../cadastro_paciente/cadastro_paciente_atendimento.php"><i class="fa fa-user-plus"></i> Cadastrar</a> </li>
				<li> <a href="../cadastro_paciente/consulta_paciente_atendimento.php"><i class="fa fa-search"></i> Consultar</a> </li>
			  </ul>
			</li>
			<hr class="mb-1">
			<li> <a href="#medicoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus-circle"></i> Médico</a>
			  <ul class="collapse list-unstyled" id="medicoSubmenu">
				<li> <a href="../receita_medica/consulta_receita_atendimento.php"><i class="fa fa-search"></i> Consultar Receita</a> </li>
				<li> <a href="../medicamento/cadastro_medicamento_atendimento.php"><i class="fa fa-medkit"></i> Medicamento</a> </li>
				<li> <a href="../medicamento/consulta_medicamento_atendimento.php"><i class="fa fa-search"></i> Consultar Medicamento</a> </li>
			  </ul>
			</li>
          <hr class="mb-1">
          <li> <a href="../agenda/agenda_atendimento.php"><i class="fa fa-calendar"></i> Agenda</a> </li>
          <hr class="mb-1">
          <li> <a href="../login/sair.php"><i class="fa fa-share"></i> Sair</a> </li>
        </ul>
      </nav>
      
      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light menu" style="background-color:#E8E8E8">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info"> <i class="fas fa-align-left"></i> <span>Ocultar barra lateral</span> </button>
            <h3 class="h3" style="margin-left: 120px">Cadastrar de Medicamento</h3>
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
        
          <form class="form-horizontal" method="post" action="recebe_medicamento_atendimento.php">
            <div class="row">
              <div class="col-md-9 mb-3">
                <label for="nomeMedicamento">Nome do Medicamento:</label>
                <input type="text" name="nomeMedicamento" class="form-control" id="nomeMedicamento" placeholder="Nome do medicamento" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="genericoMedicamento">Genérico:</label>
                <select class="custom-select d-block w-100" name="genericoMedicamento" id="genericoMedicamento">
                  <option value="">Escolha Sim ou Não</option>
                  <option></option>
                  <option>Sim</option>
                  <option>Não</option>
                </select>
                <div class="invalid-feedback"> Please provide a valid state. </div>
              </div>
              <div class="col-md-7 mb-3">
                <label for="fabricanteMedicamento">Fabricante:</label>
                <input type="text" name="fabricanteMedicamento" class="form-control" id="fabricanteMedicamento" placeholder="Nome do fabricante">
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="tipoMedicamento">Tipo:</label>
                <input type="text" name="tipoMedicamento" class="form-control" id="tipoMedicamento" placeholder="Tipo de medicamento">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="nomeGenMedicamento">Nome Genérico:</label>
                <input type="text" name="nomeGenMedicamento" class="form-control" id="nomeGenMedicamento" placeholder="Nome genérico">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="nomeFabMedicamento">Nome de Fábrica:</label>
                <input type="text" name="nomeFabMedicamento" class="form-control" id="nomeFabMedicamento" placeholder="Nome de fábrica">
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-11 mb-3">
                <label for="observacoesMedicamento">Observações:</label>
                <textarea class="form-control" rows="4" name="observacoesMedicamento" id="observacoesMedicamento" placeholder="Digite as observações"></textarea>
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
            </div>
            <hr class="mb-4">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button> <a href="../tela_inicial/tela_principal_atendimento.php" class="btn btn-info"><i class="fa fa-share"></i> Voltar</a> </form>
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