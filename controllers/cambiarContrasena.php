<?php
	include_once("php/conexion.php");
	session_start();

	$usuario 			= $_SESSION["usuario"];
	$contrasenaVieja	= $_POST["contrasenaVieja_txt"];
	$contrasenaNueva	= $_POST["contrasenaNueva_txt"];
	$contrasenaNueva2	= $_POST["contrasenaNueva2_txt"];

	$consulta1 = "SELECT email FROM login WHERE email='$usuario' AND contrasena='$contrasenaVieja'";
	$ejecutar_consulta1 = $conexion->query($consulta1);
	$num_regs1 = $ejecutar_consulta1->num_rows;
	$conexion->close();
	if ($num_regs1 == 1) {
		//Significa que los datos antiguos son correctos
		if (strcmp($contrasenaNueva, $contrasenaNueva2) == 0) {
			//Comparamos que las contraseñas sean iguales en caso de que hubieran saltado el filtro Jquery
			$conexion = conectarse();
			$consulta2 = "UPDATE login SET contrasena='$contrasenaNueva' WHERE email='$usuario'";
			$ejecutar_consulta2 = $conexion->query($consulta2);
			$conexion->close();
			if ($ejecutar_consulta2) {
				//La consulta se realizo con exito
				header("Location: contrasena?actualizado");
			}else{
				//Hubo un problema al intentar actualizar la contraseña
				header("Location: contrasena?noActualizado");
			}
		}else{
			//Las contraseñas de los campos no tienen el mismo valor
			header("Location: contrasena?contrasenasDif");
		}
	}else{
		//La contraseña actual no coincide con el usuario logueado
		header("Location: contrasena?datosErroneos");
	}