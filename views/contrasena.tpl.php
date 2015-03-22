<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Contraseña</title>
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
		<form id="contrasena" name="formularioContrasena" action="cambiarContrasena" class="formulario formularioContrasena" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="fieldsetContrasena right">
				<legend class="legendContrasena">Actualizar contraseña</legend>
					<p><span>Contraseña antigua:</span> <input class="" id="contrasenaVieja" type="password" name="contrasenaVieja_txt" required/></br></p>
					<p><span>Nueva contraseña:</span> <input class="" id="contrasenaNueva" type="password" name="contrasenaNueva_txt" required/></br></p>
					<p><span>Repite tu nueva contraseña:</span> <input class="" id="contrasenaNueva2" type="password" name="contrasenaNueva2_txt" required/></br></p>
					<p><input id="contrasena_btn" class="fade marginTop1Em" type="submit" name="contrasena_btn" value="Actualizar contraseña"/></p>
					<p class="center"><strong><?= $mensaje ?></strong></p>
			</fieldset>
		</form>
	</section>
	<footer>
		<p>Powered by |</p><p>DesAgil</p><p>Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>