
<?php

require_once('../../../engine/config.php');
	
$MesForm = $_POST['mes'];
$curso = $_POST['curso'];
list($mes, $dia, $ano)=explode("/", $MesForm);

$Relatorio = new Afastamento();
$Relatorio = $Relatorio->ReadAllReport($mes,$ano,$curso);

						
?>
<!doctype html>
<html>
<head>
	
    <meta charset="utf-8">
    <title>ICT AFAST - Relatório Mensal</title>
    
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<section class="row">
        <section class="col-md-2"></section>
    	<section class="col-md-3">
                    <img class="img-responsive" height="100px"  width="100px "src="../img/logo_brasao_republica.png" alt="Brasao">
		</section>
        <section class="col-md-2"></section>
        
        <section class="col-md-2">
        			<img class="img-responsive" height="100px"  width="100px "src="../img/logo_ufvjm.gif" alt="Logo UFVJM">
       	</section>
        <section class="col-md-3"></section>
    </section>

        	<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>SIAPE</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th>Observação</th>
                    <th>Descrição</th>
                    <th>Cód. Ocorrência</th>
                  </tr>
                </thead>
             
                <tbody>
                	<?php
						
						foreach($Relatorio as $itemRow){
							
							
							
					?>
                            <tr class="">
                                <td><?php echo $itemRow['nome_docente']; ?></td>
                                <td><?php echo $itemRow['siape_docente']; ?></td>
                                <td><?php echo ExibeData($itemRow['dt_inicio_afastamento']); ?></td>
                                <td><?php echo ExibeData($itemRow['dt_fim_afastamento']); ?></td>
                                <td><?php echo $itemRow['observ_afastamento']; ?></td>
                                <td><?php echo $itemRow['tipo_ocorrencia']; ?></td>
                                <td><?php echo $itemRow['codigo_ocorrencia']; ?></td>
                            </tr>
                    <?php
						}
					?>
                </tbody>
            </table>