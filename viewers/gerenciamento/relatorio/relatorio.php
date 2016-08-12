
<br><br><br><br><br>
<?php

require_once('../../../engine/config.php');
	
$MesForm = $_POST['mes'];
$curso = $_POST['curso'];

list($mes, $dia, $ano)=explode("/", $MesForm);

$Relatorio = new afastamento();
$Relatorio = $Relatorio->ReadAllReport($mes,$ano,$curso);

var_dump($Relatorio);
						
?>