<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar cuenta</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section class="center">
		<fieldset class="fieldsetEliminar">
			<legend>Dar de baja</legend>
			<p class="justify">¿Estás seguro que deseas eliminar tu cuenta del sistema? Si realizas esta acción, ya no podrás iniciar sesión con tus datos y tendrías que registrarte de nuevo.</p>
			<p><a id="btnEliminar" class="btnEliminar" href="darDeBaja">Eliminar</a></p>
			<p>Usuario COJ: <strong><?= $mensaje ?></strong></p>
		</fieldset>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>