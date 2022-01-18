<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

    $nome =  $_POST['nome'];
	
	$sql = "insert into cadastrousuario (nome_usuario, login_usuario, senha_usuario, tipo_usuario) values('{$_POST['nome']}', '{$_POST['login']}', MD5('{$_POST['senha']}'), '{$_POST['tipo_usuario']}')";
	$result_sql = mysqli_query($conn,$sql);
	header("location: Usuario.php");
?>