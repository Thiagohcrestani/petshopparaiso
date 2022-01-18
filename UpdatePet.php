<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

	$nome =  $_POST['nome'];
	$nome = addslashes($nome);
	$idade =  $_POST['idade'];
	$idade = addslashes($idade);
	$raca =  $_POST['raca'];
	$raca = addslashes($raca);
	$observacoes =  $_POST['observacoes'];
	$observacoes = addslashes($observacoes);
	$cliente =  $_POST['cliente'];
	$cliente = addslashes($cliente);	

	$sql = "update cadastropet set nome_pet = '{$nome}',
	idade_pet = '{$idade}',
	raca_pet = '{$raca}',
	observacoes = '{$observacoes}',
	id_cliente = '{$cliente}'
	where id_pet = '{$_POST['id']}'";
	$result_sql = mysqli_query($conn,$sql);

	header("location: pesquisaPet.php");
?>