
<?php

require_once('../../../engine/config.php');
	
$MesForm = $_POST['mes'];
$curso = $_POST['curso'];

list($mes, $ano)=explode("/", $MesForm);
var_dump($mes);



?>

<!doctype html>
<html>
<head>
	
    <meta charset="utf-8">
    <title>ICT AFAST - Relatório Mensal</title>
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
	<?php
	$Docente = new Docente();
	$Docente = $Docente->ReadAllCurso($curso);
	

		?>
        

   	
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
                <?php
             	foreach ( $Docente as $docenteRow ){
		$Relatorio = new ClasseRelatorio();
		$Relatorio = $Relatorio->ReadAllReport($mes,$ano,$docenteRow['id_docente']);
		var_dump($Relatorio);
		?>
                <tbody>
                           
                            <tr class="">
                                <td><?php echo $docenteRow['nome_docente']; ?></td>
                                <td><?php echo $docenteRow['siape_docente']; ?></td>
                                <td><?php echo $docenteRow['dt_inicio_afastamento']; ?></td>
                                <td><?php echo $docenteRow['dt_fim_afastamento']; ?></td>
                                <td><?php echo $docenteRow['observ_afastamento']; ?></td>
                                <td><?php echo $docenteRow['tipo_ocorrencia']; ?></td>
                                <td><?php echo $docenteRow['codigo_ocorrencia']; ?></td>
                            </tr>
                    <?php
						}
					?>
                </tbody>
            </table>