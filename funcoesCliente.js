function buscarNoticias(valor) {
	$.ajax({
		type: "POST",
		url: "buscaCliente.php",
		data: { valor: valor }

	}).done(function (data) {
		$("#resultado").html(data);

	})


}
function exibirConteudo(id) {
	$.ajax({
		type: "POST",
		url: "editarCliente.php",
		data: { id: id }

	}).done(function (data) {
		$("#pesquisa").hide(300);
		$("#resultado").hide(300);
		$("#divEdit").html(data);


	})

}

function Excluir(id) {
	$.ajax({
		type: "POST",
		url: "ExcluirCliente.php",
		data: { id: id }

	}).done(function (data) {
		console.log(data);
		buscarNoticias($("#busca").val());
	})

}
function setEstado() {
	var id = $("#selectEstado").val();
	alert(id);
	$("#" + id).attr('selected', 'selected');



}

function confirmar(id) {
	$('#modalExemplo').modal("show");
	$('#Confirma').click(function () {
		Excluir(id);
		$('#modalExemplo').modal("hide");

	});

}
