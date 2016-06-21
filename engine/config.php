<?php

	date_default_timezone_set('America/Sao_Paulo');

	require_once "bd/bd.php";
	require_once "classes/aula.php";
	require_once "classes/turma.php";
	require_once "classes/treinamento.php";
	require_once "classes/trainee.php";
	require_once "classes/treinador.php";
	
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		$dataCerta = $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
		return $dataCerta;
	}
	
?>