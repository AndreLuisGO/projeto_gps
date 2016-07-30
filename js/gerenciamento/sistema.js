$(document).ready(function(e) {
	
	$('#gerenciar_docentes').click(function(e) {
		e.preventDefault();
		$('#loader').load('../viewers/cadastro/docentes/docentes.lista.php');
		//alert("sistema.js/docentes");
    });
	
	$('#gerenciar_ocorrencias').click(function(e) {
		e.preventDefault();
		$('#loader').load('../viewers/cadastro/ocorrencias/ocorrencias.lista.php');
		//alert("sistema.js/ocorrencias");
    });
	
	$('#inserir_afastamento').click(function(e) {
		e.preventDefault();
		$('#loader').load('../viewers/cadastro/afastamento/afastamento.lista.php');
		//alert("sistema.js/ocorrencias");
    });
	
	
});