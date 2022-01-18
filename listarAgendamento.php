<?php
include_once("include/config.dba.php");
$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


$fuso = new DateTimeZone('America/New_York');
$data = new DateTime();
$data->setTimezone($fuso);
$dataatual = $data->format('Y-m-d');




$result_agendamento = "select a.*, c.nome_cliente, p.nome_pet from agendamento a inner join cadastrocliente c on(a.cliente_agendamento = c.id_cliente) inner join cadastropet p on (a.pet_agendamento = p.id_pet) where data_agendamento = '" . $dataatual . "'";

$resultado_agendamento = mysqli_query($conn, $result_agendamento);


?>


<table class="table table-bordered">
    <div style="text-align: center;">
        <h3>Agendametos do dia</h3>
    </div>

    <?php
    if (($resultado_agendamento) and ($resultado_agendamento->num_rows != 0)) {
    ?>
        <thead bgcolor="orange">
            <tr>
                <th>Id</th>
                <th>Nome Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        while ($row_agendamento = mysqli_fetch_assoc($resultado_agendamento)) {
        ?>

            <tbody>
                <tr>
                    <td><?php echo $row_agendamento['id_agendamento'] ?></td>
                    <td><b>Cliente: <?php echo $row_agendamento['nome_cliente'] ?><br>Pet: <?php echo $row_agendamento['nome_pet'] ?></b><br>Tipo Serviço: <b><?php echo $row_agendamento['servico_agendamento'] ?></b><br>Hora Agendada: <b><?php echo $row_agendamento['hora_agendamento'] ?></b></td>
                    <td>
                        <button class='btn btn-sm btn-success' id="deleta" value="<?php echo $row_agendamento["id_agendamento"] ?>" onclick='confirmaAgendamento(<?php echo $row_agendamento["cliente_agendamento"] ?>);' ;>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                            </svg></button>
                        <button class='btn btn-sm btn-danger' onclick='deletarAgendamento(<?php echo $row_agendamento["id_agendamento"] ?>)' ;window.location.reload()>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></button>
                    </td>
                </tr>
            </tbody>
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