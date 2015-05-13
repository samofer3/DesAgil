<?php
	include_once("php/sesion.php");

	$usuarioCoj = $_SESSION["usuarioCoj"];
	$mensaje = "Usuario COJ: " . $_SESSION["usuarioCoj"];
	$classFieldset = "displayNone";
	$opcionesEliminar = "";

	if (isset($_GET["noEliminado"])) {
		$mensaje = "No se pudo eliminar el usuario, intenta de nuevo";
	}

	if (isset($_GET["eliminado"])) {
		$user = $_GET["user"];
		$mensaje = "Se ha eliminado $user del sistema";
	}

	if ($usuarioCoj == "llanero") {
		$arrayUsuarios = getArrayUsuariosRegistrados();
		$opcionesEliminar = converterArrayAsociativoToSelect($arrayUsuarios,$usuarioCoj);
		$classFieldset = "displayBlock";
	}
	

	view("eliminar",compact('mensaje','opcionesEliminar','classFieldset'));