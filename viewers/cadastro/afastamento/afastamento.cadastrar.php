<script>
	$(document).ready(function(e) {
		$('#bread_home').click(function(e) {
			e.preventDefault();
			//alert("breadhome");
			$('#afast_sistema').click();
    	});
		
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//alert("Voltar");
			$('#loader').load('cadastro/afastamento/afastamento.lista.php');
    	});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			//alert('salvar');
			//1 instansciar e recuperar valores dos inputs
			var id_afastamento = $('#id_afastamento').val();
			var	dt_inicio_afastamento = $('#dt_inicio_afastamento').val();
			var	dt_fim_afastamento = $('#dt_fim_afastamento').val();
			var	observ_afastamento = $('#observ_afastamento').val();
			var id_ocorrencia = $('#id_ocorrencia').val();
			var	id_docente = $('#id_docente').val();
			
			//2 validar os inputs
			if (id_afastamento === "" || dt_inicio_afastamento === "" || dt_fim_afastamento === "" || observ_afastamento === "" || id_docente === ""){
				return alert('Todos os campos devem ser preenchidos.');
			}
			else{
			  $.ajax({
				 url: '../engine/controllers/afastamento.php',
				 data: {
					id_afastamento  : null,
					dt_inicio_afastamento : dt_inicio_afastamento,
					dt_fim_afastamento : dt_fim_afastamento,
					observ_afastamento : observ_afastamento,
					id_ocorrencia : id_ocorrencia,
					id_docente : id_docente,
					action: 'create'
				 },
				 error: function() {
					  alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				 },
				 success: function(data) {
					  console.log(data);
					  if(data === 'true'){
						  alert('Afastamento inserido com sucesso');
						  $('#loader').load('cadastro/afastamento/afastamento.lista.php');
					  }
					  else{
						  alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
					  }
				 },
				 
				 type: 'POST'
			  		});	
				}
			
			
			//3 transferir os dados dos inputs para o arquivo q ira tratar
			
			//4 observar a resposta, e falar pra usuario o que aconteceu
		});
		
	});
</script>

<?php
	require_once "../../../engine/config.php";
?>


<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home" >Home</a></li>
  <li><a href="#">Gerenciar Afastamentos</a></li>
  <li><a href="#">Lista de Dados</a></li>
  <li class="active"> Inserir Afastamentos</li>
</ol>

<h1> 
	Inserir Afastamento
</h1>

<br>

  <section class="col-md-12">
  
    <button type="button" 
            class="btn btn-info" 
            id="Voltar">
              
      <span class="glyphicon glyphicon-menu-left"></span>Voltar
    </button>
    
    <button type="button" 
    		class="btn btn-success" 
            id="Salvar">
		 <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Salvar
    </button>

  </section>

<br><br>
<div class="container-fluid">
<section class="row">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Servidor</span>
          <input type="text" class="form-control" id="id_docente" placeholder="Nome do Servidor" aria-describedby="basic-addon1">
        </div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Código Afastamento</span>
          <input type="text" class="form-control" id="id_ocorrencia" placeholder="01-234" aria-describedby="basic-addon1">
        </div>
    </section>
</section>
<section class="row">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Data de Início</span>
          <input type="text" class="form-control" id="dt_inicio_afastamento" placeholder="01/01/2001" aria-describedby="basic-addon1">
        </div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Data Final</span>
          <input type="text" class="form-control" id="dt_fim_afastamento" placeholder="01/01/2001" aria-describedby="basic-addon1">
        </div>
    </section>
    <section class="row">
	<section class="col-md-12">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Observação</span>
          <input type="text" class="form-control" id="observ_afastamento" placeholder="Observação (opcional)" aria-describedby="basic-addon1">
        </div>
    </section>
</section>
</div>