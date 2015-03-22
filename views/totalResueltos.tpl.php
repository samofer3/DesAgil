<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Total Problemas Resueltos</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
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
		<p>Usuario: <strong class="usuario"><?= $UsuarioCoj; ?></strong></p>
		<p>Problemas totales resueltos: <strong class="personalResultados"><?= $totalRealizados; ?></strong></p>
		<p>Problemas totales intentados: <strong class="personalResultados"><?= $totalIntentados; ?></strong></p>
		<p>Total de problemas: <strong><?= $totalProblemas ?></strong></p>
		<p>Porcentaje de avance: <progress value="<?= $porcentajeRealizado; ?>" max="100"></progress> <?= $porcentajeRealizado; ?>%</p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ac" target="_blank">Problemas Aceptados</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=sie" target="_blank">Problemas con Errores internos</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=tle" target="_blank">Problemas con Tiempo Límite excedido</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=mle" target="_blank">Problemas con Límite de memoria excedida</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=wa" target="_blank">Problemas con Respuestas erróneas</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=sle" target="_blank">Problemas con Línea simple a editar</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ce" target="_blank">Problemas con Error de compilación</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=rte" target="_blank">Problemas con Error en tiempo de ejecución</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ole" target="_blank">Problemas con Límite de salida excedido</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=pe" target="_blank">Problemas con Error de presentación</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=ivf" target="_blank">Problemas con Función invalida</a></p>
		<p><a href="http://coj.uci.cu/24h/status.xhtml?username=<?= $UsuarioCoj?>&status=jdg" target="_blank">Problemas en Revisión</a></p>
	</section>
	<footer>
		<p>Powered by |</p><p>DesAgil</p><p>Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>