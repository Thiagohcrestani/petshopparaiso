<?php
include('include/config.dba.php');

$conn = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conn, $dbname);

$id =  $_POST['id'];

var_dump($id);

try {
	$sql = mysqli_query($conn, "update vacinas set status_vacina = 'A' where id_vacina = $id");

	var_dump($sql);
	echo "ok";
} catch (Exception $e) {
	echo $e->getMessage();
}

?>
<script>
	window.location;
</script>