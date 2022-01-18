<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id = $_POST['id'];


$sql = $conn->query("Select * from cadastrousuario where id_usuario = $id");

while ($result = $sql->fetch_assoc()) :
    $id = $result['id_usuario'];
    $nome = $result['nome_usuario'];
    $login = $result['login_usuario'];
    $senha = $result['senha_usuario'];
    $tipo = $result['tipo_usuario'];
endwhile;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Editar Usuário </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="funcs.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css">
 -->
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 border-right">
                    <form class="col-lg-12 col-xs-10" name="pagina" method="post" action="UpdateUsuario.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-sm-8">
                            <h1 class="display-4">Editar Usuário</h1>
                        </label>
                        <section>
                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-3 col-form-label">Nome Usuário</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mail" class="col-sm-3 col-form-label">Login</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="login" id="login" value="<?php echo $login ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assunto" class="col-sm-3 col-form-label">Senha</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $senha ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="assunto" class="col-sm-3 col-form-label">Tipo Usuário</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="tipo_usuario" required>
                                        <option disabled selected>Tipo de acesso do Usuário</option>
                                        <option value="A" <?php if ($tipo == "A") {
                                                                echo " selected ";
                                                            } ?>>
                                            Administrador</option>
                                        <option value="C" <?php if ($tipo == "C") {
                                                                echo " selected ";
                                                            } ?>>
                                            Comum</option>
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
    </div>
</body>
 

</html>