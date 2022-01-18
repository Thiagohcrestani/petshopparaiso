<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id = $_POST['id'];


$sql = $conn->query("Select * from vacinas where id_vacina = $id");

while ($result = $sql->fetch_assoc()) :
    $id = $result['id_vacina'];
    $cliente = $result['id_cliente'];
    $pet = $result['id_pet'];
    $data = $result['data_vacina'];
    $observacoes = $result['tipo_vacina'];
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
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css">
 -->
</head>

<body>
<main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-xl-6">
                    <form class="col-lg-12 col-xl-12" name="pagina" method="post" action="UpdateVacina.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                            <h1 class="display-4 ">Editar Vacina</h1>
                        </label>
                        <section>
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                            <div class="form-group row">
                                <label for="cliente" class="col-sm-3 col-form-label">Cliente:</label>
                                <div class="col-sm-9">
                                <select class="form-control" name="cliente" id="cliente" onchange="buscarPet(this.value); buscarCliente(this.value)">
                                        <option disabled selected>Selecione o Cliente</option>
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
                                <label for="cliente" class="col-sm-3 col-form-label">Pet:</label>
                                <div class="col-sm-9" id="resultado">
                                <select class="form-control" name="pet" id="pet">
                                        <option disabled selected>Selecione o Pet</option>
                                        <?php
                                        $result_pet = $conn->query("select * from cadastropet where id_cliente = '$cliente';");
                                        while ($row_result_pet = mysqli_fetch_assoc($result_pet)) { ?>

                                            <option value="<?php echo $row_result_pet['id_pet']; ?>" <?php if ($row_result_pet['id_pet'] == $pet) {
                                                                                                            echo " selected ";
                                                                                                        } ?>><?php echo $row_result_pet['nome_pet']; ?></option>

                                        <?php

                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Data Vacina: </label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="date" class="form-control" name="datavacina" id="datavacina" value="<?php echo $data ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tipo Vacina:</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" rows="5" cols="33" name="observacoes" id="observacoes" value="<?php echo $observacoes ?>"><?php echo $observacoes ?></textarea>
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