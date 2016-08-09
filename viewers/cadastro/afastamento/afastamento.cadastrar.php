<script>
	$(document).ready(function(e) {

		$("#sel_curso").change(function(){
	        var selcurso = $(this).val();
	        $.ajax({
	            type: "POST",
	            url: "cadastro/afastamento/call_docentes.php?selcurso="+selcurso,
	            dataType: "text",
	            success: function(res){
	                $("#id_docente").empty();
	                $("#id_docente").append(res);
	            }
	        });
	    });


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
<script type="text/javascript" src="../js/jquery.cascade-select.js"></script>
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

</script>

<?php
require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
	<li><a href="#">Gerenciar Afastamentos</a></li>
	<li><a href="#">Lista de Dados</a></li>
	<li class="active">Inserir Afastamentos</li>
</ol>

<br />
<br />

<div class="container well" style="max-width: 400 px;">
<h1 class="text-center">Inserir Afastamento</h1>

<section class="row"><!-- Primeira Linha -->
	<section class="col-md-4">  <!-- Selecionar Curso -->
		<div class="form-group">
		  <label for="sel_curso">Filtrar por Curso:</label>
		  <select class="form-control" id="sel_curso">
		    <?php 
		    $Curso = new Curso();
		    $Curso = $Curso->ReadAll();
		    if(empty($Curso)){
		    ?>
		    	<option>Nenhum curso encontrado</option>
		    <?php
          		}
    			else{
    			foreach($Curso as $cursoRow){
			    ?>
		    <option value="<?php echo $cursoRow['id_curso']?>"><?php echo $cursoRow['nome_curso']?></option>
		    <?php
    				}
    			}
			    ?>
		  </select>
		</div>
	</section> <!-- Selecionar Curso -->
	<section class="col-md-8"> <!-- Selecionar Docente-->	
		<div class="form-group">
		  <label for="id_docente">Selecionar Docente:</label>
		  <select class="form-control" id="id_docente">
		  <option class="sel_curso" value=""> -- Selecione um Curso -- </option>
		  </select>
		</div>
	</section><!-- Selecionar Docente-->	
</section> <!-- Primeira Linha -->

<section class="row"> <!-- Segunda Linha -->
	<section class="col-md-9">  <!-- Selecionar Ocorrência-->
		
	</section> <!-- Selecionar Ocorrência-->
	
	<section class="col-md-3"> <!-- Selecionar Datas-->
		<div class="form-group has-feedback has-feedback-right">
			<input type="hidden" id="dt_inicio_afastamento"> <input
				type="hidden" id="dt_fim_afastamento"> <label class="control-label">Escolha
				o intervalo de datas</label> <i
				class="form-control-feedback glyphicon glyphicon-calendar"></i> <input
				id="escolhe_data" name="escolhe_data"
				class="input-mini form-control" type="text"></input>
		</div>
	</section><!-- Selecionar Datas-->
</section> <!-- Segunda Linha-->
<br />
<section class="row"> <!-- Terceira Linha-->
	<section class="col-md-12"> <!-- Campo de Observação -->
		<label for="observ_afastamento">Observação:</label>
		<textarea class="form-control" rows="3" id="observ_afastamento"></textarea>
	</section> <!-- Campo de Observação -->
</section> <!-- Terceira Linha-->
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
</section>
<!-- Menu de Salvar/Voltar -->
</div>
