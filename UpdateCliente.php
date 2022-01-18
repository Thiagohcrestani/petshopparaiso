<?php
	include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

	$nome =  $_POST['nome'];
	$nome = addslashes($nome);
	$logradouro =  $_POST['logradouro'];
	$logradoouro = addslashes($logradouro);
	$numero =  $_POST['numero'];
	$numero = addslashes($numero);
	$bairro =  $_POST['bairro'];
	$bairro = addslashes($bairro);
	$cidade =  $_POST['cidade'];
	$cidade = addslashes($cidade);
	$estado =  $_POST['estado'];
	$estado = addslashes($estado);
	$cpf =  $_POST['cpf'];
	$cpf = addslashes($cpf);

		
	$sql = "update cadastrocliente set nome_cliente = '{$nome}',
	logradouro_cliente = '{$logradouro}',
	numeroresidencia_cliente = '{$numero}',	
	bairro_cliente = '{$bairro}',
	cidade_cliente = '{$cidade}',
	estado_cliente = '{$estado}',
	cpf_cliente = '{$cpf}'
	where id_cliente = '{$_POST['id']}'";


	$result_sql = mysqli_query($conn,$sql);

	header("location: PesquisaCliente.php");
?>