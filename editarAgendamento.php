<!DOCTYPE html>
<?php

include('seguranca.php');
include('include/config.dba.php');
if (!verificaSessao()) {
    header("location: TelaLogin.php");
}

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id = $_POST['id'];


$sql = $conn->query("Select * from agendamento where id_agendamento = {$id}");

while ($result = $sql->fetch_assoc()) :
    $id = $result['id_agendamento'];
    $cliente = $result['cliente_agendamento'];
    $pet = $result['pet_agendamento'];
    $dataagendamento = $result['data_agendamento'];
    $horaagendamento = $result['hora_agendamento'];
    $servico = $result['servico_agendamento'];
    $observacoes = $result['observacoes_agendamento'];

endwhile;
$dateHtml = date("Y-m-d\TH:i:s", strtotime($dataagendamento));
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Editar Agendamento </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="funcs.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css">
 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="imagem">

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-xl-6">
                    <form class="col-lg-12 col-xl-12" name="pagina" method="post" action="UpdateAgendamento.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                            <h1 class="display-4 ">Editar Agendamento</h1>
                        </label>
                        <section>
                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></input>
                            <div class="form-group row">
                                <label for="cliente" class="col-sm-3 col-form-label">Cliente:</label>
                                <input class="form-control" type="hidden" name="nomecliente" id="nomecliente">
                                <div class="col-sm-9">
                                    <select class="form-control js-example-basic-single" name="cliente" id="cliente" onchange="buscarPet(this.value); buscarCliente(this.value)">
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
                                    <select class="form-control js-example-basic-single" name="pet" id="pet">
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
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Data: </label>
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                        <input type="date" class="form-control" name="dataagendamento" id="dataagendamento" value="<?php echo $dataagendamento ?>">
                                    </div>
                                    <label for="nome" class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-form-label">Hora: </label>
                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3">
                                        <input type="time" class="form-control" name="horaagendamento" id="horaagendamento" value="<?php echo $horaagendamento ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="servico" class="col-sm-3 col-form-label">Serviço</label>
                                <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                    <select class="form-control" name="servicoagendamento" required>
                                        <option disabled selected>Tipo do serviço</option>
                                        <option value="Banho" <?php if ($servico == "Banho") {
                                                                    echo " selected ";
                                                                } ?>>Banho</option>
                                        <option value="Tosa" <?php if ($servico == "Tosa") {
                                                                    echo " selected ";
                                                                } ?>>Tosa</option>
                                        <option value="Banho e Tosa" <?php if ($servico == "Banho e Tosa") {
                                                                            echo " selected ";
                                                                        } ?>>Banho e tosa</option>
                                        <option value="Consulta" <?php if ($servico == "Consulta") {
                                                                        echo " selected ";
                                                                    } ?>>Consulta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Observações</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" rows="5" cols="33" name="observacoesagendamento" id="observacoesagendamento" value="<?php echo $observacoes ?>"><?php echo $observacoes ?></textarea>
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
<script src="funcoesAgendamento.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    function ValidaCPF() {
        var strCPF = $("#cpf").val();
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") {
            alert("CPF Inválido");
            strCPF = $("#cpf").val("");
            $("#cpf").focus();
            return false;
        }

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) {
            alert("CPF Inválido");
            strCPF = $("#cpf").val("");
            $("#cpf").focus();
            return false;
        }
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) {
            alert("CPF Inválido");
            strCPF = $("#cpf").val("");
            $("#cpf").focus();
            return false;
        }
        return true;
    }


    function verificaCpf() {
        var cpf = $("#cpf").val();

        $.ajax({
            type: "POST",
            url: "VerificaCpf.php",
            data: {
                cpf: cpf
            }

        }).done(function(data) {
            if (data != "") {
                var txt;
                var r = confirm(data);
                if (r == true) {

                } else {

                    $("#cpf").val("");
                    $("#cpf").focus();
                    return false;

                }

            }



        })

    }

    function Mask($mask, $str) {

        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;

    }
</script>

</html>