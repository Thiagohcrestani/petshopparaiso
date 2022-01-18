<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

	$cliente =  $_POST['cliente'];
	$cliente = addslashes($cliente);
	$pet =  $_POST['pet'];
	$pet = addslashes($pet);
	$datavacina =  $_POST['datavacina'];
	$datavacina = addslashes($datavacina);
	$tipovacina =  $_POST['observacoes'];
	$tipovacina = addslashes($tipovacina);

		
	$sql = "update vacinas set id_cliente = '{$cliente}',
	id_pet = '{$pet}',
	data_vacina = '{$datavacina}',	
	tipo_vacina = '{$tipovacina}',
	status_vacina = 'P'
	where id_vacina = '{$_POST['id']}'";

	/*var_dump($sql);
	die;*/


	$result_sql = mysqli_query($conn,$sql);

	header("location: pesquisaVacina.php");
?>