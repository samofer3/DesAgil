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
		<form id="compararItver" name="formularioCompararI" action="compararProblema" class="formulario" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="datosUsuario">
				<legend class="legendContrasena">Comparar problema</legend>
					<p><a href="http://coj.uci.cu/24h/problems.xhtml" target="_blank">Ver página COJ para revisar lista de problemas</a></p>
					<table id="comparacion">
					  <tr>
					    <td><span>ID del problema:</span></td>
					    <td><input class="" id="idProblema" type="text" name="idProblema_txt" type="number" required/></td>
					  </tr>
					  <tr>
					  	<td></br></td>
					  </tr>
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores del ITVER:</span></td>
					    <td><select class="" id="usuarioACompararSelect2" name="usuarioACompararGlobal_slc" ><?= $opcionesItver ?></select></td>
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
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores del ITVER:</span></td>
					    <td><select class="" id="usuarioACompararSelect1" name="usuarioAComparar3_txt" ><?= $opcionesItver ?></select></td>
					  </tr>
					  <tr>
					    <td><span>Selecciona uno de los 30 mejores del ITVER:</span></td>
					    <td><select class="" id="usuarioACompararSelect1" name="usuarioAComparar4_txt" ><?= $opcionesItver ?></select></td>
					  </tr>
					</table>
					<p><input id="comparar_btn" class="fade marginTop1Em" type="submit"/></p>
			</fieldset>
		</form>
		<fieldset class="datosUsuario <?= $classFieldset ?>">
			<legend>Comparativa</legend>
			<table id="datosUsuario">
			  <tr>
			    <td>ID del problema:</td>
			    <td><strong class="personalResultados"><?= $idProblema; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuarioPropio; ?></td>
			    <td><strong class="personalResultados"><?= $mensajePropio; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuarioItver; ?></td>
			    <td><strong class="personalResultados"><?= $mensajeItver; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuarioGlobal; ?></td>
			    <td><strong class="personalResultados"><?= $mensajeGlobal; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuario1; ?></td>
			    <td><strong class="personalResultados"><?= $mensaje1; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuario2; ?></td>
			    <td><strong class="personalResultados"><?= $mensaje2; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuario3; ?></td>
			    <td><strong class="personalResultados"><?= $mensaje3; ?></strong></td>
			  </tr>
			  <tr>
			    <td><?= $usuario4; ?></td>
			    <td><strong class="personalResultados"><?= $mensaje4; ?></strong></td>
			  </tr>
			</table>
		</fieldset>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>