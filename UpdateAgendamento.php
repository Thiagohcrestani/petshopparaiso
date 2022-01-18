<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

	$id = $_POST['id'];
	$id = addslashes($id);
	$nome =  $_POST['cliente'];
	$nome = addslashes($nome);
	$pet =  $_POST['pet'];
	$pet = addslashes($pet);
	$dataagendamento =  $_POST['dataagendamento'];
	$dataagendamento = addslashes($dataagendamento);
	$horaagendamento =  $_POST['horaagendamento'];
	$horaagendamento = addslashes($horaagendamento);
	$servicoagendamento =  $_POST['servicoagendamento'];
	$servicoagendamento = addslashes($servicoagendamento);
	$observacoesagendamento =  $_POST['observacoesagendamento'];
	$observacoesagendamento = addslashes($observacoesagendamento);
		

	$sql = "update agendamento set cliente_agendamento = '{$nome}',
	pet_agendamento = '{$pet}',
	data_agendamento = '{$dataagendamento}',
	hora_agendamento = '{$horaagendamento}',
	servico_agendamento = '{$servicoagendamento}',
	observacoes_agendamento = '{$observacoesagendamento}'
	where id_agendamento = '{$id}'";
	$result_sql = mysqli_query($conn,$sql);

	header("location: pesquisaAgendamento.php");
