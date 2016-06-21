// JavaScript Document

/*alert('a');
confirm(); //return bool
console.log();*/


/*var x = document.getElementById('h1xulambs');
x.innerHTML = "<span class='text-primary'>ciclambs</span>";
console.log(x);*/

$(document).ready(function(e) {
    //var x = $('#h1xulambs');
	//console.log(x);
	
	/* CADASTRO */
	
	$('#cadastro_treinador_link').click(function(e) {
		e.preventDefault();
    	//loader
		$('#loader').load('viewers/cadastro/treinador.lista.php');
    });
	
	$('#cadastro_treinamento_link').click(function(e) {
		e.preventDefault();
    	//loader
		$('#loader').load('viewers/cadastro/treinamento.lista.php');
    });
	
	$('#cadastro_trainee_link').click(function(e) {
		e.preventDefault();
    	//loader
		$('#loader').load('viewers/cadastro/trainee.lista.php');
    });
	
});