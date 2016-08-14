
<?php

require_once('../../../engine/config.php');
	
$MesForm = $_POST['mes'];
$curso = $_POST['curso'];

list($mes, $ano)=explode("/", $MesForm);

setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );

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
  <section class="col-md-1">
          <img 
              class="img-responsive"
              height="100px"
              width="100px"
              src="../img/logo_brasao_republica.png"
              alt="Brasao"
          >
  </section>

  <section class="col-md-6">
  	<section class="text-center">
    	<h3> MINISTÉRIO DA EDUCAÇÃO </h3>
        <h4><strong> UNIVERSIDADE FEDERAL DOS VALES DO JEQUITINHONHA E MUCURI </strong></h4>
    </section>
  </section>
  
  <section class="col-md-1">
          <img 
              class="img-responsive"
              height="100px"
              width="100px"
              src="../img/logo_ufvjm.gif"
              alt="Logo UFVJM"
           >
  </section>
  <section class="col-md-2"></section>
</section>
<section class="row">
	<section class="text-center">
    	<h3 class="lessmarginbot"> INSTITUTO DE CIÊNCIA DE TECNOLOGIA </h3>
        <h3 class="lessmarginbot lessmargintop"> BOLETIM DE FREQUÊNCIA </h3>
        <h3 class="lessmarginbot lessmargintop"> <?php echo (strtoupper( strftime( "%B" , mktime(0, 0, 0, $mes+1, 0, 0) ) ) ); echo "/"; echo $ano;?> </h3>
    </section>
</section>
<br><br><br>     
    
<?php
	$Docente = new Docente();
	$Docente = $Docente->ReadAllCurso($curso);
	
	foreach ($Docente as $DocenteRow)
	{
		?>
        <section class="row">
        <section>
        	<section class="col-md-2"></section>
        	<section class="col-md-8">
        		<p>Servidor(a): <strong><?php echo $DocenteRow['nome_docente'];?></strong></p>
            </section>
            <section class="col-md-2"></section>
        </section>
        </section>
		<?php
	}
?>

</body>