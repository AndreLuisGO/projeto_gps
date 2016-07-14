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
			$('#loader').load('cadastro/docentes.lista.php');
    	});
		
		$('.EditarItem').click(function(e) {
			e.preventDefault();
			//loader
			var id= $(this).attr('id');
			//alert(id);
			$('#loader').load('viewers/cadastro/docentes.editar.php',{ id: id});
		});
	});
</script>

<?php
	require_once "../../engine/config.php";
	$Curso = new Curso();
	$Curso = $Curso->Read($_POST['id']);
?>	

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home" >Home</a></li>
  <li><a href="#">Gerenciar Docentes</a></li>
  <li><a href="#">Lista de Dados</a></li>
  <li class="active"> <?php echo $Curso['nome_curso']; ?> </li>
</ol>

<h1> 
	Docentes lotados em <?php echo $Curso['nome_curso']; ?>
</h1>

<br><br>

<button type="button" class="btn btn-info" id="Voltar"><span class="glyphicon glyphicon-menu-left"></span>Voltar</button>

<br>


<?php	
	$Item = new Docente();
	$Item = $Item->ReadAllCurso($Curso['id_curso']);
	//var_dump($Item);
	
	if(empty($Curso)){
		
?>
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
							
						if(is_null($itemRow['dt_fim_exercicio'])){
					?>
                            <tr class="">
                                <td><?php echo $itemRow['nome_docente']; ?></td>
                                <td><?php echo $itemRow['siape_docente']; ?></td>
                                <td><?php echo $itemRow['email_docente']; ?></td>
                                <td class="text-center"><?php 
										if($itemRow['efetivo_docente'] === '1'){
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
													}
					?>
                </tbody>
            </table>
            <br><br><br><br>
        
        <?php
		}
?>