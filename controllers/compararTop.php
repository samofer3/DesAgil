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
	
	$compararCon = $_SESSION["global30"];
	$usuariosComparados = array();
	$totalProblemas = $_SESSION["totalProblemas"];

	if (isset($_SESSION["usuariosComparados"])) {
		for ($i=0; $i < $_SESSION["limiteUsuariosComparados"]; $i++) {
			if (empty($_SESSION["usuariosComparados"][$i])) {
				extract(getDatosUsuario($compararCon[$i]));
				$usuariosComparados[$i] = array(
					'UsuarioCoj' 			=> $compararCon[$i],
					'totalRealizados' 		=> $totalRealizados,
					'totalIntentados' 		=> $totalIntentados,
					'porcentajeRealizado' 	=> getPorcentajeRealizado($totalRealizados),
					'progressBarColor'		=> "color".($i+1)
				);
				$_SESSION["usuariosComparados"][$i] = $usuariosComparados[$i];
			} else {
				$usuariosComparados[$i] = $_SESSION["usuariosComparados"][$i] ;
			}
		}
		$limite = $_SESSION["limiteUsuariosComparados"];
		if ($_SESSION["limiteUsuariosComparados"] < 10) {
			$_SESSION["limiteUsuariosComparados"] += 2;
		}
	} else {
		$_SESSION["limiteUsuariosComparados"] = 2;
		$_SESSION["usuariosComparados"] = array();
		for ($i=0; $i < $_SESSION["limiteUsuariosComparados"] ; $i++) {
			extract(getDatosUsuario($compararCon[$i]));
			$usuariosComparados[$i] = array(
				'UsuarioCoj' 			=> $compararCon[$i],
				'totalRealizados' 		=> $totalRealizados,
				'totalIntentados' 		=> $totalIntentados,
				'porcentajeRealizado' 	=> getPorcentajeRealizado($totalRealizados),
				'progressBarColor'		=> "color".($i+1)
			);
			$_SESSION["usuariosComparados"][] = $usuariosComparados[$i];
		}
		$limite = $_SESSION["limiteUsuariosComparados"];
	}

	view("compararTop", compact('usuarioPropio','usuariosComparados','limite'));
