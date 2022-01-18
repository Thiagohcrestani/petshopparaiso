<?php

include('seguranca.php');
if (!verificaSessao()) {
    header("location: TelaLogin.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="funcs.js"></script>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    <script src="funcoespacote.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
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

</head>

<body class="imagem">
    <?php
    include("include/menu.php");
    ?>


    <div class="row" style="margin-left:2px; margin-right:2px;">
        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-0"></div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" id="pesquisa">
            <div class="row">
                <a class="navbar-brand" href="index_menu.php"><img src="img/lupa.png" width="100" height="100" alt="login"></a>
                <label for="nome" class="col-sm-8">
                    <h1 class="display-4">Pequisar Pacote</h1>
                </label>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="text" class="form-control" name="nome" size="24" id="busca" onkeyup="buscarNoticias(this.value)">
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <button type="button" class="btn btn-success btn-lg" onclick="buscarNoticias(this.value)"><svg xmlns="http://www.w3.org/2000/svg" width="85" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>

                </div>

                <br>
                <br>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6" id="conteudo"></div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6" id="resultado"></div>
                <br>
                <br>

            </div>
        </div>
    </div>
    <div id="divEdit"> </div>
</body>
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a>Deseja Realmente Remover este Pacote?</a>
            </div>
            <div class="modal-footer">
                <button id="Confirma" class="btn btn-danger">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap CSS -->


</html>