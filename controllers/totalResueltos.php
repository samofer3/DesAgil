<?php
	include("php/simple_html_dom.php");
	//Pagina para obtener datos de cierto usuario
	//	http://coj.uci.cu/user/useraccount.xhtml?username=gmo
	// datos class = "col-xs-6"

	//Esta variable tiene que ser obtenida de _SESSION
	$UsuarioCoj = "gmo";
	$html = file_get_html("http://coj.uci.cu/user/useraccount.xhtml?username=$UsuarioCoj");
		//7 es el valor de problemas resueltos, 8 es el valor de problemas intentados
	$realizados = $html->find('.panel-heading', 7);
	$totalRealizados = $realizados->find('span',0)->plaintext;
	$intentados = $html->find('.panel-heading', 8);
	$totalIntentados = $intentados->find('span',0)->plaintext;

	view("totalResueltos", compact('totalRealizados','totalIntentados','UsuarioCoj'));