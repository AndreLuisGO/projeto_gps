
<script>
	$(document).ready(function(e) {
        
    });

</script>

<?php
	require_once "../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Gerenciamento</a></li>
	<li><a href="#">Turma</a></li>
	<li class="active">Lista de Dados</li>
 </ol>	
 
  
 <h1>
 	Lista de Turmas Cadastradas
 </h1>
 <br>
  <div class="btn-group" role="group" aria-label="...">
    	<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
        <button type="button" class="btn btn-success "><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Dados</button>

  </div>
  
  <br><br>
  
  <?php
  	$Item = new Turma();
	$Item = $Item->ReadAllContext();
  
  	if(empty($Item)){
		?>
			<h4  class="well" >Nenhum dado encontrado.</h4>
		<?php	
	}
	else{
	?>
  
  <table class="table table-striped table-hover">
  	<thead>
    	<tr>
            <th>Turma</th>
            <th>Treinamento</th>
            <th>Trainee</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>
      <tbody>
	  <?php
	  		foreach($Item as $itemRow){	
		?>
        		
      	<tr>
            <td><?php echo $itemRow['id_turma']; ?></td>
        	<td><?php 
					//$Treinamento = new Treinamento();
					//$Treinamento = $Treinamento->Read($itemRow['id_treinamento']);
					
					echo $itemRow['nome_treinamento']; ?></td>
            <td><?php 
					//$Trainee = new Trainee();
					//$Trainee = $Trainee->Read($itemRow['id_trainee']);
					
					echo $itemRow['nome_trainee']; ?></td>
        	<td class="align-center EditarItem" id="<?php echo $itemRow['id_treinamento']; ?>">
            		   	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
        	<td class="align-center ExcluirItem" id="<?php echo $itemRow['id_treinamento']; ?>">
            		   	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
        </tr>
    	<?php   	
			}
	  	?> 	
      </tbody>
	</table>
    <?php   	
		}
  	?>
  
  