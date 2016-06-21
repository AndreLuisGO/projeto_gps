

<script>
	$(document).ready(function(e) {
		$('#Atualizar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/cadastro/treinador.lista.php');
		});
		
		$('#Adicionar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/cadastro/treinador.adicionar.php');
		});
		
		$('.EditarItem').click(function(e) {
			e.preventDefault();
			//loader
			var id= $(this).attr('id');
			//alert(id);
			$('#loader').load('viewers/cadastro/treinador.editar.php',{ id: id});
		});
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
  <li class="active">Lista de Dados</li>
</ol>

<h1> 
	Lista de Treinadores Cadastrados 
</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default" id="Atualizar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  <button type="button" class="btn btn-success" id="Adicionar"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Dados</button>
</section>



<br><br>

<?php
	$Item = new Treinador();
	$Item = $Item->ReadAll();
	
	//var_dump($_SERVER);
	
	if(empty($Item)){
		
		?>
        	<h4 class="well"> Nenhum dado encontrado. </h4>
        <?php
		
		
	}
	else{
		?>
        
        	<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone Fixo</th>
                    <th>Celular</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
             
                <tbody>
                	<?php
						
						foreach($Item as $itemRow){
							//var_dump($itemRow);
							
							
							
					?>
                            <tr class="">
                                <td><?php echo $itemRow['nome_treinador']; ?></td>
                                <td><?php echo $itemRow['email_treinador']; ?></td>
                                <td><?php echo $itemRow['telefonefixo_treinador']; ?></td>
                                <td><?php echo $itemRow['celular_treinador']; ?></td>
                                <td class="text-center EditarItem" id="<?php echo $itemRow['id_treinador']; ?>">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </td>
                                <td class="text-center ExcluirItem" id="<?php echo $itemRow['id_treinador']; ?>">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </td>
                            </tr>
                    <?php
						}
					?>
                </tbody>
            </table>
        
        <?php
	}
?>









