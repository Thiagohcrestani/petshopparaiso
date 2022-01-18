<?php
include_once("include/config.dba.php");
$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


$fuso = new DateTimeZone('America/New_York');
$data = new DateTime();
$data->setTimezone($fuso);
$dataatual = $data->format('Y-m-d');


$result_pacotes = "select p.*, c.nome_cliente from pacotes p inner join cadastrocliente c on (p.id_cliente = c.id_cliente) where banhos_pacote <= 1";


$resultado_pacotes = mysqli_query($conn, $result_pacotes);

?>


<table class="table table-bordered">
    <div style="text-align: center;">
        <h3>Pacotes a Vencer</h3>
    </div>

    <?php
    if (($resultado_pacotes) and ($resultado_pacotes->num_rows != 0)) {
    ?>
        <thead bgcolor="orange">
            <tr>
                <th>Id</th>
                <th>Nome Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        while ($row_pacotes = mysqli_fetch_assoc($resultado_pacotes)) {
        ?>

            <tbody>
                <tr>
                    <td><?php echo $row_pacotes['id_pacote'] ?></td>
                    <td><b><?php echo $row_pacotes['nome_cliente'] ?></b></td>
                    <td>
                        <button class='btn btn-sm btn-warning' onclick='RenovarPacote(<?php echo $row_pacotes["id_pacote"] ?>)'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
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
                <th>Nenhum pacote a vencer</th>
            </tr>
        </thead>
    <?php
    }
    ?>
</table>