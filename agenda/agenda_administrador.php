<?php
session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JVI Clínica Médica</title>
    <link rel="icon" href="../img/favicon.ico"/>
    <meta name="keywords" content="Clinica, médico, paciente">
    <meta name="description" content="Sistema de clínica médica para atendimento">
    <meta name="author" content="Júlio César">
    <link href='css/core/main.min.css' rel='stylesheet'/>
    <link href='css/daygrid/main.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="css/personalizado.css">
    <script src='js/core/main.min.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/core/locales/pt-br.js'></script>
    
    <script src='js/jquery.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src="js/personalizado.js"></script>
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="js/solid.js"></script>
    <script defer src="js/fontawesome.js"></script>
    
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
              <li> <a href="../cadastro_funcionario/consulta_funcionario_administrador.php"><i class="fa fa-search"></i>Consultar</a> </li>
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
            <h3 class="h3" style="margin-left: 100px">Agendar Consulta</h3>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
          </div>
        </nav>
        
        <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
        ?>
        
          <div id='calendar'></div>
          <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Alterar Agenda</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                  <div class="visevent">
                    <dl class="row"> <dt class="col-sm-3">Código:</dt>
                      <dd class="col-sm-9" id="id"></dd> <dt class="col-sm-3">Paciente / Médico:</dt>
                      <dd class="col-sm-9" id="title"></dd> <dt class="col-sm-3">Início:</dt>
                      <dd class="col-sm-9" id="start"></dd> <dt class="col-sm-3">Término</dt>
                      <dd class="col-sm-9" id="end"></dd>
                    </dl>
                    <button class="btn btn-warning btn-canc-vis">Editar</button>
                  </div>
                  <div class="formedit"> <span id="msg-edit"></span>
                    <form id="editevent" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Paciente / Médico:</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="title" placeholder="Nome do paciente"> </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Urgência:</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color">
                            <option value="">Selecione</option>
                            <option style="color:#228B22;" value="#228B22">Verde</option>
                            <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                            <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Início:</label>
                        <div class="col-sm-10">
                          <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)"> </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Término</label>
                        <div class="col-sm-10">
                          <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)"> </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                          <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body"> <span id="msg-cad"></span>
                  <form id="addevent" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Paciente / Médico:</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Nome do paciente"> </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Urgência:</label>
                      <div class="col-sm-10">
                        <select name="color" class="form-control" id="color">
                          <option value="">Selecione</option>
                          <option style="color:#228B22;" value="#228B22">Verde</option>
                          <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                          <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Início:</label>
                      <div class="col-sm-10">
                        <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)"> </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Término</label>
                      <div class="col-sm-10">
                        <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)"> </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
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