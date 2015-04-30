<?php
	include_once("php/simple_html_dom.php");
	include_once("php/sesion.php");
	$classFieldset = "displayBlock";
	$mensaje = "";
	$usuarioComparar = "";

	$usuarioPropio = array(
		'UsuarioCoj' 			=> $_SESSION["usuarioCoj"],
		'totalRealizados' 		=> $_SESSION["totalRealizados"],
		'totalIntentados' 		=> $_SESSION["totalIntentados"],
		'totalProblemas' 		=> $_SESSION["totalProblemas"],
		'porcentajeRealizado' 	=> $_SESSION["porcentajeRealizado"],
		'progressBarColor'		=> "color4"
	);
	
	$compararCon = $_SESSION["itver30"];
	$usuariosComparadosItver = array();
	$totalProblemas = $_SESSION["totalProblemas"];

	if (isset($_SESSION["usuariosComparadosItver"])) {
		for ($i=0; $i < $_SESSION["limiteUsuariosComparadosItver"]; $i++) {
			if (empty($_SESSION["usuariosComparadosItver"][$i])) {
				extract(getDatosUsuario($compararCon[$i]));
				$usuariosComparadosItver[$i] = array(
					'UsuarioCoj' 			=> $compararCon[$i],
					'totalRealizados' 		=> $totalRealizados,
					'totalIntentados' 		=> $totalIntentados,
					'porcentajeRealizado' 	=> getPorcentajeRealizado($totalRealizados),
					'progressBarColor'		=> "color".($i+1)
				);
				$_SESSION["usuariosComparadosItver"][$i] = $usuariosComparadosItver[$i];
			} else {
				$usuariosComparadosItver[$i] = $_SESSION["usuariosComparadosItver"][$i] ;
			}
		}
		$limite = $_SESSION["limiteUsuariosComparadosItver"];
		if ($_SESSION["limiteUsuariosComparadosItver"] < 10) {
			$_SESSION["limiteUsuariosComparadosItver"] += 2;
		}
	} else {
		$_SESSION["limiteUsuariosComparadosItver"] = 2;
		$_SESSION["usuariosComparadosItver"] = array();
		for ($i=0; $i < $_SESSION["limiteUsuariosComparadosItver"] ; $i++) {
			extract(getDatosUsuario($compararCon[$i]));
			$usuariosComparadosItver[$i] = array(
				'UsuarioCoj' 			=> $compararCon[$i],
				'totalRealizados' 		=> $totalRealizados,
				'totalIntentados' 		=> $totalIntentados,
				'porcentajeRealizado' 	=> getPorcentajeRealizado($totalRealizados),
				'progressBarColor'		=> "color".($i+1)
			);
			$_SESSION["usuariosComparadosItver"][] = $usuariosComparadosItver[$i];
		}
		$limite = $_SESSION["limiteUsuariosComparadosItver"];
	}

	view("compararTopItver", compact('usuarioPropio','usuariosComparadosItver','limite'));