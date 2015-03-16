var $login = $('#login'),
	$registrar = $('#registrar'),
	$mostrarRegistro = $('#mostrarRegistro'),
	$mostrarLogin = $('#mostrarLogin'),
	$mensaje = $('#mensaje'),
	$contrasenaNueva = $('#contrasenaNueva'),
	$contrasenaNueva2 = $('#contrasenaNueva2');

var buttonRegister = false;

function mostrarLogin(evento){
	if (!buttonRegister) {
		$registrar.hide('fast');
		$login.show('slow');
		$mostrarRegistro.removeClass('disableALink');
		$mostrarLogin.addClass('disableALink');
		$mensaje.hide('fast');
		buttonRegister = !buttonRegister;
	};
	return false;
}

function mostrarRegistro(evento){
	if (buttonRegister) {
		$login.hide('fast');
		$registrar.show('slow');
		$mostrarLogin.removeClass('disableALink');
		$mostrarRegistro.addClass('disableALink');
		$mensaje.hide('fast');
		buttonRegister = !buttonRegister;
	};
	return false;
}

function obtenerValorInput (evento) {
	$buttonContrasena = $('#contrasena_btn');
	$buttonContrasena.attr("disabled", true);
	$buttonContrasena.val('Contraseñas no coindicen');
	if ($contrasenaNueva.val() == $contrasenaNueva2.val()) {
		$buttonContrasena.removeAttr('disabled');
		$buttonContrasena.val('Actualizar contraseña');
	};
}

$mostrarRegistro.click(mostrarRegistro);
$mostrarLogin.click(mostrarLogin);
$contrasenaNueva.change(obtenerValorInput);
$contrasenaNueva2.change(obtenerValorInput);