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
			var dt_range = $("#escolhe_data").daterangepicker("getRange");
			var	dt_inicio_afastamento = dt_range.start.toISOString().substr(0, 10);
			var	dt_fim_afastamento = dt_range.end.toISOString().substr(0, 10);
			var	observ_afastamento = $('#observ_afastamento').val();
			var id_ocorrencia = $('#id_ocorrencia').val();
			var	id_docente = $('#id_docente').val();

			//2 validar os inputs
			if ( dt_inicio_afastamento === "" || dt_fim_afastamento === "" || id_ocorrencia === ""  || id_docente === ""){
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
<link href="../css/jquery-ui.min.css" rel="stylesheet">
<link href="../css/jquery.comiseo.daterangepicker.css" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/moment.js"></script>
<script src="../js/jquery.comiseo.daterangepicker.js"></script>
<script type="text/javascript">
	 $("#escolhe_data").daterangepicker();
	 $("#escolhe_data_get").click(function () {
	     alert("Selected range is: " + JSON.stringify($("#escolhe_data").daterangepicker("getRange")));
	 });
	 $("#escolhe_data_gets").click(function () {


		 });
	 $("#escolhe_data_set").click(function () {
	     var yesterday = moment().subtract('days', 1).startOf('day').toDate();
	     $("#escolhe_data").daterangepicker("setRange", {start: yesterday});
	 });
	 $("#escolhe_data_cl").click(function() { $("#escolhe_data").daterangepicker("clearRange"); });
	 $("#escolhe_data_open").click(function () { $("#escolhe_data").daterangepicker("open"); });
	 $("#escolhe_data_close").click(function () { $("#escolhe_data").daterangepicker("close"); });

	$('.docente_select').click(function(e) {
		e.preventDefault();
		//alert("curso_select");
		$('#id_docente').val($(this).attr('id'));
		$('#docente_placeholder').val($(this).text());
		
	});
	
	$('.ocorrencia_select').click(function(e) {
		e.preventDefault();
		$('#id_ocorrencia').val($(this).attr('id'));
		$('#ocorrencia_placeholder').val($(this).text());
		
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

<br />
<br />

<div class="container well" style="max-width: 400 px;">

	<h1 class="text-center"> Inserir Afastamento </h1>
	<p> Insira os dados do novo afastamento</p>
	
	<section class="row">
		<section class="col-md-8">
			<div class="input-group">
       			<div class="input-group-btn">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Docente <span class="caret"></span></button>
	           		<ul class="dropdown-menu">
			<?php
				  $Docente = new Docente();
				  $Docente = $Docente->ReadAll();
				  if(empty($Docente)){   
?>
			  	<li><a href="#">Nenhum docente encontrado</a></li>
<?php
      			  }
				  else{
				    foreach($Docente as $docenteRow){
				          //var_dump($DocenteRow);
?>
						    <li>
                    			<a href="#" id=<?php echo $docenteRow['id_docente']; ?> class="docente_select">
                          <?php echo $docenteRow['nome_docente']; ?></a>
                    		</li>  
						              
		<?php
                         }        
		       }
	?>
    				</ul>
    			</div><!-- /btn-group -->
			        <input id="id_docente" type="hidden">
			        <input type="text" class="form-control" id="docente_placeholder" disabled placeholder="Escolha um docente" aria-describedby="basic-addon1">
        		</div><!-- /input-group -->

		</section> <!-- Selecionar Docente -->
    	<section class="col-md-4">
			<div class="input-group">
				<div class="input-group-btn">
		            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ocorrência  <span class="caret"></span></button>
		            <ul class="dropdown-menu"> 
		<?php
				  $Ocorrencia = new Ocorrencia();
				  $Ocorrencia = $Ocorrencia->ReadAll();
				  if(empty($Ocorrencia)){   
?>
				  	<li><a href="#">Nenhuma ocorrência encontrada</a></li>
<?php
      			  }
				  else{
				      foreach($Ocorrencia as $ocorrenciaRow){
				          //var_dump($itemRow);
?>
				    <li>
				   		<a href="#" id=<?php echo $ocorrenciaRow['id_ocorrencia']; ?> class="ocorrencia_select">
                          <?php echo $ocorrenciaRow['codigo_ocorrencia']."-".$ocorrenciaRow['tipo_ocorrencia'] ; ?></a>     
				    </li>          
<?php
				                                 }        
				       }
?>
	    			</ul>
				</div><!-- /btn-group -->
			    <input id="id_ocorrencia" type="hidden">
				<input type="text" class="form-control" id="ocorrencia_placeholder" disabled placeholder="Ocorrência" aria-describedby="basic-addon1">
			</div><!-- /input-group -->
		</section><!-- Selecionar Ocorrencia-->
	</section><!-- Primeira Linha -->
	<br />
	<section class="row">
		<section class="col-md-12">
			<input id="escolhe_data" name="escolhe_data">
			<input type="button" class="btn btn-info" id="escolhe_data_set" value="Selecionar ontem">
			<input type="button" class="btn btn-info" id="escolhe_data_cl" value="Limpar">
			<input type="button" class="btn btn-warning" id="escolhe_data_open" value="Abrir">
			<input type="button" class="btn btn-warning" id="escolhe_data_close" value="Fechar">
		</section>
	</section> <!-- Escolhe Datas -->
		<br />
	<section class="row">
		<section class="col-md-12">
	    		<label for="observ_afastamento">Observação:</label>
	    		<textarea class="form-control" rows="3" id="observ_afastamento"></textarea>
		</section>
	</section> <!-- Campo de Observação -->
<br />

	<section class="row">
		<section class="col-md-12 text-right">
		  	<section class="btn-group" role="group">
		    <button type="button" class="btn btn-info" id="Voltar">
		    	<span class="glyphicon glyphicon-menu-left"></span>Voltar
		    </button>
		    <button type="button" class="btn btn-success" id="Salvar">
				 <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Salvar
		    </button>
		 	</section>
	 	</section>
	</section> <!-- Menu de Salvar/Voltar -->
</div>
