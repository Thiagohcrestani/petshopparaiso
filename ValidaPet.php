<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

    $nome =  $_POST['nome'];
	
	$sql = "insert into cadastropet (nome_pet, idade_pet, raca_pet, observacoes, id_cliente) values('{$_POST['nome']}', '{$_POST['idade']}', '{$_POST['raca']}','{$_POST['observacoes']}','{$_POST['cliente']}')";
	$result_sql = mysqli_query($conn,$sql);
	
	$id = mysqli_insert_id($conn);
	
	
	header("location: Pet.php");
?>