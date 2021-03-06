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

    <!-- Mascaras de objetos -->
    <script type="text/javascript">
      function fMasc(objeto, mascara) {
        obj = objeto
        masc = mascara
        setTimeout("fMascEx()", 1)
      }

      function fMascEx() {
        obj.value = masc(obj.value)
      }

      function mTel(tel) {
        tel = tel.replace(/\D/g, "")
        tel = tel.replace(/^(\d)/, "($1")
        tel = tel.replace(/(.{3})(\d)/, "$1)$2")
        if (tel.length == 9) {
          tel = tel.replace(/(.{1})$/, "-$1")
        }
        else if (tel.length == 10) {
          tel = tel.replace(/(.{2})$/, "-$1")
        }
        else if (tel.length == 11) {
          tel = tel.replace(/(.{3})$/, "-$1")
        }
        else if (tel.length == 12) {
          tel = tel.replace(/(.{4})$/, "-$1")
        }
        else if (tel.length > 12) {
          tel = tel.replace(/(.{4})$/, "-$1")
        }
        return tel;
      }

      function mCel(cel) {
        cel = cel.replace(/\D/g, "")
        cel = cel.replace(/^(\d)/, "($1")
        cel = cel.replace(/(.{3})(\d)/, "$1)$2")
        if (cel.length == 9) {
          cel = cel.replace(/(.{1})$/, "-$1")
        }
        else if (cel.length == 10) {
          cel = cel.replace(/(.{2})$/, "-$1")
        }
        else if (cel.length == 11) {
          cel = cel.replace(/(.{3})$/, "-$1")
        }
        else if (cel.length == 12) {
          cel = cel.replace(/(.{4})$/, "-$1")
        }
        else if (cel.length > 12) {
          cel = cel.replace(/(.{4})$/, "-$1")
        }
        return cel;
      }

      function mCNPJ(cnpj) {
        cnpj = cnpj.replace(/\D/g, "")
        cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")
        cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
        cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")
        cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")
        return cnpj
      }

      function mCPF(cpf) {
        cpf = cpf.replace(/\D/g, "")
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
        return cpf
      }

      function mCEP(cep) {
        cep = cep.replace(/\D/g, "")
        cep = cep.replace(/^(\d{2})(\d)/, "$1.$2")
        cep = cep.replace(/\.(\d{3})(\d)/, ".$1-$2")
        return cep
      }

      function mNum(num) {
        num = num.replace(/\D/g, "")
        return num
      }
    </script>
    
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
            <h3 class="h3" style="margin-left: 140px">Cadastrar Paciente</h3>
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
        
          <form class="form-horizontal" method="post" action="recebe_cadastro_paciente_atendimento.php">
            <div class="row">
              <div class="col-md-8 mb-3">
                <label for="nomePaciente">Nome:</label>
                <input type="text" name="nomePaciente" class="form-control" id="nomePaciente" placeholder="Nome completo" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="cpfPaciente">CPF:</label>
                <input type="text" name="cpfPaciente" class="form-control" id="cpfPaciente" placeholder="CPF" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" size="14" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="dataNascPaciente">Data de Nascimento:</label>
                <input type="date" name="dataNascPaciente" class="form-control" id="dataNascPaciente" placeholder="Data de Nascimento">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="convenioPaciente">Convênio:</label>
                <select class="custom-select d-block w-100" name="convenioPaciente" id="convenioPaciente">
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
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="telResPaciente">Telefone Residencial:</label>
                <input type="text" name="telResPaciente" class="form-control" id="telResPaciente" placeholder="Telefone residencial" onkeydown="javascript: fMasc( this, mTel );" maxlength="13" size="13">
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="celularPaciente">Celular:</label>
                <input type="text" name="celularPaciente" class="form-control" id="celularPaciente" placeholder="Celular" onkeydown="javascript: fMasc( this, mCel );" maxlength="14" size="14">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="emailPaciente">Email: <span class="text-muted"></span></label>
                <input type="email" name="emailPaciente" class="form-control" id="emailPaciente" placeholder="voce@example.com.br">
                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="enderecoPaciente">Endereço:</label>
                <input type="text" name="enderecoPaciente" class="form-control" id="enderecoPaciente" placeholder="Rua / Número">
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="bairroPaciente">Bairro:</label>
                <input type="text" name="bairroPaciente" class="form-control" id="bairroPaciente" placeholder="Bairro">
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="cidadePaciente">Cidade:<span class="text-muted"></span></label>
                <input type="text" name="cidadePaciente" class="form-control" id="cidadePaciente" placeholder="Escolha a cidade"> </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="estadoPaciente">Estado:</label>
                <select class="custom-select d-block w-100" name="estadoPaciente" id="estadoPaciente">
                  <option value="">Escolha o estado</option>
                  <option>Amazonas</option>
                  <option>Bahia</option>
                  <option>Minas Gerais</option>
                  <option>Mato Grosso</option>
                  <option>Rio de Janeiro</option>
                  <option>São Paulo</option>
                </select>
                <div class="invalid-feedback"> Please provide a valid state. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="paisPaciente">País:</label>
                <select class="custom-select d-block w-100" name="paisPaciente" id="paisPaciente">
                  <option value="">Escolha o país</option>
                  <option>Brasil</option>
                  <option>Chile</option>
                  <option>Canadá</option>
                  <option>Estados Unidados</option>
                  <option>Japão</option>
                  <option>Portugal</option>
                </select>
                <div class="invalid-feedback"> Please select a valid country. </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="cepPaciente">CEP:</label>
                <input type="text" name="cepPaciente" class="form-control" id="cepPaciente" placeholder="CEP" onkeydown="javascript: fMasc( this, mCEP );" maxlength="10" size="10">
                <div class="invalid-feedback"> Zip code required. </div>
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