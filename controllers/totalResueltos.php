<?php
	include_once("php/simple_html_dom.php");
	include_once("php/sesion.php");

	//Esta variable tiene que ser obtenida de _SESSION
	$UsuarioCoj 			= $_SESSION["usuarioCoj"];
	$totalRealizados 		= $_SESSION["totalRealizados"];
	$totalIntentados 		= $_SESSION["totalIntentados"];
	$totalProblemas 		= $_SESSION["totalProblemas"];
	$porcentajeRealizado 	= $_SESSION["porcentajeRealizado"];

	view("totalResueltos", compact('UsuarioCoj','totalRealizados','totalIntentados','totalProblemas','porcentajeRealizado'));