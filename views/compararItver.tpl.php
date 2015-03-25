<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Compararte con otros alumnos del ITVER</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/progressBar.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li>
					<a href="">Estadisticas personales <span class="caret"></span></a>
					<div>
						<ul>
							<li><a href="totalResueltos">Problemas resueltos - Total</a></li>
							<li><a href="">Problemas resueltos - Categorias</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="">Comparativo <span class="caret"></span></a>
					<div>
						<ul>
							<li><a href="compararItver">Usuarios ITVER</a></li>
							<li><a href="">Usuarios Externos</a></li>
							<li><a href="">Primeros nivel nacional</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="">Global <span class="caret"></span></a>
					<div>
						<ul>
							<li><a href="">Usuarios totales</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="">Adm. Cuenta <span class="caret"></span></a>
					<div>
						<ul>
							<li><a href="contrasena">Cambiar contraseña</a></li>
							<li><a href="eliminar">Eliminar usuario</a></li>
							<li><a href="salir">Cerrar sesión</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</nav>
	</header>
	<section>
		<form id="compararItver" name="formularioCompararI" action="cambiarContrasena" class="formulario" method="post" enctype="application/x-www-form-urlencoded">
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
					<p><input id="comparar_btn" class="fade marginTop1Em" type="submit" name="comparar_btn" value="Comparar"/></p>
					<p class="center"><strong><?= $mensaje ?></strong></p>
			</fieldset>
		</form>
		<fieldset class="datosUsuario">
			<legend>Datos de usuario</legend>
			<table id="datosUsuario">
			  <tr>
			    <td>Usuario:</td>
			    <td><strong class="usuario"><?= $UsuarioCoj; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales resueltos:</td>
			    <td><strong class="personalResultados"><?= $totalRealizados; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales intentados:</td>
			    <td><strong class="personalResultados"><?= $totalIntentados; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Porcentaje de avance:</td>
			    <td>
			    	<div class="progressbar" data-perc="<?= $porcentajeRealizado; ?>">
						<div class="bar <?= $progressBarColor[0]; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			</table>
		</fieldset>
		<fieldset class="datosUsuario">
			<legend>Datos de usuario</legend>
			<table id="datosUsuario">
			  <tr>
			    <td>Usuario:</td>
			    <td><strong class="usuario"><?= $UsuarioCoj; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales resueltos:</td>
			    <td><strong class="personalResultados"><?= $totalRealizados; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales intentados:</td>
			    <td><strong class="personalResultados"><?= $totalIntentados; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Porcentaje de avance:</td>
			    <td>
			    	<div class="progressbar" data-perc="<?= $porcentajeRealizado; ?>">
						<div class="bar <?= $progressBarColor[1]; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			</table>
		</fieldset>
		<fieldset class="diferenciaProblemas">
			<legend>Problemas realizados que $usuario no ha hecho</legend>
		</fieldset>
		<fieldset class="diferenciaProblemas">
			<legend>Problemas no realizados que $usuario ha hecho</legend>
		</fieldset>
	</section>
	<footer>
		<p>Powered by |</p><p>DesAgil</p><p>Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/progressBar.js"></script>
</body>
</html>