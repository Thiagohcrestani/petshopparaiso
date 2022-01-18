<head>
  <?php
  //Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
  include('seguranca.php');

  if (!verificaSessao()) {
    header("location: TelaLogin.php");
  }
  ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Início</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="funcs.js"></script>
  <link href="estilo.css" rel="stylesheet" type="text/css" />
  <script src="funcoesMenu.js"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  <!--<link href="include/cssmenu.css" rel="stylesheet" type="text/css" />-->
</head>

<body class="imagem">
  <?php
  include("include/menu.php");
  ?>

  <div class="container-fluid" id="pesquisa">
    <div class="row">
      <div id="conteudo" class="col-lg-12 col-xl-12 col-md-12 col-sm-12"></div>
      <script>
        $(document).ready(function() {
          $.post('calendarioAgendamentos.php', function(retorna) {
            $("#conteudo").html(retorna)
          });
        });
      </script>
    </div>
  </div>
</body>