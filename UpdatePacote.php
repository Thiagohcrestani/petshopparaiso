<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

	$cliente =  $_POST['cliente'];
	$cliente = addslashes($cliente);
	$banhos =  $_POST['banhospacote'];
	$datafim = addslashes($datafim);
	$valor =  $_POST['valorpacote'];
	$valor = addslashes($valor);
	$telefone =  $_POST['telefone'];
	$telefone = addslashes($telefone);
	$observacoes =  $_POST['observacoes'];
	$observacoes = addslashes($observacoes);
		

	$sql = "update pacotes set id_cliente = '{$cliente}',
	banhos_pacote = '{$banhos}',
	valor_pacote = '{$valor}',
	telefone_pacote = '{$telefone}',
	observacoes_pacote = '{$observacoes}'
	where id_pacote = '{$_POST['id']}'";
	$result_sql = mysqli_query($conn,$sql);

	header("location: pesquisaPacote.php");
?>