<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

    $id =  $_POST['id'];

	var_dump($id);

	try{
		$sql = mysqli_query($conn,"delete from cadastrousuario where id_usuario = $id");

	var_dump($sql);
	echo "ok";
	} catch(Exception $e) {
		echo $e->getMessage();

	}
	
	

	//header("location: index_menu.html");
