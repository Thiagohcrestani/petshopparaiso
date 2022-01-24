<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id = $_POST['id'];


$sql = $conn->query("Select * from cadastrocliente where id_cliente = $id");

while ($result = $sql->fetch_assoc()) :
    $id = $result['id_cliente'];
    $nome = $result['nome_cliente'];
    $logradouro = $result['logradouro_cliente'];
    $numero = $result['numeroresidencia_cliente'];
    $bairro = $result['bairro_cliente'];
    $cidade = $result['cidade_cliente'];
    $estado = $result['estado_cliente'];
    $cpf = $result['cpf_cliente'];
    $telefone = $result['telefone_cliente'];

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
                    <form class="col-lg-12 col-xl-12" name="pagina" method="post" action="UpdateCliente.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                            <h1 class="display-4 ">Editar Cliente</h1>
                        </label>
                        <section>
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Nome Cliente:</label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="endereco" class="col-sm-3 col-form-label">Endereço:</label>
                                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $logradouro ?>">
                                </div>
                                <label for="numero" class="col-lg-3 col-xl-2 col-md-3 col-sm-1 col-form-label">Número:</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="numero" id="numero" value="<?php echo $numero ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bairro" class="col-sm-3 col-form-label">Bairro:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $bairro ?>">
                                </div>
                                <label for="cidade" class="col-lg-3 col-xl-2 col-md-3 col-sm-1 col-form-label">Cidade:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="estado" class="col-sm-3 col-form-label">Estado:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="estado" required>
                                        <option value="AC"<?php if ($estado == "AC") {echo " selected ";} ?>>Acre</option>
                                        <option value="AL"<?php if ($estado == "AL") {echo " selected ";} ?>>Alagoas</option>
                                        <option value="AP"<?php if ($estado == "AP") {echo " selected ";} ?>>Amapá</option>
                                        <option value="AM"<?php if ($estado == "AM") {echo " selected ";} ?>>Amazonas</option>
                                        <option value="BA"<?php if ($estado == "BA") {echo " selected ";} ?>>Bahia</option>
                                        <option value="CE"<?php if ($estado == "CE") {echo " selected ";} ?>>Ceará</option>
                                        <option value="DF"<?php if ($estado == "DF") {echo " selected ";} ?>>Distrito Federal</option>
                                        <option value="ES"<?php if ($estado == "ES") {echo " selected ";} ?>>Espírito Santo</option>
                                        <option value="GO"<?php if ($estado == "GO") {echo " selected ";} ?>>Goiás</option>
                                        <option value="MA"<?php if ($estado == "MA") {echo " selected ";} ?>>Maranhão</option>
                                        <option value="MT"<?php if ($estado == "MT") {echo " selected ";} ?>>Mato Grosso</option>
                                        <option value="MS"<?php if ($estado == "MS") {echo " selected ";} ?>>Mato Grosso do Sul</option>
                                        <option value="MG"<?php if ($estado == "MG") {echo " selected ";} ?>>Minas Gerais</option>
                                        <option value="PA"<?php if ($estado == "PA") {echo " selected ";} ?>>Pará</option>
                                        <option value="PB"<?php if ($estado == "PB") {echo " selected ";} ?>>Paraíba</option>
                                        <option value="PR"<?php if ($estado == "PR") {echo " selected ";} ?>>Paraná</option>
                                        <option value="PE"<?php if ($estado == "PE") {echo " selected ";} ?>>Pernambuco</option>
                                        <option value="PI"<?php if ($estado == "PI") {echo " selected ";} ?>>Piauí</option>
                                        <option value="RJ"<?php if ($estado == "RJ") {echo " selected ";} ?>>Rio de Janeiro</option>
                                        <option value="RN"<?php if ($estado == "RN") {echo " selected ";} ?>>Rio Grande do Norte</option>
                                        <option value="RS"<?php if ($estado == "RS") {echo " selected ";} ?>>Rio Grande do Sul</option>
                                        <option value="RO"<?php if ($estado == "RO") {echo " selected ";} ?>>Rondônia</option>
                                        <option value="RR"<?php if ($estado == "RR") {echo " selected ";} ?>>Roraima</option>
                                        <option value="SC"<?php if ($estado == "SC") {echo " selected ";} ?>>Santa Catarina</option>
                                        <option value="SP"<?php if ($estado == "SP") {echo " selected ";} ?>>São Paulo</option>
                                        <option value="SE"<?php if ($estado == "SE") {echo " selected ";} ?>>Sergipe</option>
                                        <option value="TO"<?php if ($estado == "TO") {echo " selected ";} ?>>Tocantins</option>
                                        <option value="EX"<?php if ($estado == "EX") {echo " selected ";} ?>>Estrangeiro</option>
                                    </select>
                                </div>
                                <label for="cpf" class="col-lg-3 col-xl-2 col-md-3 col-sm-1 col-form-label">CPF:</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>" onchange="verificaCpf(); ValidaCPF();">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Telefone:</label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="text" class="form-control telefone" name="telefone" id="telefone" value="<?php echo $telefone ?>">
                                    </div>
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