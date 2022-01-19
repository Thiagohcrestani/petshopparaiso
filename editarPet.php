<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id = $_POST['id'];


$sql = $conn->query("Select * from cadastropet where id_pet = $id");

while ($result = $sql->fetch_assoc()) :
    $id = $result['id_pet'];
    $nome = $result['nome_pet'];
    $idade = $result['idade_pet'];
    $raca = $result['raca_pet'];
    $observacoes = $result['observacoes'];
    $cliente = $result['id_cliente'];
endwhile;


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="funcs.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css">
 -->
</head>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>


<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-xl-6">
                    <form class="col-lg-12 col-xl-12" name="pagina" method="post" action="UpdatePet.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                            <h1 class="display-4 ">Editar Pet</h1>
                        </label>
                        <section>
                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Nome Pet:</label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="endereco" class="col-sm-3 col-form-label">Idade</label>
                                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                    <input type="number" class="form-control" name="idade" id="idade" value="<?php echo $idade ?>">
                                </div>
                                <label for="numero" class="col-lg-3 col-xl-2 col-md-3 col-sm-1 col-form-label">Raça</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="raca" id="raca" value="<?php echo $raca ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliente" class="col-sm-3 col-form-label">Dono do Pet</label>
                                <div class="col-sm-9">
                                    <select class="form-control js-example-basic-single" name="cliente" id="cliente">
                                        <?php
                                        $result_clientes = $conn->query("Select * from cadastrocliente order by nome_cliente");
                                        while ($row_result_clientes = mysqli_fetch_assoc($result_clientes)) { ?>
                                            <option value="<?php echo $row_result_clientes['id_cliente']; ?>" <?php if ($row_result_clientes['id_cliente'] == $cliente) {
                                                                                                                    echo " selected ";
                                                                                                                } ?>><?php echo $row_result_clientes['nome_cliente']; ?></option>

                                        <?php

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Observações</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="observacoes" rows="5" cols="33" id="observacoes" value="<?php echo $observacoes ?>"><?php echo $observacoes ?></textarea>
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