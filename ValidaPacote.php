<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


$sql = "insert into pacotes (id_cliente, banhos_pacote, valor_pacote, telefone_pacote, observacoes_pacote) values('{$_POST['cliente']}', '{$_POST['banhospacote']}', '{$_POST['valorpacote']}', '{$_POST['telefone']}', '{$_POST['observacoes']}')";
$result_sql = mysqli_query($conn, $sql);

header("location: Pacote.php");
?>