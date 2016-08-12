
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
			$('#afast_sistema').click();
    	});
		
		$('#Gerar').click(function(e) {
			e.preventDefault();
			var curso = $('#curso').val();
			var mes = $('#mes').val();
			$('#loader').load('gerenciamento/relatorio/relatorio.php',{ mes: mes, curso: curso});

			//2 validar os inputs
				if ( curso === "" || mes === ""){
				return alert('Todos os campos devem ser selecionados!');
			}
			else{
			  $.ajax({
				 url: 'gerenciamento/relatorio/relatorio.php',
				 data: {
					mes: mes,
					curso: curso,
					action: 'POST'
				 },
				 error: function() {
					  alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				 },
				 success: function(data) {
					  console.log(data);
					  if(data === 'true'){
						  $('#Gerar').click();
					  }
					  else{
						  alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
					  }
				 },
				 
				 type: 'POST'
			  		});	
				}
			
								});

		
	});
</script>

<script type="text/javascript">
	 	
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

/*	$('input[name="escolhe_data"]').daterangepicker({
	    showDropdowns: true,
	    autoApply: true,
	    autoUpdateInput: true,
	    locale: {
	        "format": "MM/YYYY",
	        "separator": " - ",
	        "applyLabel": "Aplicar",
	        "cancelLabel": "Cancelar",
	        "fromLabel": "De",
	        "toLabel": "Até",
	        "customRangeLabel": "Outro",
	        "weekLabel": "S",
	        "monthNames": ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
	        "firstDay": 1
	    },
	    alwaysShowCalendars: true
	},
	function(start, end, label) {
	  //console.log($('#escolhe_data').data());

	});

	$('#escolhe_data').on('apply.daterangepicker', function(ev, picker) {
		$('#mes').val(picker.startDate.format('YYYY-MM'));
	}); */
	
	$(function() {
		$('.date-picker').datepicker( {
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'MM yy',
			onClose: function(dateText, inst) { 
				var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
				$(this).datepicker('setDate', new Date(year, month, 1));
			}
		});
	});

</script>

<?php
require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
	<li class="active">Gerar Relatórios</li>
</ol>

<br />

<div class="containter well table-overflow">
<h1 class="text-center">Gerar Relatórios</h1>
<br />
<br />
<section class="row"> <!-- Menu de Voltar -->
	<section class="col-md-12 text-left">
		<section class="btn-group" role="group">
			<button type="button" class="btn btn-info" id="Voltar">
				<span class="glyphicon glyphicon-menu-left"></span>Voltar
			</button>
		</section>
	</section>
</section> <!-- Menu de Voltar -->
<br />
<section class="row"><!-- Primeira Linha -->
	<section class="col-md-3"> <!-- Selecionar Datas-->
		<div class="form-group has-feedback has-feedback-right">
			<label for="startdate" class="control-label">Escolha o mês:</label>
            <i class="form-control-feedback glyphicon glyphicon-calendar"></i>
			<input id="startDate" name="startDate" class="date-picker input-mini form-control" ></input> 
<!--            <select class="form-control" id="sel_data">
            <option value""> -- Selecione -- </option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
            </select>-->
		</div>
	</section><!-- Selecionar Datas-->
	<section class="col-md-9">  <!-- Selecionar Curso-->
	<div class="form-group">
		<div class="form-group">
		  <label for="sel_curso">Selecionar Curso:</label>
		  <select class="form-control" id="sel_curso">
		  <option value=""> -- Selecione -- </option>
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
	</div>
	</section> <!-- Selecionar Curso-->
</section> <!-- Primeira Linha -->

<section class="row"> <!-- Segunda Linha -->
    <section class="col-md-12 text-right">
        <section class="btn-group" role="group">
                <button type="button" class="btn btn-success" id="Gerar">
                    <span class="glyphicon glyphicon-menu"></span>Gerar Relatório
                </button>
        </section>
    </section>
</section> <!-- Segunda Linha-->
</div> <!-- Fecha Well -->

