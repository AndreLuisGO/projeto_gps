
<script>
	$(document).ready(function(e) {
        
    });

</script>

<?php
require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
	<li><a href="../../viewers/sistema.php">Home</a></li>
	<li><a href="#">Administradores</a></li>
	<li class="active">Lista de Dados</li>
</ol>


<h1>Lista de Administradores Cadastrados</h1>
<br>
<div class="btn-group" role="group" aria-label="...">
	<button type="button" class="btn btn-primary">
		<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
		Atualizar
	</button>
	<button type="button" class="btn btn-success ">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		Adicionar Administrador
	</button>

</div>

<br>
<br>

<?php
$Item = new Administrador ();
$Item = $Item->ReadAll ();

if (empty ( $Item )) {
	?>
<h4 class="well">Nenhum dado encontrado.</h4>
<?php
} else {
	?>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Login</th>
			<th>Nome Completo</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>
	</thead>
	<tbody>
	  <?php
	foreach ( $Item as $itemRow ) {
		?>
        		
      	<tr>
			<td><?php echo $itemRow['login_administrador']; ?></td>
			<td><?php
		// $Treinamento = new Treinamento();
		// $Treinamento = $Treinamento->Read($itemRow['id_treinamento']);
		
		echo $itemRow ['nome_administrador'];
		?></td>

			<td class="align-center EditarItem"
				id="<?php echo $itemRow['id_administrador']; ?>"><span
				class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
			<td class="align-center ExcluirItem"
				id="<?php echo $itemRow['id_administrador']; ?>"><span
				class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
		</tr>
    	<?php
	}
	?> 	
      </tbody>
</table>
<?php
}
?>
  
  