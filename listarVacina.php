<?php
include_once("include/config.dba.php");
$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


$fuso = new DateTimeZone('America/New_York');
$data = new DateTime();
$data->setTimezone($fuso);
$dataatual = $data->format('Y-m-d');



$result_vacinas = "select v.*, c.nome_cliente, p.nome_pet,DATEDIFF (data_vacina, '" . $dataatual . "') from vacinas v inner join cadastrocliente c on(v.id_cliente = c.id_cliente) inner join cadastropet p on (v.id_pet = p.id_pet) where status_vacina = 'P' and date(data_vacina) = date('" . $dataatual . "')-3";



$resultado_vacinas = mysqli_query($conn, $result_vacinas);



?>


<table class="table table-bordered">
    <div style="text-align: center;">
        <h3>Vacinas Agendadas <a class="btn btn-sm btn-success" href="Vacina.php" ;>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></a> </h3>
        
    </div>

    <?php
    if (($resultado_vacinas) and ($resultado_vacinas->num_rows != 0)) {
    ?>
        <thead bgcolor="orange">
            <tr>
                <th>Id</th>
                <th>Nome Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        while ($row_vacinas = mysqli_fetch_assoc($resultado_vacinas)) {
        ?>

            <tbody>
                <tr>
                    <td><?php echo $row_vacinas['id_vacina'] ?></td>
                    <td><b>Cliente: <?php echo $row_vacinas['nome_cliente'] ?><br>Pet: <?php echo $row_vacinas['nome_pet'] ?></b><br>Tipo Vacina: <b><?php echo $row_vacinas['tipo_vacina'] ?></b><br>Data Vacina: <b><?php echo date('d/m/Y', strtotime($row_vacinas['data_vacina'])) ?></b></td>
                    <td>
                        <button class='btn btn-sm btn-success' value="<?php echo $row_vacinas["id_vacina"] ?>" onclick='confirmaVacina(<?php echo $row_vacinas["id_vacina"] ?>);' ;>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
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
                <th>Nenhum Vacina Agendada</th>
            </tr>
        </thead>
    <?php
    }
    ?>
</table>