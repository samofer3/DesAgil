<?php
	include_once("php/conexion.php");
	session_start();

	if (isset($_GET["propio"])) {
		$usuario = $_SESSION["usuario"];

		$consulta1 = "call borrar('$usuario')";
		$ejecutar_consulta1 = $conexion->query($consulta1);
		
		if ($ejecutar_consulta1) {
			session_destroy();
			header("Location: index?eliminado");
		}else{
			header("Location: eliminar?noEliminado");
		}
	}

	if (isset($_GET["usuario_select"])) {
		$usuario = $_GET["usuario_select"];

		$consulta1 = "call borrar('$usuario')";
		$ejecutar_consulta1 = $conexion->query($consulta1);
		
		if ($ejecutar_consulta1) {
			header("Location: eliminar?eliminado&user=$usuario");
		}else{
			header("Location: eliminar?noEliminado");
		}
	}