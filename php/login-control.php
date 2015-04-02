<?php 
	include("../config.php");
	include("../helpers.php");
	include("conexion.php");

	//Validamos de donde viene la información
	if (isset($_POST["usuarioCojR_txt"])) {
		$formulario = "Registrar";
		$usuarioCOJ = $_POST["usuarioCojR_txt"];
		$usuario    = $_POST["usuarioR_txt"];
		$password   = $_POST["passwordR_txt"];
	}else if (isset($_POST["usuarioLogin_txt"])) {
		$formulario = "Login";
		$usuario    = $_POST["usuarioLogin_txt"]; 
		$password   = $_POST["passwordLogin_txt"];
	}else{
		$formulario = false;
	}


	if ($formulario == "Registrar") {
		//Cuando se registra

		//Verificamos que no exista ni usuarioCoj ni usuario normal
		$consulta1 = "SELECT userCOJ FROM login WHERE userCOJ='$usuarioCOJ'";
		$ejecutar_consulta1 = $conexion->query($consulta1);
		$num_regs1 = $ejecutar_consulta1->num_rows;

		$consulta2 = "SELECT email FROM login WHERE email='$usuario'";
		$ejecutar_consulta2 = $conexion->query($consulta2);
		$num_regs2 = $ejecutar_consulta2->num_rows;
		$conexion->close();

		if ($num_regs1 == 0 && $num_regs2 == 0) {
			//UsuarioCoj y usuario disponibles en la BD

			//Obtengo y extraigo datos de la pagina COJ
			extract(getDatosUsuario($usuarioCOJ));
			if ($noExiste) {
				//Si el usuario no existe en la pagina termino
				header("Location: ../index?noUsuarioCoj");
			}else{
				if ($institucion == "Instituto Tecnológico de Veracruz") {
					//Pasados todos los filtros (Usuarios en BD y Pagina Coj) Se registra
					$conexion = conectarse();
					$consulta = "call registrar('$usuario','$password','$usuarioCOJ')";
					$ejecutar_consulta = $conexion->query($consulta);
					$conexion->close();
					if ($ejecutar_consulta) {
						//Cuando se lleva a cabo la consulta con exito
						header("Location: ../index?registrado");
					}else{
						//Cuando no se lleva a cabo la consulta con exito
						header("Location: ../index?registradoNo");
					}
				}else{
					//El usuario no es del ITVER
					header("Location: ../index?noUsuarioItver");
				}
			}

		}else{
			//Cuando ya existe en la BD
			header("Location: ../index?usuarioExistente");
		}
	}else if ($formulario == "Login") {
		//Cuando se loguea
		$consulta1 = "SELECT * FROM login WHERE email='$usuario' AND contrasena='$password'";
		$ejecutar_consulta1 = $conexion->query($consulta1);
		$num_regs1 = $ejecutar_consulta1->num_rows;

		if ($num_regs1 == 1) {
			$datos = $ejecutar_consulta1->fetch_assoc();
			$usuario = $datos["email"];
			$usuarioCOJ = $datos["userCOJ"];

			//inicio la sesion
			session_start();

			//Declaro mis variables de sesión
			$_SESSION["autentificado"] 						= true;
			$_SESSION["usuario"] 							= $usuario;
			$_SESSION["usuarioCoj"] 						= $usuarioCOJ;
			$_SESSION["ultimoAcceso"] 						= date("Y-n-j H:i:s");
			extract(getProblemasUsuario($usuarioCOJ));
			$_SESSION["totalRealizados"] 					= $totalRealizados;
			$_SESSION["totalIntentados"] 					= $totalIntentados;
			extract(getCalculoProblemas($totalRealizados));
			$_SESSION["totalProblemas"] 					= $totalProblemas;
			$_SESSION["porcentajeRealizado"] 				= $porcentajeRealizado;
			extract(getNombres30Itver());
			$_SESSION["itver30"] 							= $resultado;
			extract(getNombres30Global());
			$_SESSION["global30"] 							= $resultado;
			header("Location: ../home");
		}else{
			header("Location: ../index?usuarioNoExistente");
		}
	}else{
		//Cuando la informacion no viene de ninguno de los forms conocidos
		header("Location: ../index?datosInvalidos");
	}
?>