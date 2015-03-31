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
	
	extract(getNombres30Itver());
	$opciones = converterArrayToSelect($resultado, $usuarioPropio['UsuarioCoj']);

	if (isset($_GET['usuarioAComparar_slc'])) {
		if ($_GET['usuarioAComparar_slc'] == "" && $_GET['usuarioAComparar_txt'] == "") {
			$mensaje = "Por favor selecciona o introduce un usuario del ITVER";
		}
		if ($_GET['usuarioAComparar_slc'] == "") {
			$id = $_GET['usuarioAComparar_txt'];
			header("Location: compararItver?id=$id");
		}else{
			$id = $_GET['usuarioAComparar_slc'];
			header("Location: compararItver?id=$id");
		}
	}

	if (isset($_GET["id"])) {
		$compararCon = $_GET["id"];
		extract(getDatosUsuario($compararCon));
		if (!$noExiste) {
			if ($institucion == "Instituto Tecnológico de Veracruz") {
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

				//http://coj.uci.cu/user/compareusers.xhtml?uid1=gmo&uid2=EdgarOr&submit=Compare
			}else{
				$mensaje = "Usuario COJ no es del Instituto Tecnológico de Veracruz";
				//header("Location: compararItver");
			}
		} else {
			$mensaje = "Usuario COJ no existe";
			//header("Location: compararItver");
		}
	}

	view("compararItver", compact('usuarioPropio','usuarioComparar','opciones','classFieldset','mensaje'));