<?php 
include_once("../conexao.php");

if(!isset($_GET['pesquisar'])){
	header("Location: consulta_medicamento_medico.php");
}else{
	$valor_pesquisar = $_GET['pesquisar'];
}

//Selecionar todos os cursos da tabela
$result_medicamento = "SELECT * FROM paciente WHERE nomeMedicamento LIKE '%$valor_pesquisar%'";
$resultado_medicamento = mysqli_query($conexao, $result_medicamento);

//Selecionar os cursos a serem apresentado na página **** '%$valor_pesquisar%' limit $incio, $quantidade_pg ****
$result_cursos = "SELECT * FROM medicamento WHERE nomeMedicamento LIKE '%$valor_pesquisar%'";
$resultado_cursos = mysqli_query($conexao, $result_cursos);
$total_cursos = mysqli_num_rows($resultado_cursos);
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
	<script defer src="../js/confirmacaoexcluir.js"></script>

  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
		<nav id="sidebar" style="background-color:#104E8B">
		  <div class="sidebar-header"> <img src="../img/logo.png" class="img-responsive" style="margin:-40px auto -50px auto" width="200x" alt="Logo Clínica"> </div>
		  <ul class="list-unstyled components menu_lateral">
			<li> <a href="../tela_inicial/tela_principal_medico.php"><i class="fa fa-home"></i> Início</a> </li>
			<hr class="mb-1">
			<li> <a href="#pacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bed"></i> Paciente</a>
			  <ul class="collapse list-unstyled" id="pacienteSubmenu">
				<li> <a href="../cadastro_paciente/consulta_paciente_medico.php"><i class="fa fa-search"></i> Consultar</a> </li>
				<li> <a href="../historico_paciente/cadastrar_historico_medico.php"><i class="fa fa-history"></i> Cadastrar Histórico</a> </li>
				<li> <a href="../historico_paciente/consulta_historico_medico.php"><i class="fa fa-search"></i> Consultar Histórico</a> </li>
			  </ul>
			</li>
			<hr class="mb-1">
			<li> <a href="#medicoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus-circle"></i> Médico</a>
			  <ul class="collapse list-unstyled" id="medicoSubmenu">
				<li> <a href="../receita_medica/cadastro_receita_medico.php"><i class="fa fa-clipboard"></i> Receita</a> </li>
				<li> <a href="../receita_medica/consulta_receita_medico.php"><i class="fa fa-search"></i> Consultar Receita</a> </li>
				<li> <a href="../solicitacao_exame/cadastro_exame_medico.php"><i class="fa fa-heartbeat"></i> Solicitação de Exame</a> </li>
				<li> <a href="../solicitacao_exame/consulta_exame_medico.php"><i class="fa fa-search"></i> Consultar Exame</a> </li>
				<li> <a href="../medicamento/cadastro_medicamento_medico.php"><i class="fa fa-medkit"></i> Medicamento</a> </li>
				<li> <a href="../medicamento/consulta_medicamento_medico.php"><i class="fa fa-search"></i> Consultar Medicamento</a> </li>
			  </ul>
			</li>
          <hr class="mb-1">
          <li> <a href="../agenda/agenda_medico.php"><i class="fa fa-calendar"></i> Agenda</a> </li>
          <hr class="mb-1">
          <li> <a href="../login/sair.php"><i class="fa fa-share"></i> Sair</a> </li>
        </ul>
      </nav>
      
      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light menu" style="background-color:#E8E8E8">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info"> <i class="fas fa-align-left"></i> <span>Ocultar barra lateral</span> </button>
            <h3 class="h3" style="margin-left: 120px">Consultar Medicamento</h3>
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
                    <form class="form-inline" method="GET" action="pesquisar_medico.php">
                      <div class="form-group">
                        <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Nome do Medicamento">&nbsp&nbsp
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>&nbsp&nbsp
						<a class="btn btn-primary" href="consulta_medicamento_medico.php" role="button">Voltar</a>
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
                        <th>Código</th>
                        <th>Nome</th>
						<th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>
                        <tr>
                          <td>
                            <?php echo $rows_cursos['id']; ?>
                          </td>
                          <td>
                            <?php echo $rows_cursos['nomeMedicamento']; ?>
                          </td>
                          <div class="col-md-3">
                            <td class="float-right">
                              <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_cursos['id']; ?>"><i class='fa fa-eye'></i></button>
                              <button type="button" class="btn btn-xs btn-warning" data-target="#exampleModal">
                                <?php echo "<a href='editar_medicamento_medico.php?id=" . $rows_cursos['id']. "'><i class='fa fa-edit'></i></a>"?></button>
							  <button type="button" class="btn btn-xs btn-danger">
                               <?php echo "<a href='proc_apagar_medicamento_medico.php?id=" . $rows_cursos['id'] . "' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='fa fa-trash-alt'></i></a>"?></button>
							</td>
                          </div>
                        </tr>
                </div>
                  
                <!--Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $rows_cursos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-left" id="myModalLabel"><?php echo $rows_cursos['nomeMedicamento']; ?></h4> </div>
                      <div class="modal-body">
                        <div class="container-fluid">
                          <h4 class="modal-title text-left" id="myModalLabel">Cadastro de Medicamento</h4>
                          <br>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Genérico: </strong>'.$rows_cursos['genericoMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Fabricante: </strong>'.$rows_cursos['fabricanteMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Tipo: </strong>'.$rows_cursos['tipoMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Nome Genérico: </strong>'.$rows_cursos['nomeGenMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Nome de Fábrica: </strong>'.$rows_cursos['nomeFabMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-8">
                                <?php echo'<strong>Observações: </strong>'.$rows_cursos['observacoesMedicamento']; ?></div>
                            </div>
                          </p>
						<hr class="mb-4">
                          <div class="row">
                            <div class="col-4 mb-3"><a class="btn btn-primary" href="consulta_medicamento_medico.php" role="button"><i class="fa fa-times"></i> Sair</a> </div>
                          </div>
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