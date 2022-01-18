<?php
// Incluir aquivo de conex�o
include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

 
// Recebe o valor enviado
$valor = $_POST['valor'];
$valor = addslashes($valor);
// Procura titulos no banco relacionados ao valor
$sql = mysqli_query($conn,"select c.id_pet,c.nome_pet,s.id_cliente, s.nome_cliente from cadastropet c inner join cadastrocliente s on (s.id_cliente = c.id_cliente) where c.id_cliente = '$valor';");
// Exibe todos os valores encontrados
//echo "<table border=1>";

while ($dados = mysqli_fetch_object($sql)) {
	echo "<input type='hidden' id='nomecliente' name='nomecliente' value='$dados->nome_cliente'";
}
echo ">";
//echo "</table>";

