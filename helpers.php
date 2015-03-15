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
			return compact("nombre","apellido","sexo","pais","institucion","score","rangoUsuario","rangoInstitucion","rangoPais","noExiste");
		}else{
			$noExiste = true;
			return compact("noExiste");
		}

	}