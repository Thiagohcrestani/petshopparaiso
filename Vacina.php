<!DOCTYPE html>
<?php

include('seguranca.php');
include('include/config.dba.php');
if (!verificaSessao()) {
    header("location: TelaLogin.php");
}

?>
<style>
    .inv {
        display: none;
    }
</style>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Nova Vacina </title>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="funcs.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="estilo.css" rel="stylesheet" type="text/css" />



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />


</head>

<body class="imagem">
    <?php
    include("include/menu.php");
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-xl-6">
                    <form class="col-lg-12 col-xl-12" name="pagina" method="post" action="ValidaVacina.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                            <h1 class="display-4 ">Agendar Vacina</h1>
                        </label>
                        <section>
                            <div class="form-group row">
                                <label for="cliente" class="col-sm-3 col-form-label">Cliente:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="cliente" id="cliente" onchange="buscarPet(this.value);">
                                        <option disabled selected>Selecione o Cliente</option>
                                        <?php
                                        $result_clientes = $conn->query("Select c.*,p.id_cliente from cadastrocliente c inner join pacotes p on (c.id_cliente = p.id_cliente) order by nome_cliente");
                                        while ($row_result_clientes = mysqli_fetch_assoc($result_clientes)) { ?>

                                            <option value="<?php echo $row_result_clientes['id_cliente']; ?>"><?php echo $row_result_clientes['nome_cliente']; ?></option>

                                        <?php

                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cliente" class="col-sm-3 col-form-label">Pet:</label>
                                <div class="col-sm-9" id="resultado">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Data Vacina: </label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="date" class="form-control" name="datavacina" id="datavacina">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tipo Vacina:</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" rows="5" cols="33" name="observacoes" id="observacoes"></textarea>
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
<script src="funcoesVacina.js"></script>
<script>
    function ValidaCPF() {
        var strCPF = $("#cpf").val();
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") {
            alert("CPF Inv??lido");
            strCPF = $("#cpf").val("");
            $("#cpf").focus();
            return false;
        }

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) {
            alert("CPF Inv??lido");
            strCPF = $("#cpf").val("");
            $("#cpf").focus();
            return false;
        }
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) {
            alert("CPF Inv??lido");
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
