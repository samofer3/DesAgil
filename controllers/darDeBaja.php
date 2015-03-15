<?php
	include_once("php/conexion.php");
	session_start();

	$usuario = $_SESSION["usuario"];

	$consulta1 = "call borrar('$usuario')";
	$ejecutar_consulta1 = $conexion->query($consulta1);
	
	if ($ejecutar_consulta1) {
		session_destroy();
		header("Location: index?eliminado");
	}else{
		header("Location: eliminar?noEliminado");
	}