<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

    $nome =  $_POST['nome'];
	
	$sql = "insert into cadastrocliente (nome_cliente, logradouro_cliente, numeroresidencia_cliente, bairro_cliente, cidade_cliente, estado_cliente, cpf_cliente, telefone_cliente) values('{$_POST['nome']}', '{$_POST['logradouro']}', '{$_POST['numero']}', '{$_POST['bairro']}', '{$_POST['cidade']}','{$_POST['estado']}','{$_POST['cpf']}','{$_POST['telefone']}')";
	$result_sql = mysqli_query($conn,$sql);
	header("location: Cliente.php");
?>