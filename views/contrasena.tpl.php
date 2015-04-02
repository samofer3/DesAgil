<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Contraseña</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section>
		<form id="contrasena" name="formularioContrasena" action="cambiarContrasena" class="formulario formularioContrasena" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="fieldsetContrasena right">
				<legend class="legendContrasena">Actualizar contraseña</legend>
					<p><span>Contraseña antigua:</span> <input class="" id="contrasenaVieja" type="password" name="contrasenaVieja_txt" required/></br></p>
					<p><span>Nueva contraseña:</span> <input class="" id="contrasenaNueva" type="password" name="contrasenaNueva_txt" required/></br></p>
					<p><span>Repite tu nueva contraseña:</span> <input class="" id="contrasenaNueva2" type="password" name="contrasenaNueva2_txt" required/></br></p>
					<p><input id="contrasena_btn" class="fade marginTop1Em" type="submit" name="contrasena_btn" value="Actualizar contraseña"/></p>
					<p class="center"><strong><?= $mensaje ?></strong></p>
			</fieldset>
		</form>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>