<?php

	date_default_timezone_set('America/Sao_Paulo');

	require_once "bd/bd.php";
	require_once "classes/docente.php";
	require_once "classes/ocorrencia.php";
	require_once "classes/administrador.php";
	require_once "classes/afastamento.php";
	
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		$dataCerta = $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
		return $dataCerta;
	}
	
?>