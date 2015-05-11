<?php
	include_once("php/sesion.php");
	$classFieldset = "displayBlock";
	$usuarioPropio = $_SESSION["usuarioCoj"];


	if (isset($_POST["usuario_txt"])) {
		if ($_POST["usuario_txt"] == "") {
			$usuario = $_SESSION["usuarioCoj"];
		}else{
			$usuario = $_POST["usuario_txt"];
		}
	}else{
		$usuario = $usuarioPropio;
	}
	
	$link = "";
	$mensaje = "Si quiere calcular el propio omita el campo de texto";
	$fechasUser = getArrayDatesUser($usuario);

	if (isset($fechasUser["noExiste"])) {
		$classFieldset = "displayNone";
		$mensaje = "Usuario no existe";
		view("avanceMeses", compact('classFieldset','mensaje'));
	}else{
		$ultimosMeses = getArrayLastSixMonths();
		

		$conteoFechas = array();
		$conteoFechas[0] = 0;
		$conteoFechas[1] = 0;
		$conteoFechas[2] = 0;
		$conteoFechas[3] = 0;
		$conteoFechas[4] = 0;
		$conteoFechas[5] = 0;

		for ($i=0; $i < sizeof($fechasUser); $i++) { 
			for ($j=0; $j < sizeof($ultimosMeses); $j++) { 
				if ($fechasUser[$i] == $ultimosMeses[$j]) {
					$conteoFechas[$j]++;
				}
			}
		}

		$link = "?user=$usuario";
		for ($i=0; $i < sizeof($conteoFechas); $i++) {
			$link.= "&fecha$i=$conteoFechas[$i]";
		}

		view("avanceMeses", compact('classFieldset','mensaje','link'));
	}