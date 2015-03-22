<?php
	include_once("php/simple_html_dom.php");
	include_once("php/sesion.php");
	//CONVERTIR A FUNCIONES.!!!

	//Esta variable tiene que ser obtenida de _SESSION
	$UsuarioCoj = $_SESSION["usuarioCoj"];
	$html = file_get_html("http://coj.uci.cu/user/useraccount.xhtml?username=$UsuarioCoj");
		//7 es el valor de problemas resueltos, 8 es el valor de problemas intentados
	$realizados = $html->find('.panel-heading', 7);
	$totalRealizados = $realizados->find('span',0)->plaintext;
	$intentados = $html->find('.panel-heading', 8);
	$totalIntentados = $intentados->find('span',0)->plaintext;

	$html2 = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=10000");
	$navbuttons = $html2->find('a');
	$posicion = count($navbuttons)-3;
	$a = $html2->find('a',$posicion)->plaintext;
	
	$html3 = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=$a");
	$tr = $html3->find('table',1);
	$aCount = $tr->getElementsByTagName('tr');
	$aUltimo = count($aCount)-1;

	$totalProblemas = (($posicion-1)*50)+$aUltimo;
	$porcentajeRealizado = ceil(($totalRealizados*100)/$totalProblemas);

	view("totalResueltos", compact('totalRealizados','totalIntentados','UsuarioCoj','totalProblemas','porcentajeRealizado'));