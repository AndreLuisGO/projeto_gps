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
		
		$('.EditarItem').click(function(e) {
			e.preventDefault();
			//loader
			var id= $(this).attr('id');
			//alert(id);
			$('#loader').load('cadastro/docentes/docentes.editar.php',{ id: id});
		});
	});
</script>

<?php
	require_once "../../../engine/config.php";
?>	

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home" >Home</a></li>
  <li><a href="#">Gerenciar Docentes</a></li>
  <li><a href="#">Lista de Dados</a></li>
  <li class="active"> Todos os Cursos</li>
</ol>

<h1> 
	Docentes lotados em Todos os Cursos
</h1>

<br><br>
  <section>
    
      <button 	type="button" 
                class="btn btn-info col-md-1" 
                id="Voltar">
                
                    <span class="glyphicon glyphicon-menu-left"></span>
                    Voltar
      </button>
      
     <section class="col-md-4">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Digite sua busca" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="filter-table"><a class="glyphicon glyphicon-filter"></a></span>
      </div>
     </section>
  </section>

<br>

<?php	
	$Item = new Docente();
	$Item = $Item->ReadAll();
	//var_dump($Item);
	
	if(empty($Item)){
		
?>
			<br><br>
            <h4 class="well text-center"> Nenhum dado encontrado. </h4>
<?php
		
		
					}
	else{
		?>

			<table class="table table-striped table-hover">
				<thead>
				  <tr>
					<th>Nome</th>
					<th>Siape</th>
					<th>E-Mail</th>
					<th class="text-center">Efetivo</th>
					<th class="text-center">Editar</th>
					<th class="text-center">Desativar</th>
				  </tr>
				</thead>
			 
				<tbody>
					<?php
						
						foreach($Item as $itemRow){
						//var_dump($itemRow);
						  
					?>
							<tr class="">
								<td class=""><?php echo $itemRow['nome_docente']; ?></td>
								<td class=""><?php echo $itemRow['siape_docente']; ?></td>
								<td class=""><?php echo $itemRow['email_docente']; ?></td>
								<td class="text-center"><?php 
										if($itemRow['efetivo_docente'] === 1){
											echo "Sim";
																				} 
										else{
											echo "Não";
											} 
									?>
								</td>
								<td 
									class="text-center EditarItem" 
									id="<?php echo $itemRow['id_docente']; ?>">
										<span 
											class="glyphicon glyphicon-edit" 
											aria-hidden="true">
										</span>
								</td>
								
								<td 
									class="text-center DesativarItem" 
									id="<?php echo $itemRow['id_docente']; ?>"
									>
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
			<br><br><br><br>
		
		<?php
		}
?>