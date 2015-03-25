<?php
	$html = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=10000");
	$navbuttons = $html->find('a');
	$posicion = count($navbuttons)-3;
	$a = $html->find('a',$posicion)->plaintext;

	$html2 = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=$a");
	$tr = $html2->find('table',1);
	$aCount = $tr->getElementsByTagName('tr');
	$aUltimo = count($aCount)-1;

	$totalProblemas = (($posicion-1)*50)+$aUltimo;
	
	echo $a;