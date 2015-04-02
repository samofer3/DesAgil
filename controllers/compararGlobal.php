<?php
	include_once("php/simple_html_dom.php");
	include_once("php/sesion.php");
	$classFieldset = "displayNone";
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
	
	$resultado = $_SESSION["global30"];
	$opciones = converterArrayToSelect($resultado, $usuarioPropio['UsuarioCoj']);

	if (isset($_GET['noExiste'])) {
		$mensaje = "Usuario COJ no existe";
		view("compararGlobal", compact('usuarioPropio','opciones','classFieldset','mensaje'));
	}else{
		if (isset($_GET['usuarioAComparar_slc'])) {
			if ($_GET['usuarioAComparar_slc'] == "" && $_GET['usuarioAComparar_txt'] == "") {
				$mensaje = "Por favor selecciona o introduce un usuario";
			}
			if ($_GET['usuarioAComparar_slc'] == "") {
				$id = $_GET['usuarioAComparar_txt'];
				header("Location: compararGlobal?id=$id");
			}else{
				$id = $_GET['usuarioAComparar_slc'];
				header("Location: compararGlobal?id=$id");
			}
		}

		if (isset($_GET["id"])) {
			$compararCon = $_GET["id"];
			extract(getDatosUsuario($compararCon));
			if (!$noExiste) {
				$classFieldset = "displayBlock";
				extract(getProblemasUsuario($compararCon));
				extract(getCalculoProblemas($totalRealizados));
				$usuarioComparar = array(
				'UsuarioCoj' 			=> $compararCon,
				'totalRealizados' 		=> $totalRealizados,
				'totalIntentados' 		=> $totalIntentados,
				'totalProblemas' 		=> $_SESSION["totalProblemas"],
				'porcentajeRealizado' 	=> $porcentajeRealizado,
				'progressBarColor'		=> "color4"
				);
				
				extract(getComparacion($usuarioPropio['UsuarioCoj'],$usuarioComparar['UsuarioCoj']));
				$u1 = $usuarioPropio['UsuarioCoj'];
				$u2 = $usuarioComparar['UsuarioCoj'];
				$link = "http://coj.uci.cu/user/compareusers.xhtml?uid1=$u1&uid2=$u2&submit=Compare";
			} else {
				header("Location: compararGlobal?noExiste");
			}
		}

		view("compararGlobal", compact('usuarioPropio','usuarioComparar','opciones','classFieldset','mensaje','solveForUser1','solveForBoth','solveForUser2','triedForUser1','triedForBoth','triedForUser2','porReaU1','porReaBo','porReaU2','porIntU1','porIntBo','porIntU2','link'));
	}
	
