<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

    $nome =  $_POST['nome'];
	$nome = addslashes($nome);
	$login =  $_POST['login'];
	$login = addslashes($login);
	$senha =  $_POST['senha'];
	$senha = addslashes($senha);
	$tipo_usuario =  $_POST['tipo_usuario'];
	$tipo_usuario = addslashes($tipo_usuario);

		
	$sql = "update cadastrousuario set nome_usuario = '{$nome}',
	login_usuario = '{$login}',
	senha_usuario = MD5('{$senha}'),	
	tipo_usuario = '{$tipo_usuario}'
	where id_usuario = '{$_POST['id']}'";


	$result_sql = mysqli_query($conn,$sql);

	header("location: PesquisaUsuario.php");
?>