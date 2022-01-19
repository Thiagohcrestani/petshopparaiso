<?php
// Incluir aquivo de conex�o
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);


// Recebe o valor enviado
$valor = $_POST['valor'];
$valor = addslashes($valor);
// Procura titulos no banco relacionados ao valor
$sql = mysqli_query($conn, "select c.id_pet,c.nome_pet from cadastropet c inner join cadastrocliente p on (c.id_cliente = p.id_cliente) where p.id_cliente = '$valor';");

// Exibe todos os valores encontrados
//echo "<table border=1>";
echo " <select class='form-control js-example-basic-single' name='pet' id='pet'>";

while ($dados = mysqli_fetch_object($sql)) {


	echo " <option value='$dados->id_pet'> $dados->nome_pet </option>";
}
//echo "</table>";
echo " </select> ";
