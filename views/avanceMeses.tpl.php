<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Avance de número de problemas por mes</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/progressBar.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section>
		<form id="compararItver" name="formularioCompararI" action="avanceMeses" class="formulario" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="datosUsuario">
				<legend class="legendContrasena">Selección de usuario</legend>
					<table id="comparacion">
					  <tr>
					    <td><span>Buscar por nombre específico:</span></td>
					    <td><input class="" id="usuarioAComparar" type="text" name="usuario_txt"/></td>
					  </tr>
					</table>
					<p>
						<input id="comparar_btn" class="fade marginTop1Em" type="submit"/></br></br>
						<?= $mensaje; ?>
					</p>
			</fieldset>
		</form>
		<div id="graficaPersonal" class="<?= $classFieldset ?>">
			<fieldset class="datosUsuario">
				<legend>Avance de número de problemas por mes</legend>
				<?= "<img src='graficarFechasProblemasPersonal$link' />";?> 
			</fieldset>
		</div>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>