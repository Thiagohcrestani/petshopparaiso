<?php
// Incluir aquivo de conex�o
include('include/config.dba.php');

	$conn = mysqli_connect($servidor, $usuario, $senha);
	mysqli_select_db($conn,$dbname);

 
// Recebe o valor enviado
$valor = $_POST['valor'];
$valor = addslashes($valor);
// Procura titulos no banco relacionados ao valor
$sql = mysqli_query($conn,"SELECT id_pet, nome_pet FROM cadastropet WHERE nome_pet LIKE '".$valor."%' order by nome_pet");
// Exibe todos os valores encontrados
//echo "<table border=1>";
echo"<div class='row'>";
while ($dados = mysqli_fetch_object($sql)) {
	
	echo "<div style='margin-top:8px; border-bottom-style:solid; border-bottom-width: 1px;' class='col-lg-9 col-md-9 col-sm-9 col-xs-9'><font color=black><b>" . $dados->nome_pet . "</b></font></div>";
	echo "<div style='margin-top:2px' class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>".
		"<button class='btn btn-sm btn-warning' onclick='exibirConteudo(".$dados->id_pet.")'>Editar</button>".
		"&nbsp;&nbsp;<button class='btn btn-danger btn-sm' onclick = 'confirmar(".$dados->id_pet.")'> Excluir </button></div>";

}
//echo "</table>";
echo"</div>";
