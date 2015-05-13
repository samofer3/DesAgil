<?php
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph.php');
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph_bar.php');
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph_line.php');


	// configuraciones de grafica
	$graph = new Graph(1250,320,'auto');
	$graph->SetScale("textlin");
	$graph->ygrid->Show(true,true);
	$graph->xgrid->Show(true,false);

	$graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(5,15,25,35,45,55,65,75,85,95));
	$graph->SetBox(false);

	// Nombre de las categorias
	$graph->xaxis->SetTickLabels(array("Ad-Hoc","Arithmetic-Algebra","Brute Force","Combination","Data Structures","Dynamic Program","Game Theory","Geometry","Graph Theory","Greedy","Number Theory","Sor-Searching","Strings"));

	//Cuadro del los usuarios
	$graph->legend->SetColor('#4E4E4E','#00A78A');

	//titulo de la grafica
	$graph->title->Set("Grafica comparativa de porcentajes respecto a cada una de las categorías");


	$usuarioCoj = $_GET["upName"];
	$porcentajeAdHoc = $_GET["upAdH"];
	$porcentajeArithmeticAlgebra = $_GET["upAri"];
	$porcentajeBruteForce = $_GET["upBru"];
	$porcentajeCombination = $_GET["upCom"];
	$porcentajeDataStructures = $_GET["upDat"];
	$porcentajeDynamicProgramming = $_GET["upDyn"];
	$porcentajeGameTheory = $_GET["upGam"];
	$porcentajeGeometry = $_GET["upGeo"];
	$porcentajeGraphTheory = $_GET["upGra"];
	$porcentajeGreedy = $_GET["upGre"];
	$porcentajeNumberTheory = $_GET["upNum"];
	$porcentajeSortingSearching = $_GET["upSor"];
	$porcentajeStrings = $_GET["upStr"];
	//porcentajes del usuario propio
	$datay1=array($porcentajeAdHoc,$porcentajeArithmeticAlgebra,$porcentajeBruteForce,$porcentajeCombination,$porcentajeDataStructures,$porcentajeDynamicProgramming,$porcentajeGameTheory,$porcentajeGeometry,$porcentajeGraphTheory,$porcentajeGreedy,$porcentajeNumberTheory,$porcentajeSortingSearching,$porcentajeStrings);
	// Create the first line
	$p1 = new LinePlot($datay1);
	$graph->Add($p1);
	$p1->value->Show();
	$p1->value->SetFont(FF_ARIAL,FS_BOLD,8);
	$p1->value->SetAngle(45);
	$p1->value->SetColor("#6495ED","darkred"); 
	$p1->SetColor("#6495ED");
	$p1->SetLegend($usuarioCoj);

	if (isset($_GET["uiName"])) {
		$usuarioCoj = $_GET["uiName"];
		$porcentajeAdHoc = $_GET["uiAdH"];
		$porcentajeArithmeticAlgebra = $_GET["uiAri"];
		$porcentajeBruteForce = $_GET["uiBru"];
		$porcentajeCombination = $_GET["uiCom"];
		$porcentajeDataStructures = $_GET["uiDat"];
		$porcentajeDynamicProgramming = $_GET["uiDyn"];
		$porcentajeGameTheory = $_GET["uiGam"];
		$porcentajeGeometry = $_GET["uiGeo"];
		$porcentajeGraphTheory = $_GET["uiGra"];
		$porcentajeGreedy = $_GET["uiGre"];
		$porcentajeNumberTheory = $_GET["uiNum"];
		$porcentajeSortingSearching = $_GET["uiSor"];
		$porcentajeStrings = $_GET["uiStr"];
		
		$datay2=array($porcentajeAdHoc,$porcentajeArithmeticAlgebra,$porcentajeBruteForce,$porcentajeCombination,$porcentajeDataStructures,$porcentajeDynamicProgramming,$porcentajeGameTheory,$porcentajeGeometry,$porcentajeGraphTheory,$porcentajeGreedy,$porcentajeNumberTheory,$porcentajeSortingSearching,$porcentajeStrings);
		// Create the first line
		$p2 = new LinePlot($datay2);
		$graph->Add($p2);
		$p2->value->Show();
		$p2->value->SetFont(FF_ARIAL,FS_BOLD,8);
		$p2->value->SetAngle(45);
		$p2->value->SetColor("#649500","darkred");
		$p2->SetColor("#649500");
		$p2->SetLegend($usuarioCoj);
	}

	if (isset($_GET["ugName"])) {
		$usuarioCoj = $_GET["ugName"];
		$porcentajeAdHoc = $_GET["ugAdH"];
		$porcentajeArithmeticAlgebra = $_GET["ugAri"];
		$porcentajeBruteForce = $_GET["ugBru"];
		$porcentajeCombination = $_GET["ugCom"];
		$porcentajeDataStructures = $_GET["ugDat"];
		$porcentajeDynamicProgramming = $_GET["ugDyn"];
		$porcentajeGameTheory = $_GET["ugGam"];
		$porcentajeGeometry = $_GET["ugGeo"];
		$porcentajeGraphTheory = $_GET["ugGra"];
		$porcentajeGreedy = $_GET["ugGre"];
		$porcentajeNumberTheory = $_GET["ugNum"];
		$porcentajeSortingSearching = $_GET["ugSor"];
		$porcentajeStrings = $_GET["ugStr"];
		
		$datay3=array($porcentajeAdHoc,$porcentajeArithmeticAlgebra,$porcentajeBruteForce,$porcentajeCombination,$porcentajeDataStructures,$porcentajeDynamicProgramming,$porcentajeGameTheory,$porcentajeGeometry,$porcentajeGraphTheory,$porcentajeGreedy,$porcentajeNumberTheory,$porcentajeSortingSearching,$porcentajeStrings);
		// Create the first line
		$p3 = new LinePlot($datay3);
		$graph->Add($p3);
		$p3->value->Show();
		$p3->value->SetFont(FF_ARIAL,FS_BOLD,8);
		$p3->value->SetAngle(45);
		$p3->value->SetColor("#640000","darkred");
		$p3->SetColor("#640000");
		$p3->SetLegend($usuarioCoj);
	}

	if (isset($_GET["u1Name"])) {
		$usuarioCoj = $_GET["u1Name"];
		$porcentajeAdHoc = $_GET["u1AdH"];
		$porcentajeArithmeticAlgebra = $_GET["u1Ari"];
		$porcentajeBruteForce = $_GET["u1Bru"];
		$porcentajeCombination = $_GET["u1Com"];
		$porcentajeDataStructures = $_GET["u1Dat"];
		$porcentajeDynamicProgramming = $_GET["u1Dyn"];
		$porcentajeGameTheory = $_GET["u1Gam"];
		$porcentajeGeometry = $_GET["u1Geo"];
		$porcentajeGraphTheory = $_GET["u1Gra"];
		$porcentajeGreedy = $_GET["u1Gre"];
		$porcentajeNumberTheory = $_GET["u1Num"];
		$porcentajeSortingSearching = $_GET["u1Sor"];
		$porcentajeStrings = $_GET["u1Str"];
		
		$datay4=array($porcentajeAdHoc,$porcentajeArithmeticAlgebra,$porcentajeBruteForce,$porcentajeCombination,$porcentajeDataStructures,$porcentajeDynamicProgramming,$porcentajeGameTheory,$porcentajeGeometry,$porcentajeGraphTheory,$porcentajeGreedy,$porcentajeNumberTheory,$porcentajeSortingSearching,$porcentajeStrings);
		// Create the first line
		$p4 = new LinePlot($datay4);
		$graph->Add($p4);
		$p4->value->Show();
		$p4->value->SetFont(FF_ARIAL,FS_BOLD,8);
		$p4->value->SetAngle(45);
		$p4->value->SetColor("#6400EE","darkred");
		$p4->SetColor("#6400EE");
		$p4->SetLegend($usuarioCoj);
	}

	if (isset($_GET["u2Name"])) {
		$usuarioCoj = $_GET["u2Name"];
		$porcentajeAdHoc = $_GET["u2AdH"];
		$porcentajeArithmeticAlgebra = $_GET["u2Ari"];
		$porcentajeBruteForce = $_GET["u2Bru"];
		$porcentajeCombination = $_GET["u2Com"];
		$porcentajeDataStructures = $_GET["u2Dat"];
		$porcentajeDynamicProgramming = $_GET["u2Dyn"];
		$porcentajeGameTheory = $_GET["u2Gam"];
		$porcentajeGeometry = $_GET["u2Geo"];
		$porcentajeGraphTheory = $_GET["u2Gra"];
		$porcentajeGreedy = $_GET["u2Gre"];
		$porcentajeNumberTheory = $_GET["u2Num"];
		$porcentajeSortingSearching = $_GET["u2Sor"];
		$porcentajeStrings = $_GET["u2Str"];
		
		$datay5=array($porcentajeAdHoc,$porcentajeArithmeticAlgebra,$porcentajeBruteForce,$porcentajeCombination,$porcentajeDataStructures,$porcentajeDynamicProgramming,$porcentajeGameTheory,$porcentajeGeometry,$porcentajeGraphTheory,$porcentajeGreedy,$porcentajeNumberTheory,$porcentajeSortingSearching,$porcentajeStrings);
		// Create the first line
		$p5 = new LinePlot($datay5);
		$graph->Add($p5);
		$p5->value->Show();
		$p5->value->SetFont(FF_ARIAL,FS_BOLD,8);
		$p5->value->SetAngle(45);
		$p5->value->SetColor("#EE00EE","darkred");
		$p5->SetColor("#EE00EE");
		$p5->SetLegend($usuarioCoj);
	}

	// Output line
	$graph->Stroke();

?>