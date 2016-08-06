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
			var	dt_inicio_afastamento = $('#dt_inicio_afastamento').val();
			var	dt_fim_afastamento = $('#dt_fim_afastamento').val();
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

<!-- Include Required Prerequisites -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/moment.min.js"></script>
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="../js/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />


<script type="text/javascript">
	$('#escolhe_data').daterangepicker({
	    "showDropdowns": true,
	    "autoApply": false,
	    "locale": {
	        "format": "DD/MM/YYYY",
	        "separator": " - ",
	        "applyLabel": "Aplicar",
	        "cancelLabel": "Cancelar",
	        "fromLabel": "De",
	        "toLabel": "Até",
	        "customRangeLabel": "Outro",
	        "weekLabel": "S",
	        "daysOfWeek": [
	            "Dom",
	            "Seg",
	            "Ter",
	            "Qua",
	            "Qui",
	            "Sex",
	            "Sab"
	        ],
	        "monthNames": [
	            "Janeiro",
	            "Fevereiro",
	            "Março",
	            "Abril",
	            "Maio",
	            "Junho",
	            "Julho",
	            "Agosto",
	            "Setembro",
	            "Outubro",
	            "Novembro",
	            "Dezembro"
	        ],
	        "firstDay": 1
	    },
	    "alwaysShowCalendars": true
	},
	function(start, end, label) {
	  console.log($('#escolhe_data').data());
	});
	$('#escolhe_data').on('apply.daterangepicker', function(ev, picker) {
		$('#dt_inicio_afastamento').val(picker.startDate.format('YYYY-MM-DD'));
		$('#dt_fim_afastamento').val(picker.endDate.format('YYYY-MM-DD'));
	});

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
		<section class="col-md-3">
			<div class="form-group has-feedback has-feedback-left">
				<input type="hidden" id="dt_inicio_afastamento">
				<input type="hidden" id="dt_fim_afastamento">
				<label class="control-label">Escolha o intervalo de datas</label>
				<i class="form-control-feedback glyphicon glyphicon-calendar"></i>
				<input id="escolhe_data" name="escolhe_data" class="input-mini form-control" type="text"></input>
			</div>
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
