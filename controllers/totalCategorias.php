<?php
	include_once("php/simple_html_dom.php");
	include_once("php/sesion.php");

	$usuarioCoj 			= $_SESSION["usuarioCoj"];
	$totalRealizados 		= $_SESSION["totalRealizados"];
	$totalIntentados 		= $_SESSION["totalIntentados"];
	$totalProblemas 		= $_SESSION["totalProblemas"];
	$porcentajeRealizado 	= $_SESSION["porcentajeRealizado"];

	$problemasUsuario = getArrayProblemasUser($usuarioCoj);
	extract(getArraysProblemasDB());

	$usuarioClasificacion = array();
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

	$porcentajeAdHoc = round(($usuarioClasificacion["AdHoc"]*100)/sizeof($AdHoc),2);
	$porcentajeArithmeticAlgebra = round(($usuarioClasificacion["ArithmeticAlgebra"]*100)/sizeof($ArithmeticAlgebra),2);
	$porcentajeBruteForce = round(($usuarioClasificacion["BruteForce"]*100)/sizeof($BruteForce),2);
	$porcentajeCombination = round(($usuarioClasificacion["Combination"]*100)/sizeof($Combination),2);
	$porcentajeDataStructures = round(($usuarioClasificacion["DataStructures"]*100)/sizeof($DataStructures),2);
	$porcentajeDynamicProgramming = round(($usuarioClasificacion["DynamicProgramming"]*100)/sizeof($DynamicProgramming),2);
	$porcentajeGameTheory = round(($usuarioClasificacion["GameTheory"]*100)/sizeof($GameTheory),2);
	$porcentajeGeometry = round(($usuarioClasificacion["Geometry"]*100)/sizeof($Geometry),2);
	$porcentajeGraphTheory = round(($usuarioClasificacion["GraphTheory"]*100)/sizeof($GraphTheory),2);
	$porcentajeGreedy = round(($usuarioClasificacion["Greedy"]*100)/sizeof($Greedy),2);
	$porcentajeNumberTheory = round(($usuarioClasificacion["NumberTheory"]*100)/sizeof($NumberTheory),2);
	$porcentajeSortingSearching = round(($usuarioClasificacion["SortingSearching"]*100)/sizeof($SortingSearching),2);
	$porcentajeStrings = round(($usuarioClasificacion["Strings"]*100)/sizeof($Strings),2);

	$total = $porcentajeAdHoc + $porcentajeArithmeticAlgebra + $porcentajeBruteForce + $porcentajeCombination + $porcentajeDataStructures + $porcentajeDynamicProgramming + $porcentajeGameTheory + $porcentajeGeometry + $porcentajeGraphTheory + $porcentajeGreedy + $porcentajeNumberTheory + $porcentajeSortingSearching + $porcentajeStrings;


	view("totalCategorias", compact('usuarioCoj','totalRealizados','porcentajeRealizado','porcentajeAdHoc','porcentajeArithmeticAlgebra','porcentajeBruteForce','porcentajeCombination','porcentajeDataStructures','porcentajeDynamicProgramming','porcentajeGameTheory','porcentajeGeometry','porcentajeGraphTheory','porcentajeGreedy','porcentajeNumberTheory','porcentajeSortingSearching','porcentajeStrings','total'));