<!DOCTYPE html>
<?php

include('seguranca.php');
include('include/config.dba.php');
if (!verificaSessao()) {
	header("location: TelaLogin.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Novo Usuário </title>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="estilo.css" rel="stylesheet" type="text/css" />
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


</head>

<body class="imagem">
<?php
	include("include/menu.php");
  ?> 
    <main>
        <div class="container-fluid">
            <div class="row">
			<div class="col-lg-3"></div>
                <div class="col-lg-6" >
                    <form class=" col-xs-12 col-lg-12 col-sm-12" name="pagina" method="post" action="ValidaUsuario.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php" ><img src="img/usuario.png" width="150" height="150" alt="login" ></a>
                        <label for="nome" class="col-sm-8 col-xs-8 col-lg-8" ><h1 class="display-4">Novo Usuário</h1></label>
                        <section>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-3 col-form-label">Nome Usuário</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nome" id="nome">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mail" class="col-sm-3 col-form-label">Login</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="login" id="login">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assunto" class="col-sm-3 col-form-label">Senha</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="senha" id="senha">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assunto" class="col-sm-3 col-form-label">Tipo Usuário</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="tipo_usuario" required>
                                        <option disabled selected>Tipo de acesso do Usuário</option>
                                        <option value="A">Administrador</option>
                                        <option value="C">Comum</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a class="btn btn-primary" href="index_menu.php">Pagina Principal</a>
                            <br>
                            <br>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>