<?php
	$html = file_get_html("http://coj.uci.cu/user/compareusers.xhtml?uid1=gmo&uid2=jmrt666&submit=Compare");
		$variables[0] = $html->find('.panel-heading', 3)->children(1)->plaintext;
		$variables[1] = $html->find('.panel-heading', 4)->plaintext;
		$variables[2] = $html->find('.panel-heading', 5)->children(1)->plaintext;
		$variables[3] = $html->find('.panel-heading', 6)->children(1)->plaintext;
		$variables[4] = $html->find('.panel-heading', 7)->plaintext;
		$variables[5] = $html->find('.panel-heading', 8)->children(1)->plaintext;
		
		$solveForUser1 	= preg_replace("/[^0-9]+/", "", $variables[0]);
		$solveForBoth 	= preg_replace("/[^0-9]+/", "", $variables[1]);
		$solveForUser2 	= preg_replace("/[^0-9]+/", "", $variables[2]);
		$triedForUser1 	= preg_replace("/[^0-9]+/", "", $variables[3]);
		$triedForBoth 	= preg_replace("/[^0-9]+/", "", $variables[4]);
		$triedForUser2 	= preg_replace("/[^0-9]+/", "", $variables[5]);

		print($variables[0]);
		print($variables[1]);
		print($variables[2]);
		print($variables[3]);
		print($variables[4]);
		print($variables[5]);





	/*
	$navbuttons = $html->find('a');
	$posicion = count($navbuttons)-3;
	$a = $html->find('a',$posicion)->plaintext;

	$html2 = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=$a");
	$tr = $html2->find('table',1);
	$aCount = $tr->getElementsByTagName('tr');
	$aUltimo = count($aCount)-1;

	$totalProblemas = (($posicion-1)*50)+$aUltimo;
	
	echo $a;
	*/