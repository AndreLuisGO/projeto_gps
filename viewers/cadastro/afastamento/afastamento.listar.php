
<link rel="stylesheet" type="text/css" href="../css/select2.css" />
<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />
<script type="text/javascript" src="../js/moment.min.js"></script>
<script type="text/javascript" src="../js/jquery.cascade-select.js"></script>
<script type="text/javascript" src="../js/select2.js"></script>
<script type="text/javascript" src="../js/daterangepicker.js"></script>
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
			$('#docenteloader').load('../viewers/cadastro/docentes/docentes.lista.todos.php');
    	});
    	
		$('.Voltar').click(function(e) {
			e.preventDefault();
			//alert("Voltar");
			$('#docenteloader').load('../viewers/cadastro/docentes/docentes.lista.todos.php');
    	});
		$('#Inserir').click(function(e) {
			e.preventDefault();
			//alert("Voltar");
			$('#docenteloader').load('../viewers/cadastro/afastamento/afastamento.cadastrar.php');
    	});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			var	id_afastamento = $('#id_afastamento').val();
			var	dt_inicio_afastamento = $('#dt_inicio_afastamento').val();
			var	dt_fim_afastamento = $('#dt_fim_afastamento').val();
			var	observ_afastamento = $('#observ_afastamento').val();
			var id_ocorrencia = $('#id_ocorrencia').val();
			var	id_docente = $('#id_docente').val();
			//console.log($('#dt_inicio_afastamento').val());
			//console.log($('#dt_fim_afastamento').val());
			//console.log($('#observ_afastamento').val());
			//console.log($('#id_ocorrencia').val());
			//console.log($('#id_docente').val());

			//2 validar os inputs
			if ( dt_inicio_afastamento === "" || dt_fim_afastamento === "" || id_ocorrencia === ""  || id_docente === ""){
				return alert('Todos os campos devem ser preenchidos.');
			}
			else{
			  $.ajax({
				 url: '../engine/controllers/afastamento.php',
				 data: {
					id_afastamento  : id_afastamento,
					dt_inicio_afastamento : dt_inicio_afastamento,
					dt_fim_afastamento : dt_fim_afastamento,
					observ_afastamento : observ_afastamento,
					id_ocorrencia : id_ocorrencia,
					id_docente : id_docente,
					action: 'update'
				 },
				 error: function() {
					  alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				 },
				 success: function(data) {
					  console.log(data);
					  if(data === 'true'){
						  alert('Afastamento alterado com sucesso');
						  $('#docenteloader').load('../viewers/cadastro/docentes/docentes.lista.todos.php');
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

<script type="text/javascript">
	$('#escolhe_data').daterangepicker({
	    "showDropdowns": false,
	    "autoApply": true,
	    "locale": {
	        "format": "DD/MM/YYYY",
	        "separator": " - ",
	        "applyLabel": "Aplicar",
	        "cancelLabel": "Cancelar",
	        "fromLabel": "De",
	        "toLabel": "Até",
	        "customRangeLabel": true,
	        "weekLabel": "S",
	        "daysOfWeek": ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
	        "monthNames": ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
	        "firstDay": 1
	    },
	    "alwaysShowCalendars": true
	},
	function(start, end, label) {
	  //console.log($('#escolhe_data').data());
	});
	$('#escolhe_data').on('apply.daterangepicker', function(ev, picker) {
		$('#dt_inicio_afastamento').val(picker.startDate.format('YYYY-MM-DD'));
		$('#dt_fim_afastamento').val(picker.endDate.format('YYYY-MM-DD'));
	});
	$("#id_ocorrencia").select2({
		language: "pt-BR",
		placeholder: "Selecione a ocorrência para editar"
	});

	$(".EditarItem").click(function (e){
		e.preventDefault();
		var id = $(this).attr('id');
		$('#escolhe_data').data('daterangepicker').setStartDate($('#dt_ini_'+id).attr('value'));
		$('#escolhe_data').data('daterangepicker').setEndDate($('#dt_fim_'+id).attr('value'));
		$('#dt_inicio_afastamento').val($('#escolhe_data').data('daterangepicker').startDate.format('YYYY-MM-DD'));
		$('#dt_fim_afastamento').val($('#escolhe_data').data('daterangepicker').endDate.format('YYYY-MM-DD'));
		$("#escolhe_data").prop('disabled', false);
		$('#id_ocorrencia').val($('#id_ocorr_'+id).attr('value'));
		$('#id_ocorrencia').trigger('change.select2');
		$("#id_ocorrencia").prop('disabled', false);
		$('#observ_afastamento').val($('#observ_af_'+id).attr('value'));
		$('#id_afastamento').val($(this).attr('id'));
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
	<li class="active">Editar Afastamentos</li>
</ol>

<div class="containter well table-overflow">
<h2 class="text-center">Editar Afastamento</h2>
<?php 
$Docente = new Docente();
$Docente = $Docente->Read( $_POST ['id'] );
?>
<section class="row"> <!-- Menu de Salvar/Voltar -->
	<section class="col-md-12 text-left">
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
<section class="row"><!-- Primeira Linha -->
	<section class="col-md-12"> <!-- Selecionar Docente-->	
		<div class="form-group">
		  <label for="id_docente">Docente:</label>
		  <select class="form-control" id="id_docente" disabled>
		  <option class="sel_curso" value="<?php echo $Docente['id_docente']?>"><?php echo $Docente['nome_docente']?></option>
		  </select>
		</div>
	</section><!-- Selecionar Docente-->	
</section> <!-- Primeira Linha -->

<section class="row"> <!-- Segunda Linha -->
	<section class="col-md-3"> <!-- Selecionar Datas-->
		<div class="form-group has-feedback has-feedback-right">
			<input type="hidden" id="dt_inicio_afastamento">
			<input type="hidden" id="dt_fim_afastamento">
			<label class="control-label">Escolha o intervalo de datas</label>
			<i class="form-control-feedback glyphicon glyphicon-calendar"></i>
			<input id="escolhe_data" name="escolhe_data" class="input-mini form-control" type="text" disabled="disabled"></input>
		</div>
	</section><!-- Selecionar Datas-->
	<section class="col-md-9">  <!-- Selecionar Ocorrência-->
	<div class="form-group idocorr">
		<label for="id_ocorrencia">Ocorrência:</label>
		<select class="form-control" id="id_ocorrencia" style="width: 100%" disabled="disabled">
		<option></option>
		<?php 
		    $Ocorrencia = new Ocorrencia();
		    $Ocorrencia = $Ocorrencia->ReadAll();
		    if(empty($Ocorrencia)){
		    ?>
		    	<option>Nenhum curso encontrado</option>
		    <?php
          		}
    			else{
    			foreach($Ocorrencia as $ocorrenciaRow){
			    ?>
		    <option value="<?php echo $ocorrenciaRow['id_ocorrencia']?>"><?php
		    echo $ocorrenciaRow['codigo_ocorrencia']." - ".$ocorrenciaRow['tipo_ocorrencia']
		    ?></option>
		    <?php
    				}
    			}
			    ?>
		</select>
	</div>
	</section> <!-- Selecionar Ocorrência-->
</section> <!-- Segunda Linha-->
<section class="row"> <!-- Terceira Linha-->
	<section class="col-md-12"> <!-- Campo de Observação -->
		<label for="observ_afastamento">Observação:</label>
		<textarea class="form-control" rows="2" id="observ_afastamento"></textarea>
	</section> <!-- Campo de Observação -->
</section> <!-- Terceira Linha-->

<section class="row">
	<section class="col-md-12">
		<div id="id_afastamento" hidden></div>
		<?php
		$Afastamento = new Afastamento();
		$Afastamento = $Afastamento->ReadAllDocente($Docente['id_docente']);
		// var_dump($Item);
		if (empty ( $Afastamento )) {
			?>  
		    	<br>
			<br>
			<h4 class="well text-center">Nenhum dado encontrado.</h4>
		<?php
		} else {
			?>
		  <div class="filterrow">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Afastamentos</h3>
						<div class="pull-right">
							<span class="clickable filter Voltar" id="VoltarTabela"> <i
								class="glyphicon glyphicon-menu-left"></i> Voltar
							</span> <span class="clickable filter" id="Inserir"> <i
								class="glyphicon glyphicon-plus"></i> Inserir Novo Afastamento
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter"
							data-action="filter" data-filters="#dev-table"
							placeholder="Filtrar Docentes" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th class="text-center">Código</th>
								<th class="text-left">Tipo de Afastamento</th>
								<th class="text-center">Data de Início</th>
								<th class="text-center">Data Final</th>
								<th class="text-center">Editar</th>
							</tr>
						</thead>
						<tbody>
		<?php
			foreach ( $Afastamento as $afastamentoRow ) {
				// var_dump($afastamentoRow);
				
				?>
		                  <tr class="">
		                  		<td hidden id="<?php echo "observ_af_" . $afastamentoRow['id_afastamento']; ?>"
		                  			value="<?php echo $afastamentoRow['observ_afastamento']; ?>"></td>
		                  		<td hidden id="<?php echo "id_ocorr_" . $afastamentoRow['id_afastamento']; ?>"
		                  			value="<?php echo $afastamentoRow['id_ocorrencia']; ?>"></td>
								<td class="text-center"><?php echo $afastamentoRow['codigo_ocorrencia']; ?></td>
								<td class="text-left"><?php echo $afastamentoRow['tipo_ocorrencia']; ?></td>
								<td class="text-center" id="<?php echo "dt_ini_" . $afastamentoRow['id_afastamento']; ?>"
									value="<?php echo ExibeData($afastamentoRow['dt_inicio_afastamento']); ?>">
									<?php echo ExibeData($afastamentoRow['dt_inicio_afastamento']); ?></td>
								<td class="text-center" id="<?php echo "dt_fim_" . $afastamentoRow['id_afastamento']; ?>"
									value="<?php echo ExibeData($afastamentoRow['dt_fim_afastamento']); ?>">
									<?php echo ExibeData($afastamentoRow['dt_fim_afastamento']); ?></td>
								<td class="text-center EditarItem" id="<?php echo $afastamentoRow['id_afastamento']; ?>">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
								</td>
							</tr>
		<?php
			}
			?>
		              </tbody>
					</table>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	</section>
</section>

</div> <!-- Fecha Well -->

