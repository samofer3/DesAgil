<?php
	include_once("php/sesion.php");

	$mensaje = $_SESSION["usuarioCoj"];
	
	if (isset($_GET["noEliminado"])) {
		$mensaje = "No se pudo eliminar tu usuario, intenta de nuevo";
	}

	view("eliminar",compact("mensaje"));