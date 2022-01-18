function RenovarPacote(id) {
	$.ajax({
		type: "POST",
		url: "editarPacote.php",
		data: { id: id }

	}).done(function (data) {
		$("#pesquisa").hide(300);
		$("#resultado").hide(300);
		$("#divEdit").html(data);
	})

}
function buscarNoticias(valor) {
	$.ajax({
		type: "POST",
		url: "buscaPet.php",
		data: { valor: valor }

	}).done(function (data) {
		$("#resultado").html(data);

	})


}
function exibirConteudo(id) {
	$.ajax({
		type: "POST",
		url: "editarPet.php",
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
		url: "ExcluirPet.php",
		data: { id: id }

	}).done(function (data) {
		console.log(data);
		buscarNoticias($("#busca").val());
	})

}
function deletarAgendamento(id) {
	$.ajax({
		type: "POST",
		url: "ExcluirAgendamento.php",
		data: { id: id }

	}).done(function (data) {
		window.location.reload();
	})

}
function confirmaAgendamento(id) {
	$.ajax({
		type: "POST",
		url: "ConfirmaAgendamento.php",
		data: { id: id }

	}).done(function (data) {
		deletarAgendamento($("#deleta").val());
		window.location.reload();
	})

}

function confirmaVacina(id) {
	$.ajax({
		type: "POST",
		url: "ConfirmaVacina.php",
		data: { id: id }

	}).done(function (data) {

		window.location.reload();
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
