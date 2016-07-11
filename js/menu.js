$(document).ready(function(e) {
	
	$('#gerenciar_docentes').click(function(e) {
		e.preventDefault();
		$('#loader').load('../viewers/cadastro/docentes.lista.php');
    });
	
	$('.afast_sistema').click(function(e) {
		e.preventDefault();
    	//alert("teste");
		$('#loader').load('sistema.php');
    });
	
	
	$('#getout').click(function(e) {
		e.preventDefault();
        //loader
		$.ajax({
		   url: '../engine/controllers/logout.php',
		   data: {
				
		   },
		   error: function() {
				alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
		   },
		   success: function(data) {
				console.log(data);
				if(data === 'kickme'){
					document.location.href = '../';
				}
				
				
				else{
					alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
				}
		   },
		   
		   type: 'POST'
		});		
    });
	
});