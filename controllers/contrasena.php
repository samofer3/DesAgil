<?php
	include_once("php/sesion.php");

	$mensaje = "Usuario COJ: " . $_SESSION["usuarioCoj"];
	
	if (isset($_GET["actualizado"])) {	$mensaje = "Contraseña actualizada con éxito, la próxima vez inicia sesión con tu nueva contraseña.";}
	if (isset($_GET["noActualizado"])) {$mensaje = "Hubo un problema al intentar actualizar tu contraseña, por favor intenta de nuevo.";}
	if (isset($_GET["contrasenasDif"])) {$mensaje = "Los campos de las contraseñas nuevas que introdujiste no coinciden.";}
	if (isset($_GET["datosErroneos"])) {$mensaje = "La contraseña antigua que proporcionaste es incorrecta.";}

	view("contrasena",compact("mensaje"));