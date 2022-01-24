<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id = $_POST['id'];


$sql = $conn->query("Select * from pacotes where id_pacote = $id");

while ($result = $sql->fetch_assoc()) :
    $id = $result['id_pacote'];
    $id_cliente = $result['id_cliente'];
    $banhos = $result['banhos_pacote'];
    $valor = $result['valor_pacote'];
    $telefone = $result['telefone_pacote'];
    $observacoes = $result['observacoes_pacote'];
endwhile;


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Editar Pacote </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="funcs.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />
    
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css">
 -->
</head>

<body class="imagem">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-xl-6">
                    <form class="col-lg-12 col-xl-12" name="pagina" method="post" action="UpdatePacote.php">
                        <br>
                        <a class="navbar-brand" href="index_menu.php"><img src="img/usuario.png" width="150" height="150" alt="login"></a>
                        <label for="nome" class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                            <h1 class="display-4 ">Editar Pacote</h1>
                        </label>
                        <section>
                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                            <div class="form-group row">
                                <label for="cliente" class="col-sm-3 col-form-label">Cliente</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="cliente" id="cliente">
                                        <?php
                                        $result_clientes = $conn->query("Select * from cadastrocliente order by nome_cliente");
                                        while ($row_result_clientes = mysqli_fetch_assoc($result_clientes)) { ?>
                                            <option value="<?php echo $row_result_clientes['id_cliente']; ?>" <?php if ($row_result_clientes['id_cliente'] == $id_cliente) {
                                                                                                                    echo " selected ";
                                                                                                                } ?>><?php echo $row_result_clientes['nome_cliente']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="endereco" class="col-sm-3 col-form-label">Banhos Pacote</label>
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6">
                                    <input type="nummber" readonly="readonly" class="form-control" name="banhospacote" id="banhospacote" style="text-align:center;" value="<?php echo $banhos ?>">
                                </div>
                                <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2">
                                    <input type="button" class="btn btn-success" onclick="clearx()" value="Renovar Pacote">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Valor Pacote:</label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="text" class="form-control dinheiro" name="valorpacote" id="valorpacote" style="text-align:center;" value="<?php echo $valor ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="nome" class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-form-label">Telefone:</label>
                                    <div class="col-lg-8 col-xl-9 col-md-8 col-sm-8">
                                        <input type="text" class="form-control telefone" name="telefone" id="telefone" value="<?php echo $telefone ?>">
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Itens + /Observações</label>
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
</body>
<script>
    $(document).ready(function($) {
        $('.dinheiro').mask('#.##0.00', {
            reverse: true,
            symbol: "R$",
            showSymbol: true,
            symbolStay: true
        });
        $("#valorpacote").maskMoney({
            thousands: ".",
            decimal: ",",
            symbol: "R$",
            showSymbol: true,
            symbolStay: true
        });
    });

    function clearx() {
        document.getElementById('banhospacote').value = '4';
    }
</script>

</html>