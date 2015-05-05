<?php
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph.php');
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph_bar.php');
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph_line.php');

	$usuarioCoj = $_GET["usuarioCoj"];
	$porcentajeAdHoc = $_GET["porcentajeAdHoc"];
	$porcentajeArithmeticAlgebra = $_GET["porcentajeArithmeticAlgebra"];
	$porcentajeBruteForce = $_GET["porcentajeBruteForce"];
	$porcentajeCombination = $_GET["porcentajeCombination"];
	$porcentajeDataStructures = $_GET["porcentajeDataStructures"];
	$porcentajeDynamicProgramming = $_GET["porcentajeDynamicProgramming"];
	$porcentajeGameTheory = $_GET["porcentajeGameTheory"];
	$porcentajeGeometry = $_GET["porcentajeGeometry"];
	$porcentajeGraphTheory = $_GET["porcentajeGraphTheory"];
	$porcentajeGreedy = $_GET["porcentajeGreedy"];
	$porcentajeNumberTheory = $_GET["porcentajeNumberTheory"];
	$porcentajeSortingSearching = $_GET["porcentajeSortingSearching"];
	$porcentajeStrings = $_GET["porcentajeStrings"];
	//porcentajes del primer user
	$datay1=array($porcentajeAdHoc,$porcentajeArithmeticAlgebra,$porcentajeBruteForce,$porcentajeCombination,$porcentajeDataStructures,$porcentajeDynamicProgramming,$porcentajeGameTheory,$porcentajeGeometry,$porcentajeGraphTheory,$porcentajeGreedy,$porcentajeNumberTheory,$porcentajeSortingSearching,$porcentajeStrings);

	// configuraciones de grafica
	$graph = new Graph(1250,320,'auto');
	$graph->SetScale("textlin",0,100);
	$graph->ygrid->Show(true,true);
	$graph->xgrid->Show(true,false);

	$graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(5,15,25,35,45,55,65,75,85,95));
	$graph->SetBox(false);

	// Nombre de las categorias
	$graph->xaxis->SetTickLabels(array("Ad-Hoc","Arithmetic-Algebra","Brute Force","Combination","Data Structures","Dynamic Program","Game Theory","Geometry","Graph Theory","Greedy","Number Theory","Sor-Searching","Strings"));

	//Cuadro del los usuarios
	$graph->legend->SetColor('#4E4E4E','#00A78A');

	//titulo de la grafica
	$graph->title->Set("Grafica personal de porcentajes respecto a cada una de las categorías");


	// Create the first line
	$p1 = new LinePlot($datay1);
	$graph->Add($p1);
	$p1->SetColor("#6495ED");
	$p1->SetLegend($usuarioCoj);

	// Output line
	$graph->Stroke();

?>