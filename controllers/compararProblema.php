<?php
	include_once("php/sesion.php");
	$classFieldset = "displayNone";
	$usuarioPropio = $_SESSION["usuarioCoj"];
	$nombresItver = $_SESSION["itver30"];
	$nombresGlobal = $_SESSION["global30"];
	$opcionesItver = converterArrayToSelect($nombresItver, $usuarioPropio);
	$opcionesGlobal = converterArrayToSelect($nombresGlobal, $usuarioPropio);

	

	if (isset($_POST["idProblema_txt"])) {
		$classFieldset = "displayBlock";
		$idProblema = intval($_POST["idProblema_txt"]);
		$usuarioItver = $_POST["usuarioACompararItver_slc"];
		$usuarioGlobal = $_POST["usuarioACompararGlobal_slc"];
		$usuario1 = $_POST["usuarioAComparar1_txt"];
		$usuario2 = $_POST["usuarioAComparar2_txt"];
		$usuario3 = $_POST["usuarioAComparar3_txt"];
		$usuario4 = $_POST["usuarioAComparar4_txt"];

		$usuarioPropioProblemas = getArrayProblemasUser($usuarioPropio);
		if (array_key_exists($idProblema, $usuarioPropioProblemas)) {
			$mensajePropio = "Resuelto";
		}else{
			$mensajePropio = "No Resuelto";
		}	

		if ($usuarioItver != "") {
			$usuarioItverProblemas = getArrayProblemasUser($usuarioItver);
			if (isset($usuarioItverProblemas["noExiste"])) {
				$mensajeItver = "Usuario no existe en COJ";
			}else{
				if (array_key_exists($idProblema, $usuarioItverProblemas)) {
			    	$mensajeItver = "Resuelto";
				}else{
					$mensajeItver = "No Resuelto";
				}	
			}
		}else{ $mensajeItver = "";}

		if ($usuarioGlobal != "") {
			$usuarioGlobalProblemas = getArrayProblemasUser($usuarioGlobal);
			if (isset($usuarioGlobalProblemas["noExiste"])) {
				$mensajeGlobal = "Usuario no existe en COJ";
			}else{
				if (array_key_exists($idProblema, $usuarioGlobalProblemas)) {
			    	$mensajeGlobal = "Resuelto";
				}else{
					$mensajeGlobal = "No Resuelto";
				}
			}
		}else{$mensajeGlobal = "";}

		if ($usuario1 != "") {
			$usuario1Problemas = getArrayProblemasUser($usuario1);
			if (isset($usuario1Problemas["noExiste"])) {
				$mensaje1 = "Usuario no existe en COJ";
			}else{
				if (array_key_exists($idProblema, $usuario1Problemas)) {
			    	$mensaje1 = "Resuelto";
				}else{
					$mensaje1 = "No Resuelto";
				}	
			}
		}else{$mensaje1 = "";}

		if ($usuario2 != "") {
			$usuario2Problemas = getArrayProblemasUser($usuario2);
			if (isset($usuario2Problemas["noExiste"])) {
				$mensaje2 = "Usuario no existe en COJ";
			}else{
				if (array_key_exists($idProblema, $usuario2Problemas)) {
			    	$mensaje2 = "Resuelto";
				}else{
					$mensaje2 = "No Resuelto";
				}
			}
		}else{$mensaje2 = "";}

		if ($usuario3 != "") {
			$usuario3Problemas = getArrayProblemasUser($usuario3);
			if (isset($usuario3Problemas["noExiste"])) {
				$mensaje3 = "Usuario no existe en COJ";
			}else{
				if (array_key_exists($idProblema, $usuario3Problemas)) {
			    	$mensaje3 = "Resuelto";
				}else{
					$mensaje3 = "No Resuelto";
				}
			}
		}else{$mensaje3 = "";}

		if ($usuario4 != "") {
			if (isset($usuario4Problemas["noExiste"])) {
				$mensaje4 = "Usuario no existe en COJ";
			}else{
				$usuario4Problemas = getArrayProblemasUser($usuario4);
				if (array_key_exists($idProblema, $usuario4Problemas)) {
			    	$mensaje4 = "Resuelto";
				}else{
					$mensaje4 = "No Resuelto";
				}
			}
		}else{$mensaje4 = "";}

		view("compararProblema", compact('idProblema','usuarioPropio','usuarioItver','usuarioGlobal','usuario1','usuario2','usuario3','usuario4','mensajePropio','mensajeItver','mensajeGlobal','mensaje1','mensaje2','mensaje3','mensaje4','opcionesItver','opcionesGlobal','classFieldset'));
	}else{
		view("compararProblema", compact('opcionesItver','opcionesGlobal','classFieldset'));
	}