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
  
  <!-- Imagem de fundo -->
  <style>
    body{
      background-image: url(../img/clinica.jpg);
      background-attachment: fixed;
      background-size: 100%;
      background-repeat: no-repeat;
      background-color: #000;
    }
  
  </style>

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
    <div class="container">
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light menu" style="background-color:#E8E8E8">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info"> <i class="fas fa-align-left"></i> <span>Ocultar barra lateral</span> </button>
            <h3 class="h3" style="margin-left: 170px">Clínica Médica</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active"> </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
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