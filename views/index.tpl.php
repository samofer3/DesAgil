<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>
	<header class="index">
		<p>Herramientas</p><p>Agiles de </p><p>Desarrollo</p>
	</header>
	<section class="center sectionLogin">
		<form id="registrar" name="formularioRegistrar" action="php/login-control.php" class="formulario" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="fieldsetIndex">
				<legend class="legendRegistrar">Registrar usuario</legend>
				<span>Usuario COJ:</span> <input class="" id="RegistroCoj" type="text" name="usuarioCojR_txt" required/>
				<span>Usuario:</span> <input class="" id="RegistroUsuario" type="text" name="usuarioR_txt" required/>
				<span>Password:</span> <input class="" id="RegistroPassword" type="password" name="passwordR_txt" required/></br>
				<input class="button marginTop1Em" type="submit" name="login_btn" value="Registrar"/>
			</fieldset>
		</form>
		<form id="login" class="formulario formularioLogin" name="formularioLogin" action="php/login-control.php" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset class="fieldsetIndex">
				<legend class="legendLogin">Entrar al sistema</legend>
				<span>Usuario:</span> <input class="" id="loginUsuario" type="text" name="usuarioLogin_txt" required/>
				<span>Password:</span> <input class="" id="loginPassword" type="password" name="passwordLogin_txt" required/></br>
				<input class="button marginTop1Em" type="submit" name="entrar_btn" value="Loguearse"/>
			</fieldset>
		</form>
		<p id="mensaje" class="mensaje"><?= $mensaje ?></p>
		<a href="#" id="mostrarRegistro" class="disableALink activeLoginALink">Registrarse</a>
		<a href="#" id="mostrarLogin" class="activeLoginALink">Loguearse</a>
	</section>
	<footer>
		<p>Powered by |</p><p>DesAgil</p><p>Team</p>
	</footer>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>