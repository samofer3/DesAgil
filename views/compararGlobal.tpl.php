<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Compararte con cualquier alumno</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/progressBar.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section>
		<form id="compararItver" name="formularioCompararI" action="compararGlobal" class="formulario" method="get" enctype="application/x-www-form-urlencoded">
			<fieldset class="datosUsuario">
				<legend class="legendContrasena">Comparar con</legend>
					<table id="comparacion">
					  <tr>
					    <td><span>Seleccionar de los 30 mejores:</span></td>
					    <td><select class="" id="usuarioACompararSelect" name="usuarioAComparar_slc" ><?= $opciones ?></select></td>
					  </tr>
					  <tr>
					    <td><span>Buscar por nombre específico:</span></td>
					    <td><input class="" id="usuarioAComparar" type="text" name="usuarioAComparar_txt"/></td>
					  </tr>
					</table>
					<p><input id="comparar_btn" class="fade marginTop1Em" type="submit"/></p>
					<p class="center"><strong><?= $mensaje ?></strong></p>
			</fieldset>
		</form>
		<fieldset class="datosUsuario">
			<legend>Datos de usuario <?= $usuarioPropio['UsuarioCoj']; ?></legend>
			<table id="datosUsuario">
			  <tr>
			    <td>Problemas totales resueltos:</td>
			    <td><strong class="personalResultados"><?= $usuarioPropio['totalRealizados']; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales intentados:</td>
			    <td><strong class="personalResultados"><?= $usuarioPropio['totalIntentados']; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Porcentaje de avance:</td>
			    <td>
			    	<div class="progressbar" data-perc="<?= $usuarioPropio['porcentajeRealizado']; ?>">
						<div class="bar <?= $usuarioPropio['progressBarColor']; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			</table>
		</fieldset>
		<fieldset class="datosUsuario <?= $classFieldset ?>">
			<legend>Datos de usuario <?= $usuarioComparar['UsuarioCoj']; ?></legend>
			<table id="datosUsuario">
			  <tr>
			    <td>Problemas totales resueltos:</td>
			    <td><strong class="personalResultados"><?= $usuarioComparar['totalRealizados']; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales intentados:</td>
			    <td><strong class="personalResultados"><?= $usuarioComparar['totalIntentados']; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Porcentaje de avance:</td>
				<td>
			    	<div class="progressbar" data-perc="<?= $usuarioComparar['porcentajeRealizado']; ?>">
						<div class="bar"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			</table>
		</fieldset>
		<fieldset class="<?= $classFieldset ?> datosUsuario diferenciaProblemas center">
			<legend><?= $usuarioPropio['UsuarioCoj'];?> VS <?= $usuarioComparar['UsuarioCoj']; ?></legend>
			<table id="diferenciaProblemas">
			  <tr>
			    <td>Comparaciones de problemas resueltos entre usuarios:</td>
				<td>
			    	<?= $usuarioPropio['UsuarioCoj'];?>
			    	<div class="progressbar" data-perc="<?= $porReaU1; ?>">
						<div class="bar <?= $usuarioPropio['progressBarColor']; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div></br>
					<?= $usuarioComparar['UsuarioCoj']; ?>
					<div class="progressbar" data-perc="<?= $porReaU2; ?>">
						<div class="bar"><span></span></div>
						<div class="label"><span></span></div>
					</div></br>
					Ambos
					<div class="progressbar" data-perc="<?= $porReaBo; ?>">
						<div class="bar color3"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			  <tr>
			    <td>Comparaciones de problemas intentados entre usuarios:</td>
				<td>
			    	<?= $usuarioPropio['UsuarioCoj'];?>
			    	<div class="progressbar" data-perc="<?= $porIntU1; ?>">
						<div class="bar <?= $usuarioPropio['progressBarColor']; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div></br>
					<?= $usuarioComparar['UsuarioCoj']; ?>
					<div class="progressbar" data-perc="<?= $porIntU2; ?>">
						<div class="bar"><span></span></div>
						<div class="label"><span></span></div>
					</div></br>
					Ambos
					<div class="progressbar" data-perc="<?= $porIntBo; ?>">
						<div class="bar color3"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			</table>
			<a href="<?= $link; ?>" target="_blank">Ver estadísticas COJ</a>
		</fieldset>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/progressBar.js"></script>
</body>
</html>