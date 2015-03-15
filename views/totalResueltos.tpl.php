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
							<li><a href="">Porcentaje de avance - Total</a></li>
							<li><a href="">Porcentaje de avance - Categorias</a></li>
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
							<li><a href="">Cambiar contraseña</a></li>
							<li><a href="">Eliminar usuario</a></li>
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
	</section>
	<footer>
		<p>Powered by: DesAgil Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>