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
			$realizados = $html->find('.panel-heading', 7);
			$totalRealizados = $realizados->find('span',0)->plaintext;
			if ($username == "ReynaldoGil") {
				$totalIntentados = 0;
			} else {
				$intentados = $html->find('.panel-heading', 8);
				$totalIntentados = $intentados->find('span',0)->plaintext;
			}
			$noExiste = false;
			return compact('nombre','apellido','sexo','pais','institucion','score','rangoUsuario','rangoInstitucion','rangoPais','noExiste','totalRealizados','totalIntentados');
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

	function getNombres30Global(){
		$html = file_get_html("http://coj.uci.cu/tables/usersrank.xhtml");
		$table 		= $html->find('table',1);
		$aTotal 	= $table->find('a[title]');
		$resultado	= array();
		$contador 	= 0;
		foreach ($aTotal as $a) {
			$nombre = $a->innertext;
			$opcion = preg_replace("/[^a-zA-Z0-9_]+/", "", $nombre);
			$resultado[$contador] = $opcion;
			$contador++;
		}
		return compact('resultado');
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

	function getPorcentajeRealizado($totalRealizados){
		$totalProblemas = $_SESSION["totalProblemas"];
		$porcentajeRealizado = ceil(($totalRealizados*100)/$totalProblemas);
		return $porcentajeRealizado;
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

	function getComparacion($usuario1, $usuario2){
		$html = file_get_html("http://coj.uci.cu/user/compareusers.xhtml?uid1=$usuario1&uid2=$usuario2&submit=Compare");
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

		$totalProblemas = $_SESSION["totalProblemas"];
		$porReaU1 = ceil(($solveForUser1*100)/$totalProblemas);
		$porReaBo = ceil(($solveForBoth*100)/$totalProblemas);
		$porReaU2 = ceil(($solveForUser2*100)/$totalProblemas);
		$porIntU1 = ceil(($triedForUser1*100)/$totalProblemas);
		$porIntBo = ceil(($triedForBoth*100)/$totalProblemas);
		$porIntU2 = ceil(($triedForUser2*100)/$totalProblemas);

		return compact('solveForUser1','solveForBoth','solveForUser2','triedForUser1','triedForBoth','triedForUser2','porReaU1','porReaBo','porReaU2','porIntU1','porIntBo','porIntU2');
	}