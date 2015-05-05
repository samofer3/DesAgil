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

	function getArrayProblemasUser($username){
		$html = file_get_html("http://coj.uci.cu/user/useraccount.xhtml?username=$username");
		$arreglo = array();
		if ($html) {
			$realizados = $html->getElementById('#probsACC');
			$a = $realizados->find('a');

			foreach ($a as $key) {
				$valor = trim($key->plaintext);
				$arreglo["$valor"] = $valor;
			}
		}else{
			$arreglo["noExiste"] = true;
		}
		return $arreglo;
	}


	function getNombres30Itver(){
		$html = file_get_html("http://coj.uci.cu/tables/usersinstitutionrank.xhtml?inst_id=8175");
		$table 		= $html->find('table',1);
		$aTotal 	= $table->find('a[title]');
		$resultado	= array();
		$contador 	= 0;
		foreach ($aTotal as $a) {
			$nombre = $a->innertext;
			$opcion = preg_replace("/[^a-zA-Z0-9_]+/", "", $nombre);
			if (strcmp($opcion, "iclassfafaplugi")) {
				$resultado[$contador] = $opcion;
				$contador++;
			}
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
			if (strcmp($opcion, "iclassfafaplugi")) {
				$resultado[$contador] = $opcion;
				$contador++;
			}
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

	function getFechasProblemasDB(){
		include_once("php/conexion.php");

		$consulta = "SELECT * FROM categorias";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$fecha = $registro["fechaActualizacion"];
			$idCategoria = $registro["idCategorias"];
			if ($idCategoria == 25) { $AdHocFecha = $fecha;}
			if ($idCategoria == 1) { $ArithmeticAlgebraFecha = $fecha;}
			if ($idCategoria == 2) { $BruteForceFecha = $fecha;}
			if ($idCategoria == 3) { $CombinationFecha = $fecha;}
			if ($idCategoria == 4) { $DataStructuresFecha = $fecha;}
			if ($idCategoria == 5) { $DynamicProgrammingFecha = $fecha;}
			if ($idCategoria == 6) { $GameTheoryFecha = $fecha;}
			if ($idCategoria == 7) { $GeometryFecha = $fecha;}
			if ($idCategoria == 23) { $GraphTheoryFecha = $fecha;}
			if ($idCategoria == 8) { $GreedyFecha = $fecha;}
			if ($idCategoria == 9) { $NumberTheoryFecha = $fecha;}
			if ($idCategoria == 10) { $SortingSearchingFecha = $fecha;}
			if ($idCategoria == 24) { $StringsFecha = $fecha;}
		}

		$conexion->close();

		return compact('AdHocFecha','ArithmeticAlgebraFecha','BruteForceFecha','CombinationFecha','DataStructuresFecha','DynamicProgrammingFecha','GameTheoryFecha','GeometryFecha','GraphTheoryFecha','GreedyFecha','NumberTheoryFecha','SortingSearchingFecha','StringsFecha');
	}

	function getArrayPorcentajesClasificacionProblemas($username){
		$problemasUsuario = getArrayProblemasUser($username);
		$usuarioClasificacion = array();

		if (isset($problemasUsuario["noExiste"])) {
			$usuarioClasificacion["noExiste"] = true;
		}else{
			extract(getArraysProblemasDB());

			$usuarioClasificacion["AdHoc"] = 0;
			$usuarioClasificacion["ArithmeticAlgebra"] = 0;
			$usuarioClasificacion["BruteForce"] = 0;
			$usuarioClasificacion["Combination"] = 0;
			$usuarioClasificacion["DataStructures"] = 0;
			$usuarioClasificacion["DynamicProgramming"] = 0;
			$usuarioClasificacion["GameTheory"] = 0;
			$usuarioClasificacion["Geometry"] = 0;
			$usuarioClasificacion["GraphTheory"] = 0;
			$usuarioClasificacion["Greedy"] = 0;
			$usuarioClasificacion["NumberTheory"] = 0;
			$usuarioClasificacion["SortingSearching"] = 0;
			$usuarioClasificacion["Strings"] = 0;

			foreach ($problemasUsuario as $valor) {
				if (array_key_exists($valor, $AdHoc)) {$usuarioClasificacion["AdHoc"]++;}
				if (array_key_exists($valor, $ArithmeticAlgebra)) {$usuarioClasificacion["ArithmeticAlgebra"]++;}
				if (array_key_exists($valor, $BruteForce)) {$usuarioClasificacion["BruteForce"]++;}
				if (array_key_exists($valor, $Combination)) {$usuarioClasificacion["Combination"]++;}
				if (array_key_exists($valor, $DataStructures)) {$usuarioClasificacion["DataStructures"]++;}
				if (array_key_exists($valor, $DynamicProgramming)) {$usuarioClasificacion["DynamicProgramming"]++;}
				if (array_key_exists($valor, $GameTheory)) {$usuarioClasificacion["GameTheory"]++;}
				if (array_key_exists($valor, $Geometry)) {$usuarioClasificacion["Geometry"]++;}
				if (array_key_exists($valor, $GraphTheory)) {$usuarioClasificacion["GraphTheory"]++;}
				if (array_key_exists($valor, $Greedy)) {$usuarioClasificacion["Greedy"]++;}
				if (array_key_exists($valor, $NumberTheory)) {$usuarioClasificacion["NumberTheory"]++;}
				if (array_key_exists($valor, $SortingSearching)) {$usuarioClasificacion["SortingSearching"]++;}
				if (array_key_exists($valor, $Strings)) {$usuarioClasificacion["Strings"]++;}
			}

			$usuarioClasificacion["AdHoc"] = round(($usuarioClasificacion["AdHoc"]*100)/sizeof($AdHoc),2);
			$usuarioClasificacion["ArithmeticAlgebra"] = round(($usuarioClasificacion["ArithmeticAlgebra"]*100)/sizeof($ArithmeticAlgebra),2);
			$usuarioClasificacion["BruteForce"] = round(($usuarioClasificacion["BruteForce"]*100)/sizeof($BruteForce),2);
			$usuarioClasificacion["Combination"] = round(($usuarioClasificacion["Combination"]*100)/sizeof($Combination),2);
			$usuarioClasificacion["DataStructures"] = round(($usuarioClasificacion["DataStructures"]*100)/sizeof($DataStructures),2);
			$usuarioClasificacion["DynamicProgramming"] = round(($usuarioClasificacion["DynamicProgramming"]*100)/sizeof($DynamicProgramming),2);
			$usuarioClasificacion["GameTheory"] = round(($usuarioClasificacion["GameTheory"]*100)/sizeof($GameTheory),2);
			$usuarioClasificacion["Geometry"] = round(($usuarioClasificacion["Geometry"]*100)/sizeof($Geometry),2);
			$usuarioClasificacion["GraphTheory"] = round(($usuarioClasificacion["GraphTheory"]*100)/sizeof($GraphTheory),2);
			$usuarioClasificacion["Greedy"] = round(($usuarioClasificacion["Greedy"]*100)/sizeof($Greedy),2);
			$usuarioClasificacion["NumberTheory"] = round(($usuarioClasificacion["NumberTheory"]*100)/sizeof($NumberTheory),2);
			$usuarioClasificacion["SortingSearching"] = round(($usuarioClasificacion["SortingSearching"]*100)/sizeof($SortingSearching),2);
			$usuarioClasificacion["Strings"] = round(($usuarioClasificacion["Strings"]*100)/sizeof($Strings),2);
		
		}
		return $usuarioClasificacion;
	}
	
	function getArraysProblemasDB(){
		include_once("php/conexion.php");
		$conexion = conectarse();
		$AdHoc 				= array();
		$ArithmeticAlgebra 	= array();
		$BruteForce 		= array();
		$Combination 		= array();
		$DataStructures 	= array();
		$DynamicProgramming = array();
		$GameTheory 		= array();
		$Geometry 			= array();
		$GraphTheory 		= array();
		$Greedy 			= array();
		$NumberTheory 		= array();
		$SortingSearching 	= array();
		$Strings 			= array();

		$consulta = "SELECT * FROM problemas WHERE categorias_idCategorias = 25 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$AdHoc["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 1 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$ArithmeticAlgebra["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 2 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$BruteForce["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 3 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$Combination["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 4 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$DataStructures["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 5 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$DynamicProgramming["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 6 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$GameTheory["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 7 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$Geometry["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 23 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$GraphTheory["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 8 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$Greedy["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 9 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$NumberTheory["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 10 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$SortingSearching["$idProblema"] = $nombre;
		}

		$consulta ="SELECT * FROM problemas WHERE categorias_idCategorias = 24 ORDER BY idproblemas";
		$ejecutar_consulta = $conexion->query($consulta);

		while ($registro = $ejecutar_consulta->fetch_assoc()) {
			$idProblema 	= $registro["idproblemas"];
			$nombre 		= $registro["nombre"];
			//$idCategoria 	= $registro["categorias_idCategorias"];
			$Strings["$idProblema"] = $nombre;
		}

		$conexion->close();
		/*
		//Variables disponibles
		$AdHoc
		$ArithmeticAlgebra
		$BruteForce
		$Combination
		$DataStructures
		$DynamicProgramming
		$GameTheory
		$Geometry
		$GraphTheory
		$Greedy
		$NumberTheory
		$SortingSearching
		$Strings
		*/
		return compact('AdHoc','ArithmeticAlgebra','BruteForce','Combination','DataStructures','DynamicProgramming','GameTheory','Geometry','GraphTheory','Greedy','NumberTheory','SortingSearching','Strings');
	}