<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Compararte con otros alumnos del ITVER</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/progressBar.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section>
		<form id="compararItver" name="formularioCompararI" action="compararCategorias" class="formulario" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="datosUsuario">
				<legend class="legendContrasena">Comparar problemas de usuarios por categorías</legend>
					<table id="comparacion">
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores global:</span></td>
					    <td><select class="" id="usuarioACompararSelect2" name="usuarioACompararGlobal_slc" ><?= $opcionesGlobal ?></select></td>
					  </tr>
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores del ITVER:</span></td>
					    <td><select class="" id="usuarioACompararSelect1" name="usuarioACompararItver_slc" ><?= $opcionesItver ?></select></td>
					  </tr>
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores del ITVER:</span></td>
					    <td><select class="" id="usuarioACompararSelect1" name="usuarioAComparar1_txt" ><?= $opcionesItver ?></select></td>
					  </tr>
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores del ITVER:</span></td>
					    <td><select class="" id="usuarioACompararSelect1" name="usuarioAComparar2_txt" ><?= $opcionesItver ?></select></td>
					  </tr>
					</table>
					<p><input id="comparar_btn" class="fade marginTop1Em" type="submit"/></p>
			</fieldset>
		</form>
		<div id="graficaPersonal" class="<?= $classFieldset ?>">
			<fieldset class="datosUsuario">
				<legend>Comparativa</legend>
				<?= "<img src='graficarClasificacionProblemasVarios$link' />";?> 
			</fieldset>
		</div>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>