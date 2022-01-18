<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


$sql = "insert into pacotes (id_cliente, banhos_pacote, valor_pacote, observacoes_pacote) values('{$_POST['cliente']}', '{$_POST['banhospacote']}','{$_POST['valorpacote']}', '{$_POST['observacoes']}')";
$result_sql = mysqli_query($conn, $sql);

if ($result_sql) {
	?>
	<script  type="text/javascript">
	alert("Pacote inserido com sucesso");
	</script>
	<?php
} else {
	?>
	<script  type="text/javascript">
	alert("Erro");
	</script>
	<?php
	
}


$id = mysqli_insert_id($conn);


header("location: Pacote.php");
?>