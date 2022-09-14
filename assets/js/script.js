function main(){
	$("#form_edit_produto").on("submit", function(event) {
	  event.preventDefault();
	  sendDataFormToServer("form_edit_produto","edita-produto.php");
	});

	$("#form_cadastrar_produto").on("submit", function(event) {
	  event.preventDefault();
	  sendDataFormToServer("form_cadastrar_produto","cadastra-produto.php");
	});

	$("#form_excluir_produto").on("submit", function(event) {
	  event.preventDefault();
	  sendDataFormToServer("form_excluir_produto","exclui-produto.php");
	});

    var elementModalEdit = document.getElementById('modal_editar_produto');	
	elementModalEdit.addEventListener('show.bs.modal', function (event) {

	  var button = event.relatedTarget;
	  
	  elementModalEdit.querySelector('.modal-body #edit_input_id').value = button.getAttribute('data-bs-id');
	  elementModalEdit.querySelector('.modal-body #edit_input_descricao').value = button.getAttribute('data-bs-descricao');
	  elementModalEdit.querySelector('.modal-body #edit_input_marca').value = button.getAttribute('data-bs-marca');
	  elementModalEdit.querySelector('.modal-body #edit_input_estoque').value = button.getAttribute('data-bs-estoque');
	  elementModalEdit.querySelector('.modal-body #edit_input_preco').value = button.getAttribute('data-bs-preco');
	});

	var elementModalExclui = document.getElementById('modal_deletar_produto');	
	elementModalExclui.addEventListener('show.bs.modal', function (event) {

	  var button = event.relatedTarget;
	  
	  elementModalExclui.querySelector('.modal-body #delete_input_id').value = button.getAttribute('data-bs-id');
	  elementModalExclui.querySelector('.modal-body #delete_input_descricao_produto').value = button.getAttribute('data-bs-descricao');
	  elementModalExclui.querySelector('.modal-body #delete_descricao_produto').innerText = button.getAttribute('data-bs-descricao');
	});	

	var elementModalError = document.getElementById('modal_error');	
	elementModalError.addEventListener('show.bs.modal', function (event) {

	  var button = event.relatedTarget;
	  elementModalError.querySelector('.modal-body #error_message_erro').innerText = button.getAttribute('data-bs-error');
	});	
}

function recarregarPagina(){
	window.location.reload();
}
function sendDataFormToServer(idForm, urlServer){
	$.ajax({
		   type: "POST",
		   url: urlServer,
		   data: $("#"+idForm).serialize(), // serializes the form's elements.		   
		 })
		 .done(function(data){
			recarregarPagina();
			new bootstrap.Modal(document.getElementById('modal_success')).show();			
		 })
		 .fail(function(jqXHR, textStatus){
			let btn = document.getElementById("acionaModalError");
			btn.setAttribute("data-bs-error",jqXHR.responseText);
			btn.click();
		 });
}
$(window).ready(main());