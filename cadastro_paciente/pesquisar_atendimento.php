<?php 
include_once("../conexao.php");

if(!isset($_GET['pesquisar'])){
	header("Location: consulta_paciente_atendimento.php");
}else{
	$valor_pesquisar = $_GET['pesquisar'];
}

//Selecionar todos os pacientes da tabela
$result_paciente = "SELECT * FROM paciente WHERE nomePaciente LIKE '%$valor_pesquisar%'";
$resultado_paciente = mysqli_query($conexao, $result_paciente);

//Selecionar os pacientes a serem apresentado na página **** '%$valor_pesquisar%' limit $incio, $quantidade_pg ****
$result_pacientes = "SELECT * FROM paciente WHERE nomePaciente LIKE '%$valor_pesquisar%'";
$resultado_pacientes = mysqli_query($conexao, $result_pacientes);
$total_pacientes = mysqli_num_rows($resultado_pacientes);
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
    <link rel="stylesheet" href="../css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>
	<script defer src="../js/confirmacaoexcluir.js"></script>
	
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
            <h3 class="h3" style="margin-left: 150px">Consultar Paciente</h3>
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
        
          <div class="container">
            <div class="container theme-showcase" role="main">
              <br>
              <div class="page-header">
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <form class="form-inline" method="GET" action="pesquisar_atendimento.php">
                      <div class="form-group">
                        <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Nome do Paciente">&nbsp&nbsp
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>&nbsp&nbsp
						<a class="btn btn-primary" href="consulta_paciente_atendimento.php" role="button">Voltar</a>
                      </div>
                    </form>
                  </div>
                </div>
                <br> </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>CPF</th>
                        <th>Nome</th>
						<th></th>
                      </tr>
                    </thead>
                </div>
                <tbody>
                  <?php while($rows_pacientes = mysqli_fetch_assoc($resultado_pacientes)){ ?>
                    <tr>
                      <td>
                        <?php echo $rows_pacientes['cpfPaciente']; ?>
                      </td>
                      <td>
                        <?php echo $rows_pacientes['nomePaciente']; ?>
                      </td>
                      <div class="col-md-3">
                        <td class="float-right">
                          <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_pacientes['id']; ?>"><i class='fa fa-eye'></i></button>
                          <button type="button" class="btn btn-xs btn-warning" data-target="#exampleModal">
                            <?php echo "<a href='editar_cadastro_atendimento.php?id=" . $rows_pacientes['id']. "'><i class='fa fa-edit'></i></a>"?></button>
                          <button type="button" class="btn btn-xs btn-danger">
                            <?php echo "<a href='proc_apagar_paciente_atendimento.php?id=" . $rows_pacientes['id'] . "' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='fa fa-trash-alt'></i></a>"?></button>
						</td>
                    </tr>
                    </div>
              </div>
                
              <!--Inicio Modal -->
              <div class="modal fade" id="myModal<?php echo $rows_pacientes['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title text-left" id="myModalLabel"><?php echo $rows_pacientes['nomePaciente']; ?></h4> </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <h4 class="modal-title text-left" id="myModalLabel">Cadastro de Paciente</h4>
                        <br>
                        <p>
                          <div class="row">
                            <div class="col-md-6">
                              <?php echo'<strong>CPF: </strong>'.$rows_pacientes['cpfPaciente']; ?></div>
                            <div class="col-md-6">
                              <?php echo'<strong>Data de Nascimento: </strong>'.$rows_pacientes['dataNascPaciente']; ?></div>
                          </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-4">
                              <?php echo'<strong>Convenio: </strong>'.$rows_pacientes['convenioPaciente']; ?></div>
                          </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-6">
                              <?php echo'<strong>Telefone: </strong>'.$rows_pacientes['telResPaciente']; ?></div>
                            <div class="col-md-6">
                              <?php echo'<strong>Celular: </strong>'.$rows_pacientes['celularPaciente']; ?></div>
                          </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-4">
                              <?php echo'<strong>E-mail: </strong>'.$rows_pacientes['emailPaciente']; ?></div>
                          </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-8">
                              <?php echo'<strong>Endereço: </strong>'.$rows_pacientes['enderecoPaciente']; ?></div>
                          </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-6">
                              <?php echo'<strong>Bairro: </strong>'.$rows_pacientes['bairroPaciente']; ?></div>
                            <div class="col-md-4">
                              <?php echo'<strong>Cidade: </strong>'.$rows_pacientes['cidadePaciente']; ?></div>
                          </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-6">
                              <?php echo'<strong>Estado: </strong>'.$rows_pacientes['estadoPaciente']; ?>
                        </div>
                        <div class="col-md-4">
                          <?php echo'<strong>País: </strong>'.$rows_pacientes['paisPaciente']; ?>
                        </div>
                        </div>
                        </p>
                        <p>
                          <div class="row">
                            <div class="col-md-4">
                              <?php echo'<strong>CEP: </strong>'.$rows_pacientes['cepPaciente']; ?></p>
                        </div>
                        </div>
                        </p>
						<hr class="mb-4">
                          <div class="row">
                            <div class="col-4 mb-3"><a class="btn btn-primary" href="consulta_paciente_atendimento.php" role="button"><i class="fa fa-times"></i> Sair</a> </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Fim Modal -->

              <?php } ?>
                </tbody>
                </table>
            </div>
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