<?php
include('include/config.dba.php');
session_start();

function criaSessao($login,$senha,$conexao){
	$sql = "SELECT * from cadastrousuario where login_usuario = '$login' and senha_usuario = '$senha'";
	$result_sql = mysql_query($sql,$conexao);


	$_SESSION["id"]=mysql_result($result_sql,0,"id_usuario");
	$_SESSION["usuario"]=mysql_result($result_sql,0,"nome_usuario");
	$_SESSION["senha"]=mysql_result($result_sql,0,"senha_usuario");
	$_SESSION["tipo"]=mysql_result($result_sql,0,"tipo_usuario");
	$_SESSION["status"]=mysql_result($result_sql,0,"status");
	





}
function validaLogin($login,$senha,$conexao){
	$sql = "SELECT * from cadastrousuario where login_usuario = '$login' and senha_usuario = '$senha' and status = 'A'";
	$result_sql = mysql_query($sql,$conexao);
	$n_sql = mysql_num_rows($result_sql);	

	if ($n_sql!=0){
		return true;

	}else {
		return false;
	}

}

function verificaSessao(){
	if (isset($_SESSION["id"])) {
		return true;

	}else{
		return false;
	}
}
