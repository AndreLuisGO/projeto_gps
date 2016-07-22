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
			$('#loader').load('cadastro/docentes/docentes.lista.php');
    	});
		
		$('#Terminar').click(function(e) {
			e.preventDefault();
			//alert('terminar');
			//1 instansciar e recuperar valores dos inputs
			var id_docente = $('#id_docente').val();
			var nome_docente = $('#nome_docente').val();
			var siape_docente = $('#siape_docente').val();
			var email_docente = $('#email_docente').val();
			var efetivo_docente = $('#efetivo_docente').val();
			
			
			//2 validar os inputs
			if(id_docente === "" || nome_docente === "" || siape_docente === "" || email_docente === "" || efetivo_docente === ""){
				return alert('Todos os campos devem ser preenchidos.');
			}
			else{
				$.ajax({
				   url: '../engine/controllers/exercicio.php',
				   data: {
						id_exercicio : id_exercicio,
						id_docente : id_docente,
						id_curso : id_curso,
						dt_inicio_exercicio : dt_inicio_exercicio,
						dt_fim_exercicio : dt_fim_exercicio,
						action: 'end'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						console.log(data);
						if(data === 'true'){
							alert('Exercício do docente terminado.');
							$('#loader').load('cadastro/docentes/docentes.lista.php');
						}
						else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
						}
				   },
				   
				   type: 'POST'
				});		
			}
		});
		
		//Table filters below
			
		(function(){
			'use strict';
			var $ = jQuery;
			$.fn.extend({
				filterTable: function(){
					return this.each(function(){
						$(this).on('keyup', function(e){
							$('.filterTable_no_results').remove();
							var $this = $(this), 
								search = $this.val().toLowerCase(), 
								target = $this.attr('data-filters'), 
								$target = $(target), 
								$rows = $target.find('tbody tr');
								
							if(search == '') {
								$rows.show(); 
							} else {
								$rows.each(function(){
									var $this = $(this);
									$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
								})
								if($target.find('tbody tr:visible').size() === 0) {
									var col_count = $target.find('tr').first().find('td').size();
									var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
									$target.find('tbody').append(no_results);
								}
							}
						});
					});
				}
			});
			$('[data-action="filter"]').filterTable();
		})(jQuery);
		
		$(function(){
			// attach table filter plugin to inputs
			$('[data-action="filter"]').filterTable();
			
			$('.container').on('click', '.panel-heading span.filter', function(e){
				var $this = $(this), 
					$panel = $this.parents('.panel');
				
				$panel.find('.panel-body').slideToggle();
				if($this.css('display') != 'none') {
					$panel.find('.panel-body input').focus();
				}
			});
			$('[data-toggle="tooltip"]').tooltip();
		})
	});
</script>

<?php
	require_once "../../../engine/config.php";	
?>


<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home" >Home</a></li>
  <li><a href="#">Gerenciar Docentes</a></li>
  <li><a href="#">Menu</a></li>
  <li class="active">Terminar Exercicio</li>
</ol>

<div class="container col-md-12">
  <h1>Terminar ou Ativar Exercícios</h1>
<?php
	$Docente = new Docente();
	$Docente = $Docente->Read($_POST['id']);
	$Exercicio = new Exercicio();
	$Exercicio = $Exercicio->ReadbyDocente($_POST['id']);
	$Curso = new Curso();
	$Curso = $Curso->ReadAll();
	//var_dump($Docente);
	//var_dump($Exercicio);
	//var_dump($Curso);
    if(empty($Exercicio)){    
?>  
    	<br><br>
        <h4 class="well text-center"> Nenhum dado encontrado. </h4>
<?php
                     }
      else{
?>
  <div class="row">
      <div class="panel panel-primary">
          <div class="panel-heading">
              <h3 class="panel-title">Exercicios do(a) docente <?php echo $Docente['nome_docente']?></h3>
              <div class="pull-right">
                  <span
                    class="clickable filter" 
                    id="Voltar">                
                    <i class="glyphicon glyphicon-menu-left"></i>
                    Voltar
                  </span>
                  <span 
                    class="clickable filter" 
                    data-toggle="tooltip" 
                    title="Ativar Filtro" 
                    data-container="body">
                    <i class="glyphicon glyphicon-filter"></i>
                    Filtrar
                  </span>
              </div>
          </div>
          <div class="panel-body">
              <input 
              	type="text" 
                class="form-control" 
                id="dev-table-filter" 
                data-action="filter" 
                data-filters="#dev-table" 
                placeholder="Filtrar Exercicios"/>
          </div>
          <table class="table table-hover" id="dev-table">
              <thead>
                <tr>
                  <th class="text-left">Curso</th>
                  <th class="text-center">Data de Inicio</th>
                  <th class="text-center">Data de Término</th>
                  <th class="text-center">Editar</th>
                  <th class="text-center">Desativar</th>
                </tr>
              </thead>
              <tbody>
<?php   
				
				
				if (count($Exercicio) == count($Exercicio, COUNT_RECURSIVE)) 
				{
				  $Exercicio = array($Exercicio);
				}
				foreach($Exercicio as $itemRow){  
				//var_dump($itemRow);                     
?>
                  <tr class="">
                    <td class="text-left">
<?php 
					foreach($Curso as $LinhaCurso)
					{
						if($itemRow['id_curso'] === $LinhaCurso['id_curso'])
						{
							echo $LinhaCurso['nome_curso']; break;
						}								
					}
?>                    
                    </td>
                    <td class="text-center">
						<?php echo date("d-m-Y",strtotime($itemRow['dt_inicio_exercicio'])); ?>
                    </td>
                    <td class="text-center">
<?php 
						if($itemRow['dt_fim_exercicio'] === NULL)
						{
							echo "Exercício Ativo";
						}
						else{
							echo date("d-m-Y",strtotime($itemRow['dt_fim_exercicio'])); 
							}
?>
                    </td>
                    <td 
                      class="text-center EditarItem" 
                      id="<?php echo $itemRow['id_exercicio']; ?>">
                      <span 
                        class="glyphicon glyphicon-edit" 
                        aria-hidden="true">
                      </span>
                    </td>
                    <td 
                      class="text-center DesativarItem" 
                      id="<?php echo $itemRow['id_exercicio']; ?>">
                      <span 
                        class="glyphicon glyphicon-remove-circle" 
                        aria-hidden="true">
                      </span>
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
