<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Administrativo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- relogio top-->
<script type="text/javascript">
 function startTime() {
     var today=new Date();
     var h=today.getHours();
     var m=today.getMinutes();
     var s=today.getSeconds();
     // add a zero in front of numbers<10
     m=checkTime(m);
     s=checkTime(s);
     document.getElementById('txt').innerHTML=h+":"+m+":"+s;
     t=setTimeout('startTime()',500);
 }

 function checkTime(i){
 if (i<10) {
     i="0" + i;
 }
     return i;
 }
 </script>
 <!-- relogio top-->
  <!-- mascara-->
  <script type="text/javascript">
    $("#datanasc").mask("00/00/0000");
    $(".datapro").mask("00/00/0000");
    $("#data").mask("00/00/0000");
    $("#telefone").mask("(00) 0000-0000");
    $("#telcom").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
</script>
 <!-- mascaras-->
 <!-- Inicio busca cep -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
           // document.getElementById('ibge').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
           // document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
     function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
               // document.getElementById('ibge').value="...";
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
 </script>

 <script>
    function somenteNumeros(num) {
        var er = /[^0-9-./]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
 </script>
<script>
    $("#cnpj").mask("99.999.999/9999-99");
    $("#cep").mask("00000-000");
    $("#data").mask("00/00/0000");
    $("#datap1").mask("00/00/0000");
    $("#datap2").mask("00/00/0000");
    $("#datap3").mask("00/00/0000");
    $("#telefone").mask("(00) 0000-0000");
    $("#telcom").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
</script>
<script>
$(function() {
  var civil = [
    "Casado",
    "Casada",
    "Solteiro",
    "Solteira"
  ];
  $("#civil" ).autocomplete({
    source: civil
  });
});
</script>
  </head>

  <body>
  <?php
	session_start();
	echo "Usuario: ". $_SESSION['usuarioNome'];	
?>
<br>
<a href="sair.php">Sair</a>




 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
        <div class="navbar-header">
                      
        </div>

          <div style="text-align:right" class="col-sm-15 text-right h3"><a class="navbar-brand" href="https://www.emgeral.com.br/cadastro/">
                         <img src="https://www.emgeral.com.br/assets/images/logoemgeral-74x65.png" alt="Em Geral">
                    </a></a>
           <form method="get" class="form-group col-md-4" action="abusca.php"><!--calendario datapicker -->
    <input type="text" class="form-control input-lg" name="busca" placeholder="nome ou cod e enter"></form><form method="get" class="form-group col-md-1" name="menuForm" action="abusca.php">
     <select class="form-control input-lg" name="busca" onchange="document.forms['menuForm'].submit();">
         <option value="">#</option>
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
          <option value="d">D</option>
          <option value="e">E</option>
          <option value="f">F</option>
          <option value="g">G</option>
          <option value="h">H</option>
          <option value="i">I</option>
          <option value="j">J</option>
          <option value="k">K</option>
          <option value="l">L</option>
          <option value="m">M</option>
          <option value="n">N</option>
          <option value="o">O</option>
          <option value="p">P</option>
          <option value="q">Q</option>
          <option value="r">R</option>
          <option value="s">S</option>
          <option value="t">T</option>
          <option value="u">U</option>
          <option value="v">V</option>
          <option value="w">W</option>
          <option value="x">X</option>
          <option value="y">Y</option>
          <option value="z">Z</option>
     </select> </form>
         <h4>Teste<br></h4>
<body onload="startTime()">
<div><font color="#084E6C" id="txt"></font>       <a class="btn btn-warning" href="agenda.php" title="Agenda"><i class="fas fa-calendar-alt"></i></a>
        <a class="btn btn-primary btn-lg" href="addtbc.php" title="Adicionar"><i class="fas fa-plus"></i></a>
        <a class="btn btn-danger" href="sair.php" title="Sair"><i class="fas fa-user"></i></a>
     </div>
  <font color="red"></font>
</div>
              </div><!--/.navbar-collapse -->

            </div>
    </nav>
    <main class="container">
  </body>
 </html><html>
<head>
<!-- data do calendario-->
<link rel="stylesheet" href="css/redmond/jquery-ui-1.10.1.custom.css" />
<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<!-- calendario inicio-->
<style>
 body {
    font-family: Verdana, Arial, sans-serif;
    font-size: 14px;
}
.ui-datepicker-week-end a {
    color: red !important;
}
hr{
  border-color:#aaa;
  box-sizing:border-box;
  width:100%;  
}
</style>
  <script>
now = new Date();
    var feriados, i, dias;
    <!-- Array com os feriados -->
    var feriados = [
        "01/01/" + now.getFullYear() + " - Confraternização Universal",
        "08/01/" + now.getFullYear() + " - São Sebastião",
        //Fevereiro
        "09/02/" + now.getFullYear() + " - Carnaval",
        "10/02/" + now.getFullYear() + " - Cinzas",
        //Março
        "01/03/" + now.getFullYear() + " - Aniversário da Cidade",
        "08/03/" + now.getFullYear() + " - Dia Internacional da Mulher",
        "23/03/" + now.getFullYear() + " - Paixão de Cristo",
        //Abril
        "19/04/" + now.getFullYear() + " - Dia do índio",
        "21/04/" + now.getFullYear() + " - Tiradentes",
        "22/04/" + now.getFullYear() + " - Descobrimento do Brasil",
        "23/04/" + now.getFullYear() + " - Dia de São Jorge",
        
        //Maio
        "01/05/" + now.getFullYear() + " - Dia do Trabalho",
        "28/05/" + now.getFullYear() + " - Corpus Cristi",
        //Junho

        //Agosto
        "14/08/" + now.getFullYear() + " - Dia dos Pais",

        //Setembro
        "07/09/" + now.getFullYear() + " - Independência do Brasil",

        //Outubro
        "12/10/" + now.getFullYear() + " - Nsa. Sra. Aparecida",
        "15/10/" + now.getFullYear() + " - Dia dos Professores",
        "19/10/" + now.getFullYear() + " - Dia do Comércio",
        "20/10/" + now.getFullYear() + " - Dia do funcionário Público",

        //Novembro
        "02/11/" + now.getFullYear() + " - Finados",
        "15/11/" + now.getFullYear() + " - Proclamação da Republica",
        "19/11/" + now.getFullYear() + " - Dia da Bandeira",
        "20/11/" + now.getFullYear() + " - Dia da Consciência Negra/Zumbi dos Palmares",

        //Dezembro
        "25/12/" + now.getFullYear() + " - Natal"
    ];
    
    var dias = [
          "01/01/" + now.getFullYear(),
          "08/01/" + now.getFullYear(),

          //Fevereiro
          "09/02/" + now.getFullYear(),
          "10/02/" + now.getFullYear(),

          //Março
          "01/03/" + now.getFullYear(),
          "08/03/" + now.getFullYear(),
          "23/03/" + now.getFullYear(),

          //Abril
          "19/04/" + now.getFullYear(),
          "21/04/" + now.getFullYear(),
          "22/04/" + now.getFullYear(),
          "23/04/" + now.getFullYear(),
          
          //Maio
          "01/05/" + now.getFullYear(),
          "28/05/" + now.getFullYear(),

          //Junho

          //Agosto
          "14/08/" + now.getFullYear(),

          //Setembro
          "07/09/" + now.getFullYear(),

          //Outubro
          "12/10/" + now.getFullYear(),
          "15/10/" + now.getFullYear(),
          "19/10/" + now.getFullYear(),
          "20/10/" + now.getFullYear(),

          //Novembro
          "02/11/" + now.getFullYear(),
          "15/11/" + now.getFullYear(),
          "19/11/" + now.getFullYear(),
          "20/11/" + now.getFullYear(),

          //Dezembro
          "25/12/" + now.getFullYear(),
    ];

  $(function() {
    $(".dataagenda").datepicker({
  minDate: 0,
  setDate: "today",
  language: "pt-BR",
  todayHighlight: "true",
  dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
  dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
  dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
  monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
  monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    dateFormat: 'dd/mm/yy',
    nextText: 'Próximo',
    prevText: 'Anterior',
  inline: true,
  beforeShowDay:function(dateText, inst) {
           var datepickerDay = ('0' + dateText.getDate()).slice(-2) + '/'
      + ('0' + (dateText.getMonth()+1)).slice(-2) + '/'
      + dateText.getFullYear();
    console.log(datepickerDay);
        if(dias.indexOf(datepickerDay.trim()) > -1) {
        return [false, "", feriados[dias.indexOf(datepickerDay)].split('-')[1]];
    }
    return [true, "", ""];
  },
});
$(document).on('click', '#ui-datepicker-div .ui-state-disabled', function() {
    alert('Feriado');
});
});
 </script>
  </body>
 </html>
 <br>
 <br><html>
<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
</head>
<body>
    <script>
function show_delall() {
  if(confirm("!!! MUITA ATENÇÃO !!! Deseja deletar esse Cliente?"))
    document.forms[0].submit();
  else 
    return false;}
</script>
   <h3>Clientes</h3>
        <table class="table table-hover">
        <th width="1%">Cód</th>
        <th width="20%" align="center">Razão Social</th>
        <th width="20%" align="center">Responsável</th>
        <th width="15%" align="center">Telefone</th>
        <th width="15%" align="center">Celular</th>
        <th width="15%" align="center">Agendar</th>
        <th width="15%" align="center">Opções</th>
</table>
    <table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=72" title="Editar">72</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=72" title="Editar">12123212</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=72" title="Editar">12123</a></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="72">
<input type=text hidden name="c1" value="12123212">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="72">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="72">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=31" title="Editar">31</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=31" title="Editar">A</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=31" title="Editar">A</a></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="31">
<input type=text hidden name="c1" value="A">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="31">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="31">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=15" title="Editar">15</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=15" title="Editar">abc</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=15" title="Editar">321</a></td>
    <td width="15%" align="center">(08) 0000-0</td>
    <td width="15%" align="center">(00) 00000</td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="15">
<input type=text hidden name="c1" value="abc">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="15">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="15">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=75" title="Editar">75</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=75" title="Editar">ABC comércio</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=75" title="Editar">Sr. ABC</a></td>
    <td width="15%" align="center">(99) 9999-9999</td>
    <td width="15%" align="center">(99) 99999-9999</td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="75">
<input type=text hidden name="c1" value="ABC comércio">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="75">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="75">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=16" title="Editar">16</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=16" title="Editar">abc do alfabeto</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=16" title="Editar">letras</a></td>
    <td width="15%" align="center">(00) 0000</td>
    <td width="15%" align="center">(00) 00</td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="16">
<input type=text hidden name="c1" value="abc do alfabeto">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="16">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="16">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=1" title="Editar">1</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=1" title="Editar">ADRIANO DA SILVA OLIVEIRA</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=1" title="Editar">ADRIANO</a></td>
    <td width="15%" align="center">(21) 2222-2222</td>
    <td width="15%" align="center">(21) 99999-9999</td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="1">
<input type=text hidden name="c1" value="ADRIANO DA SILVA OLIVEIRA">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="1">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="1">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=60" title="Editar">60</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=60" title="Editar">Aliesio</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=60" title="Editar">Aliesio</a></td>
    <td width="15%" align="center">(99) 9999-9999</td>
    <td width="15%" align="center">(99) 99999-9999</td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="60">
<input type=text hidden name="c1" value="Aliesio">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="60">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="60">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=66" title="Editar">66</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=66" title="Editar">ALL</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=66" title="Editar">Luciano</a></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="66">
<input type=text hidden name="c1" value="ALL">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="66">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="66">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=39" title="Editar">39</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=39" title="Editar">ANIMAL</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=39" title="Editar">JUMENTO</a></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="39">
<input type=text hidden name="c1" value="ANIMAL">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="39">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="39">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table><table class="table table-hover">
    <form class="form-group" action="agendaadd.php" method="post" autocomplete="off">
    <tr class="actions text-right">
    <td width="5%" align="left"><a href="edittbc.php?idc=77" title="Editar">77</a></td>
    <td width="25%" align="left" valign="middle"><a href="edittbc.php?idc=77" title="Editar">ASDasddASDasdaSDasd</a></td>
    <td width="20%" align="left"><a href="edittbc.php?idc=77" title="Editar">ASDasdaSDasdasd</a></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"></td>
    <td width="15%" align="center"><input class="dataagenda" autocomplete="new-password" type="text" name="data" placeholder="00/00/0000" style="width:80px;font-size:14px autocomplete="off" required="true">
    </td>
<td width="10%" align="center">
<input type=text hidden name="idc" value="77">
<input type=text hidden name="c1" value="ASDasddASDasdaSDasd">
<button type="submit" class="btn btn-warning" title="Agendar"><i class="fas fa-calendar-alt" ></i></button>
</td></form>
<form method="post"  name="dataForm" action="imprimircadastro.php" target="_blank">
<td><input type="hidden"  name="idc" value="77">
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button></form></td>
<td width="10%" align="center">
<form  method="post" id"form" name="dataForm" action="delcliente.php" onsubmit="return show_delall();">
  <input type="text" hidden name="idc" value="77">
  <button type="submit" class="btn btn-danger" title="Deletar" disabled><i class="fa fa-trash"></i>
</form></td>
    </table>    <nav aria-label="...">
<ul class="pagination">
        <li><a href="?pagina=1"><<</a></li>
        <li class="">
            <a href="#">Anterior</a>
        </li>
        <li class="disabled">
            <a href="#">#</a>
        </li>
<li class="active">
      <span class="">
            <a  href="" class="p-3 mb-2 bg-primary text-white">#</a>
        

      </span>
    </li>
        <li class="">
            <a href="?pagina=2">#</a>
        </li>

        <li class="">
            <a href="?pagina=2">Próximo</a>
        </li>
        <li><a href="?pagina=7"> >></a></li>
    </ul>
</nav>
    </main> <!-- /container -->
<hr>
		<footer class="container">
		<p>&copy; Cadastro de Cliente  - {Versão 1.0} - www.emgeral.com.br </p>
		<br>
		<div>
			PROMOÇÃO POR TEMPO LIMITADO: CÓDIGO FONTE PARA ESTUDO R$ 29,90.
			<br>
			Você pode comprar Este Código Fonte para estudos: Você Receberá o código completo com todos arquivos e pastas e banco de dados. Ótimo para quem está aprendendo PHP E MYSQL. Após pagamento será enviado para o e-mail.
			<!-- INICIO DO BOTAO PAGSEGURO --><a href="https://pag.ae/7VsQubrTQ/button" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a><!-- FIM DO BOTAO PAGSEGURO -->
			<br>
			You may purchase This Source Code for studies: You will receive the complete code with all files and folders and database. Great for those learning PHP and MYSQL. After payment will be sent to the email.
			<br>
			Puede comprar este código fuente para estudios: recibirá el código completo con todos los archivos, carpetas y bases de datos. Ideal para quienes aprenden PHP y MYSQL. Después del pago se enviará al correo electrónico.
		</div>
</footer>
</hr></body>
</html>