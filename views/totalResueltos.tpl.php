<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Total Problemas Resueltos</title>
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
							<li><a href="">Usuarios ITVER</a></li>
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
			    <td>Total de problemas:</td>
			    <td><strong><?= $totalProblemas ?></strong></td>
			  </tr>
			  <tr>
			    <td>Porcentaje de avance:</td>
			    <td>
			    	<div class="progressbar" data-perc="<?= $porcentajeRealizado; ?>">
						<div class="bar <?= $progressBarColor; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div>
				</td>
			  </tr>
			</table>
		</fieldset>
		<div class="linkProblemas">
		<fieldset>
			<legend>Ver lista de problemas según:</legend>
			<table>
			  <tr>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ac" target="_blank">Aceptados</a></td>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=sie" target="_blank">Errores internos</a></br></td>
			  </tr>
			  <tr>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=tle" target="_blank">Tiempo Límite excedido</a></td>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=mle" target="_blank">Límite de memoria excedida</a></br></td>
			  </tr>
			  <tr>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=wa" target="_blank">Respuestas erróneas</a></td>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=sle" target="_blank">Línea simple a editar</a></br></td>
			  </tr>
			  <tr>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ce" target="_blank">Error de compilación</a></td>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=rte" target="_blank">Error en tiempo de ejecución</a></br></td>
			  </tr>
			  <tr>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ole" target="_blank">Límite de salida excedido</a></td>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=pe" target="_blank">Error de presentación</a></br></td>
			  </tr>
			  <tr>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ivf" target="_blank">Función invalida</a></td>
			    <td><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=jdg" target="_blank">Revisión</a></td>
			  </tr>
			</table>
		</fieldset>
		</div>
	</section>
	<footer>
		<p>Powered by |</p><p>DesAgil</p><p>Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/progressBar.js"></script>
</body>
</html>