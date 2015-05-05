<?php
	include_once("php/simple_html_dom.php");
	include_once("php/sesion.php");

	$usuarioCoj 			= $_SESSION["usuarioCoj"];
	$totalRealizados 		= $_SESSION["totalRealizados"];
	$totalIntentados 		= $_SESSION["totalIntentados"];
	$totalProblemas 		= $_SESSION["totalProblemas"];
	$porcentajeRealizado 	= $_SESSION["porcentajeRealizado"];

	$usuarioClasificacion = getArrayPorcentajesClasificacionProblemas($usuarioCoj);
	$porcentajeAdHoc = $usuarioClasificacion["AdHoc"];
	$porcentajeArithmeticAlgebra = $usuarioClasificacion["ArithmeticAlgebra"];
	$porcentajeBruteForce = $usuarioClasificacion["BruteForce"];
	$porcentajeCombination = $usuarioClasificacion["Combination"];
	$porcentajeDataStructures = $usuarioClasificacion["DataStructures"];
	$porcentajeDynamicProgramming = $usuarioClasificacion["DynamicProgramming"];
	$porcentajeGameTheory = $usuarioClasificacion["GameTheory"];
	$porcentajeGeometry = $usuarioClasificacion["Geometry"];
	$porcentajeGraphTheory = $usuarioClasificacion["GraphTheory"];
	$porcentajeGreedy = $usuarioClasificacion["Greedy"];
	$porcentajeNumberTheory = $usuarioClasificacion["NumberTheory"];
	$porcentajeSortingSearching = $usuarioClasificacion["SortingSearching"];
	$porcentajeStrings = $usuarioClasificacion["Strings"];

	$total = $porcentajeAdHoc + $porcentajeArithmeticAlgebra + $porcentajeBruteForce + $porcentajeCombination + $porcentajeDataStructures + $porcentajeDynamicProgramming + $porcentajeGameTheory + $porcentajeGeometry + $porcentajeGraphTheory + $porcentajeGreedy + $porcentajeNumberTheory + $porcentajeSortingSearching + $porcentajeStrings;


	view("totalCategorias", compact('usuarioCoj','totalRealizados','porcentajeRealizado','porcentajeAdHoc','porcentajeArithmeticAlgebra','porcentajeBruteForce','porcentajeCombination','porcentajeDataStructures','porcentajeDynamicProgramming','porcentajeGameTheory','porcentajeGeometry','porcentajeGraphTheory','porcentajeGreedy','porcentajeNumberTheory','porcentajeSortingSearching','porcentajeStrings','total'));