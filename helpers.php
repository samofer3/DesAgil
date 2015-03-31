<?php
	include_once("php/simple_html_dom.php");
	
	function view($template, $vars = array()) 
	{
		extract($vars);
		require "views/$template.tpl.php";
	}

	function controller($name)
	{
		if (empty($name)) {
			$name = "index";
		}

		$file = "controllers/$name.php";
		if (file_exists($file)) {
			require $file;
		} else {
			header("HTTP/1.0 404 Not Found");
			exit("Pagina no encontrada");
		}

	}

	function getDatosUsuario($username){
		$html = file_get_html("http://coj.uci.cu/user/useraccount.xhtml?username=$username");
		if ($html) {
			$nombre 		  = $html->find('.col-xs-6', 0)->plaintext;
			$apellido		  = $html->find('.col-xs-6', 1)->plaintext;
			$sexo			  = $html->find('.col-xs-6', 3)->plaintext;
				$sexo = preg_replace("/[^a-zA-Z]+/", "", $sexo);
				$sexo = ($sexo == "Male") ? "Masculino" : "Femenino";
			$pais			  = $html->find('.col-xs-6', 4)->plaintext;
			$institucion	  = $html->find('.col-xs-6', 5)->plaintext;
			$score			  = $html->find('.col-xs-6', 17)->plaintext;
			$rangoUsuario	  = $html->find('.col-xs-6', 18)->plaintext;
			$rangoInstitucion = $html->find('.col-xs-6', 19)->plaintext;
			$rangoPais		  = $html->find('.col-xs-6', 20)->plaintext;
			$noExiste = false;
			return compact('nombre','apellido','sexo','pais','institucion','score','rangoUsuario','rangoInstitucion','rangoPais','noExiste');
		}else{
			$noExiste = true;
			return compact('noExiste');
		}

	}

	function getNombres30Itver(){
		$html = file_get_html("http://coj.uci.cu/tables/usersinstitutionrank.xhtml?inst_id=8175");
		$table 		= $html->find('table',1);
		$aTotal 	= $table->find('a[title]');
		$resultado	= array();
		$contador 	= 0;
		foreach ($aTotal as $a) {
			$nombre = $a->innertext;
			$opcion = preg_replace("/[^a-zA-Z0-9]+/", "", $nombre);
			$resultado[$contador] = $opcion;
			$contador++;
		}
		return compact('resultado');
	}

	function getProblemasUsuario($username){
		$html = file_get_html("http://coj.uci.cu/user/useraccount.xhtml?username=$username");
		//7 es el valor de problemas resueltos, 8 es el valor de problemas intentados
		$realizados = $html->find('.panel-heading', 7);
		$totalRealizados = $realizados->find('span',0)->plaintext;
		$intentados = $html->find('.panel-heading', 8);
		$totalIntentados = $intentados->find('span',0)->plaintext;
		return compact('totalRealizados','totalIntentados');
	}

	function getCalculoProblemas($totalRealizados){
		$html = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=10000");
		$navbuttons = $html->find('a');
		$posicion = count($navbuttons)-3;
		$a = $html->find('a',$posicion)->plaintext;

		$html2 = file_get_html("http://coj.uci.cu/tables/problems.xhtml?page=$a");
		$tr = $html2->find('table',1);
		$aCount = $tr->getElementsByTagName('tr');
		$aUltimo = count($aCount)-1;

		$totalProblemas = (($a-1)*50)+$aUltimo;
		$porcentajeRealizado = ceil(($totalRealizados*100)/$totalProblemas);
		return compact('totalProblemas','porcentajeRealizado');
	}

	function converterArrayToSelect($array, $UsuarioCoj){
		$opciones = "<option value=''>---</option>";
		for ($i=0; $i < count($array); $i++) { 
			if ($array[$i] != $UsuarioCoj) {
				$opciones .=  "<option value='$array[$i]'>$array[$i]</option>";
			}
		}

		return $opciones;
	}