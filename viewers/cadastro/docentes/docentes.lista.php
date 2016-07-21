<script>
	$(document).ready(function(e) {
		
		$('#datepicker').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			language: "pt-BR"
		});
		$('#datepicker').on("changeDate", function() {
    		$('#datafinal').val(
        		$('#datepicker').datepicker('getFormattedDate')
    		);
			var data= $('#datafinal').attr('value');
			$('#loader').load('cadastro/docentes/docentes.lista.data.php',{ data: data});
		});
		
		$('#bread_home').click(function(e) {
			e.preventDefault();
			//alert("breadhome");
			$('#afast_sistema').click();
    	});
		
		$('.CarregaDocentesCurso').click(function(e) {
			e.preventDefault();
			var id= $(this).attr('id');
			//alert(id);
			$('#loader').load('cadastro/docentes/docentes.lista.curso.php',{ id: id});
		});
		
		$('#CarregaTodosDocentes').click(function(e) {
			e.preventDefault();
			$('#loader').load('cadastro/docentes/docentes.lista.todos.php');
		});
		
		$('#CadastrarDocente').click(function(e) {
			e.preventDefault();
			$('#loader').load('cadastro/docentes/docentes.cadastrar.php');
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
  <li class="active">Menu</li>
</ol>

<h1> 
	Gerenciar Docentes Cadastrados
</h1>


    <section class="col-md-12">
        
        <section class="col-md-4">
            <button class="btn btn-primary col-md-12" id="CarregaTodosDocentes" type="button">
                  Todos         
            </button>
        </section>
    
        <section class="col-md-4">
              <button class="btn btn-primary col-md-12" 
                      type="button" 
                      data-toggle="collapse" 
                      data-target="#Cursos" 
                      aria-expanded="false" 
                      aria-controls="Cursos">
                      
                            <span class="glyphicon glyphicon-filter"></span>
                            Ativos por Curso
              </button>
              <br>
              <section class="collapse" id="Cursos">
              
              <?php
                  $Item = new Curso();
                  $Item = $Item->ReadAll();
                  
                  
                  if(empty($Item)){
                      
              ?>
                          <h4 class="well text-center"> Nenhum dado encontrado. </h4>
              <?php
                      
                      
                  }
                  else{
        
                                      foreach($Item as $itemRow){
                                          //var_dump($itemRow);
                                  ?>
                                      <button 
                                          type="button" 
                                          class="btn btn-default col-md-12 CarregaDocentesCurso"
                                          id=<?php echo $itemRow['id_curso']; ?>> 
                                              <?php echo $itemRow['nome_curso']; ?>
                                      </button>	 
                                  <?php
                                                              }        
              
                          }
              ?>
              </section>
        </section>
        
        <section class="col-md-4">
              <button class="btn btn-primary col-md-12" 
                      type="button" 
                      data-toggle="collapse" 
                      data-target="#Data" 
                      aria-expanded="false" 
                      aria-controls="Data">
                      
                            <span class="glyphicon glyphicon-filter"></span>
                            Ativos em uma Data
              </button>
              
              <br>
              
              <section class="collapse datepicker-center" id="Data">
                    <?php $Data = getdate(); 
                        $Dia = $Data['mday'];
                        $Mes = $Data['mon'];
                        $Ano = $Data['year'];
                        $Dataform = $Ano . '-' . $Mes . '-' . $Dia;
                    ?>
                    <div id="datepicker" data-date= <?php echo $Dataform; ?>></div>
                    <input type="hidden" id="datafinal">
              </section>
              
        </section>
    </section>
    
    <br><br>
    
    <section class="col-md-12">
        
        <section class="col-md-4"></section>
        
        <section class="col-md-4">
            <button class="btn btn-success col-md-12" id="CadastrarDocente" type="button">
                  Cadastrar Novo Docente         
            </button>
        </section>
        
        <section class="col-md-4"></section>
        
    </section>

