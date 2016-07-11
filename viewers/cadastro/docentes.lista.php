<script>
	$(document).ready(function(e) {
		$('#Atualizar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/cadastro/docentes.lista.php');
		});
		
		$('#Adicionar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/cadastro/docentes.adicionar.php');
		});
		
		$('.afast_sistema').click(function(e) {
			e.preventDefault();
			//alert("teste2");
			$('#loader').load('sistema.php');
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
?>


<br>
<ol class="breadcrumb">
  <li><a href="#" class="afast_sistema" >Home</a></li>
  <li><a href="#">Gerenciar Docentes</a></li>
  <li class="active">Lista de Dados</li>
</ol>

<h1> 
	Gerenciar Docentes Cadastrados
</h1>

<br><br>

<?php
	$Item = new Curso();
	$Item = $Item->ReadAll();
	
	
	if(empty($Item)){
		
?>
        	<h4 class="well text-center"> Nenhum dado encontrado. </h4>
<?php
		
		
	}
	else{
?>
        
			<h4 class="well text-center"> Escolha o curso </h4>
             
                	<?php
						
						foreach($Item as $itemRow){
							//var_dump($itemRow);
							
							
							
					?>
   						<section class="col-md-3"></section>
                        <button type="button" class="btn btn-default col-md-6"> 
							<?php echo $itemRow['nome_curso']; ?>
                        </button>
                        <section class="col-md-3"></section>
                        <br>
                        <br>		 
                    <?php
						}
					?>
                </tbody>
            </table>
        
        <?php
	}
?>









