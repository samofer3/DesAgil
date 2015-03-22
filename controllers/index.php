<?php
	//Si regresa al index destruimos la sesion
	session_start();
	session_destroy();

	$mensaje = false;

	//Base if
	// if (isset($_GET[""])) {$mensaje = "";}
	if (isset($_GET["eliminado"])) 			{$mensaje = "Usuario eliminado con éxito";}
	if (isset($_GET["noLogin"])) 			{$mensaje = "Tu sesión expiro o no has accedido al sistema";}
	if (isset($_GET["datosInvalidos"])) 	{$mensaje = "Tus datos vienen de un origen desconocido";}
	if (isset($_GET["noUsuarioCoj"])) 		{$mensaje = "Usuario no registrado en la página COJ";}
	if (isset($_GET["noUsuarioItver"])) 	{$mensaje = "Usuario COJ no es del Instituto Tecnológico de Veracruz";}
	if (isset($_GET["registrado"])) 		{$mensaje = "Registro con éxito, ahora puedes acceder con tus datos";}
	if (isset($_GET["registradoNo"])) 		{$mensaje = "Ocurrió un problema al registrarte, por favor intenta de nuevo";}
	if (isset($_GET["usuarioExistente"])) 	{$mensaje = "Tu usuario o usuario COJ ya existe en el sistema";}
	if (isset($_GET["usuarioNoExistente"])) {$mensaje = "Usuario no existente o contraseña incorrecta, por favor intenta de nuevo";}

	view("index",compact("mensaje"));