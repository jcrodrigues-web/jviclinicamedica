<?php
  session_start();
  include_once("../conexao.php");

  //Receber o número da página
  $pagina_atual = filter_input (INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
  $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

  //Definir a quantidade de itens da página.
  $qnt_result_pg = 5;

  //Calcular o início visualização
  $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

  //Consultar as informações no banco de dados
  $result_medicamento = "SELECT * FROM medicamento LIMIT $inicio, $qnt_result_pg"; 
  $resultado_medicamento = mysqli_query($conexao, $result_medicamento);
  
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
                    <form class="form-inline" method="GET" action="pesquisar_atendimento.php">
                      <div class="form-group">
                        <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Nome do Medicamento">&nbsp&nbsp
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>
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
                      <?php while($rows_medicamento = mysqli_fetch_assoc($resultado_medicamento)){ ?>
                        <tr>
                          <td>
                            <?php echo $rows_medicamento['id']; ?>
                          </td>
                          <td>
                            <?php echo $rows_medicamento['nomeMedicamento']; ?>
                          </td>
                          <div class="col-md-3">
                            <td class="float-right">
                              <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_medicamento['id']; ?>"><i class='fa fa-eye'></i></button>
                              <button type="button" class="btn btn-xs btn-warning" data-target="#exampleModal">
                                <?php echo "<a href='editar_medicamento_atendimento.php?id=" . $rows_medicamento['id']. "'><i class='fa fa-edit'></i></a>"?></button>
							  <button type="button" class="btn btn-xs btn-danger">
								<?php echo "<a href='proc_apagar_medicamento_atendimento.php?id=" . $rows_medicamento['id'] . "' data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class='fa fa-trash-alt'></i></a>"?></button>
							</td>
                          </div>
                        </tr>
                </div>
                  
                <!--Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $rows_medicamento['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-left" id="myModalLabel"><?php echo $rows_medicamento['nomeMedicamento']; ?></h4> </div>
                      <div class="modal-body">
                        <div class="container-fluid">
                          <h4 class="modal-title text-left" id="myModalLabel">Cadastro de Medicamento</h4>
                          <br>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Genérico: </strong>'.$rows_medicamento['genericoMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Fabricante: </strong>'.$rows_medicamento['fabricanteMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Tipo: </strong>'.$rows_medicamento['tipoMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Nome Genérico: </strong>'.$rows_medicamento['nomeGenMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-6">
                                <?php echo'<strong>Nome de Fábrica: </strong>'.$rows_medicamento['nomeFabMedicamento']; ?></div>
                            </div>
                          </p>
                          <p>
                            <div class="row">
                              <div class="col-md-8">
                                <?php echo'<strong>Observações: </strong>'.$rows_medicamento['observacoesMedicamento']; ?></div>
                            </div>
                          </p>
						<hr class="mb-4">
                          <div class="row">
                            <div class="col-4 mb-3"><a class="btn btn-primary" href="consulta_medicamento_atendimento.php" role="button"><i class="fa fa-times"></i> Sair</a> </div>
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
	
	  <!-- Inserir número de página -->
      <?php  
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM receita";
		$resultado_pg = mysqli_query($conexao, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
			
		//Quantidade de paginas 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
			
		//Limitar os links antes depois do número da página
		$max_links = 2;
        
        echo '<nav aria-label="paginacao">';
        echo '<ul class="pagination">';
        echo '<li class="page-item">';
        echo "<span class='page-link'><a href='consulta_medicamento_atendimento.php?pagina=1'>Primeira</a></span>";
        echo '</li>';
  
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		  if($pag_ant >= 1){
		    echo "<li class='page-item'><a class='page-link' href='consulta_medicamento_atendimento.php?pagina=$pag_ant'>$pag_ant</a></li>";
		    }
		}
        echo '<li class="page-item active">';
        echo '<span class="page-link">';
        echo "$pagina";
        echo '</span>';
        echo '</li>';
        
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
		  if($pag_dep <= $quantidade_pg){
		    echo "<li class='page-item'><a class='page-link' href='consulta_medicamento_atendimento.php?pagina=$pag_dep'>$pag_dep</a></li>";
		    }
		}
        echo '<li class="page-item">';
        echo "<span class='page-link'><a href='consulta_medicamento_atendimento.php?pagina=$quantidade_pg'>Última</a></span>";
        echo '</li>';
        echo '</ul>';
        echo '</nav>';
  
      ?>

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