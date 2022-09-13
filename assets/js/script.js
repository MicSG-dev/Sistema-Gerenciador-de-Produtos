function main(){
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl);
	});

	$("#form_edit_produto").on("submit", function(event) {
	  event.preventDefault();
	  sendDataFormToServer("form_edit_produto","edita-produto.php");
	});

	atualizaListaProdutos();
	excluiTodasLinhas();
}

function atualizaListaProdutos(){

}

function showModalNovo(){

}

function showModalEdit(id_produto){
	var myModal = new bootstrap.Modal(document.getElementById('modal_editar_produto'), {
	  keyboard: false,
	  backdrop:"static"
	}).show();	
}

function showModalDelete(id_produto){

}

function sendDataFormToServer(idForm, urlServer){
	$.ajax({
		   type: "POST",
		   url: urlServer,
		   data: $("#"+idForm).serialize(), // serializes the form's elements.
		   success: function(data)
		   {
			   alert(data); // show response from the php script.
		   }
		 });
}

function excluiTodasLinhas(){

}

$(window).ready(main());