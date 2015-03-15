<?php 
 	session_start();

 	//Evaluo que la sesion contine verificando una de las variables creadas en control.php, cuando esta ya no coincida con su valor inicial se redirije al archivo de salir.php
 	if (!isset($_SESSION["autentificado"]) || $_SESSION["autentificado"] == false) {
 		header("Location: index?noLogin");
 	}else{
	 	//sino, calculamos el tiempo transcurrido
	    $fechaGuardada = $_SESSION["ultimoAcceso"];
	    $ahora = date("Y-n-j H:i:s");
	    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

	    //comparamos el tiempo transcurrido
	     if($tiempo_transcurrido >= 1800) {
	     //si pasaron 30 minutos o más
	      header("Location: index?noLogin"); //envío al usuario a la pag. de autenticación
	      //sino, actualizo la fecha de la sesión
		 }else {
		    $_SESSION["ultimoAcceso"] = $ahora;
		 } 
 	}
?>