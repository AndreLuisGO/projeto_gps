

<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/cadastro/administrador.lista.php');
		});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			
			//1 instansciar e recuperar valores dos inputs
			var login_administrador = $('#login_administrador').val();
			var nome_administrador = $('#nome_administrador').val();
			var senha_administrador = $('#senha_administrador').val();

			
			
			//2 validar os inputs
			if(login_administrador === "" || nome_administrador === "" || senha_administrador === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				// VERIFICAR REGEX
				var logintester = false;
				var re = /^([\w-]+(?:\.[\w-]+)*)$/i;
				logintester = re.test(login_administrador);
				if(!logintester){
					
					return alert("Formato de login incorreto. Use apenas letras e numero");
				}
				else{
					$.ajax({
					   url: 'engine/controllers/treinador.php',
					   data: {
							nome_treinador : nome_treinador,
							email_treinador : email_treinador,
							senha_treinador : senha_treinador,
							dtcadastro_treinador : dtcadastro_treinador,
							telefonefixo_treinador : telefonefixo_treinador,
							celular_treinador : celular_treinador,
 							action: 'create'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							//console.log(data);
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								$('#loader').load('viewers/cadastro/treinador.lista.php');
							}
							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
							}
					   },
					   
					   type: 'POST'
					});	
				}
			}
			
			//3 transferir os dados dos inputs para o arquivo q ira tratar
			
			//4 observar a resposta, e falar pra usuario o que aconteceu
		});
		
		
		
		
		//mascaras abaixo
		$('#telefonefixo_treinador').mask('(99) 9999-9999');
		$('#celular_treinador').mask('(99) 9-9999-9999');
	});
</script>

<?php
require_once "../../engine/config.php";
?>


<br>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Cadastro</a></li>
	<li><a href="#">Treinador</a></li>
	<li class="active">Adicionar de Dados</li>
</ol>

<h1>Cadastro de Treinador</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
	<button type="button" class="btn btn-warning" id="Voltar">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		Voltar
	</button>
	<button type="button" class="btn btn-success" id="Salvar">
		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
		Salvar
	</button>
</section>



<br>
<br>

<section class="row formAdicionarDados">
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nome *</span> <input
				type="text" class="form-control" id="nome_treinador"
				placeholder="Nome" aria-describedby="basic-addon1">
		</div>
	</section>
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Email *</span> <input
				type="text" class="form-control" id="email_treinador"
				placeholder="Email" aria-describedby="basic-addon1">
		</div>
	</section>
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Senha *</span> <input
				type="password" class="form-control" id="senha_treinador"
				placeholder="Senha" aria-describedby="basic-addon1">
		</div>
	</section>
</section>

<br>
<section class="row formAdicionarDados">
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Data de Cadastro *</span>
			<input type="text" class="form-control" id="dtcadastro_treinador"
				disabled placeholder="Data de Cadastro"
				aria-describedby="basic-addon1" value="<?php echo date('d/m/Y'); ?>">
		</div>
	</section>
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Telefone Fixo *</span>
			<input type="text" class="form-control" id="telefonefixo_treinador"
				placeholder="Telefone Fixo" aria-describedby="basic-addon1">
		</div>
	</section>
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Celular *</span> <input
				type="text" class="form-control" id="celular_treinador"
				placeholder="Celular" aria-describedby="basic-addon1">
		</div>
	</section>
</section>