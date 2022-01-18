<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

	
	
	$sql = "insert into vacinas (id_cliente, id_pet, data_vacina, tipo_vacina, status_vacina) values('{$_POST['cliente']}', '{$_POST['pet']}', '{$_POST['datavacina']}','{$_POST['observacoes']}','P')";
	/*var_dump($sql);
	die;*/
	$result_sql = mysqli_query($conn,$sql);
	header("location: Vacina.php");
?>