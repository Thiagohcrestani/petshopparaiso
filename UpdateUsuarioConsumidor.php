<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

		
	$sql = "update pacotes set banhos_pacote = 1000 where id_pacote = 21";

	/*var_dump($sql);
	die;*/


	$result_sql = mysqli_query($conn,$sql);

	header("location: pesquisaVacina.php");
?>