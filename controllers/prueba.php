<?php

	extract(getNombres30Global());
	$limite = 5;
	for ($i=0; $i < $limite ; $i++) {
			echo $resultado[$i]."</br>";
			extract(getDatosUsuario($resultado[$i]));
			$usuariosComparados[$i] = array(
				'UsuarioCoj' 			=> $resultado[$i],
			);
	}

	foreach ($usuariosComparados as $usuario) {
		echo $usuario['UsuarioCoj']."</br>";
	}

	


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