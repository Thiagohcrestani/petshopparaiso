<?php
include_once("include/config.dba.php");
$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


$fuso = new DateTimeZone('America/New_York');
$data = new DateTime();
$data->setTimezone($fuso);
$dataatual = $data->format('Y-m-d');


$result_agendamento = "select a.*, c.nome_cliente, p.nome_pet from agendamento a inner join cadastrocliente c on(a.cliente_agendamento = c.id_cliente) inner join cadastropet p on (a.pet_agendamento = p.id_pet) order by a.data_agendamento ";


$resultado_agendamento = mysqli_query($conn, $result_agendamento);

?>



<table class="table table-bordered">
    <div style="text-align: center;">
        <h3>Agendametos da semana</h3>
    </div>

    <?php
    if (($resultado_agendamento) and ($resultado_agendamento->num_rows != 0)) {
        $dtTemp = '';
        while ($row_agendamento = mysqli_fetch_assoc($resultado_agendamento)) {

            if ($dtTemp != $row_agendamento['data_agendamento']) {
    ?>
                <thead bgcolor="orange" class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                    <tr>
                        <th ><?php echo date('d/m/Y', strtotime($row_agendamento['data_agendamento'])) ?></th>
                    </tr>
                </thead>
            <?php
            }
            ?>

            <tbody>
                <tr>
                    <td><b><?php echo $row_agendamento['nome_cliente'] ?><br>Pet: <?php echo $row_agendamento['nome_pet'] ?></b><br>Tipo Serviço: <b><?php echo $row_agendamento['servico_agendamento'] ?></b></td>
                </tr>

                <?php
                if ($dtTemp != $row_agendamento['data_agendamento']) {
                ?>
            </tbody>
        <?php
                }

                // Atualiza a data da variavel
                $dtTemp = $row_agendamento['data_agendamento'];
        ?>
    <?php
        }
    } else {
    ?>
    <thead class="thead bg-warning">
        <tr>
            <th>Nenhum agendamento encontrato</th>
        </tr>
    </thead>
<?php
    }
?>
</table>