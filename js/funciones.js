var $login = $('#login'),
	$registrar = $('#registrar'),
	$mostrarRegistro = $('#mostrarRegistro'),
	$mostrarLogin = $('#mostrarLogin'),
	$mensaje = $('#mensaje');

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

$mostrarRegistro.click(mostrarRegistro);
$mostrarLogin.click(mostrarLogin);