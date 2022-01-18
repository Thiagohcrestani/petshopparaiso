<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
include('seguranca.php');
if (verificaSessao()) {
	header("location: index_menu.php");
}
?>

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap core CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">
	<link href="estilo.css" rel="stylesheet" type="text/css" />

</head>

<body background="">

	<div style="margin: auto">
		<form name="form1" action="ValidaLogin.php" method="post">
			<div>
				<img class="mb-4" src="img/logo.png" alt="" width="250">
				<label class="sr-only">Login</label>
				<input type="text" id="login" name="login" class="form-control" placeholder="Login" required autofocus>
				<br>
				<label for="inputPassword" class="sr-only">Senha</label>
				<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
				<br>
			</div>
			<button class="btn btn-lg btn-secondary btn-block" type="submit">Entrar</button>
			<br>

		</form>
	</div>
</body>

</html>