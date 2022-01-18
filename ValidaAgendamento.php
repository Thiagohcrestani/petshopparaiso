<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

    $nome =  $_POST['nome'];
	
	$sql = "insert into agendamento (cliente_agendamento, pet_agendamento, data_agendamento, hora_agendamento, servico_agendamento, observacoes_agendamento) values('{$_POST['cliente']}', '{$_POST['pet']}', '{$_POST['dataagendamento']}','{$_POST['horaagendamento']}', '{$_POST['servico_agendamento']}','{$_POST['observacoes_agendamento']}')";
	$result_sql = mysqli_query($conn,$sql);
	
	$id = mysqli_insert_id($conn);
	
	
	header("location: Agendamento.php");
?>