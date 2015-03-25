<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido</title>
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
	<section class="center">
		<figure id="logoCOJ">
			<a href="http://coj.uci.cu/index.xhtml"><img src="img/logoCOJ.png" alt="Logo" title="Caribbean Online Judge" /></a>
		</figure>
		<fieldset id="home">
			<legend>¡Sea usted Bienvenid@!</legend>
			<p class="center">¡Te damos la bienvenida <strong><?= $Usuario?></strong> al sistema COJ-Data Extractor!</p>
			<p>Desde este sistema podrás revisar estadísticas personales e institucionales en referencia al sitio web Caribbean Online Judge (COJ). Atreves de este sistema también puedes comparar tus estadísticas con otros usuarios registrados en el sitio web así como ver un progreso de tus avances de manera general y por categoría.</p>
			<p>Este sistema fue desarrollado pensando en la comunidad estudiantil de la carrera Ingeniería en sistemas computacionales que participa activamente en las diversas competencias de programación.</p>
		</fieldset>
	</section>
	<footer>
		<p>Powered by |</p><p>DesAgil</p><p>Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>