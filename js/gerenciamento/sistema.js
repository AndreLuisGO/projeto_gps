$(document).ready(function(e) {
	
	$('#gerenciar_docentes').click(function(e) {
		e.preventDefault();
		$('#loader').load('../viewers/cadastro/docentes/docentes.lista.php');
		//alert("sistema.js/docentes");
    });
	
});