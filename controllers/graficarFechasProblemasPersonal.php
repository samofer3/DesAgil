<?php
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph.php');
	require_once ('php/jpgraph-3.5.0b1/src/jpgraph_bar.php');
	require_once ('helpers.php');

	$nombres = getArrayNamesLastSixMonths();
	$usuario = $_GET["user"];
	$valor1 = $_GET["fecha0"];
	$valor2 = $_GET["fecha1"];
	$valor3 = $_GET["fecha2"];
	$valor4 = $_GET["fecha3"];
	$valor5 = $_GET["fecha4"];
	$valor6 = $_GET["fecha5"];

	// Some data
	$databary=array($valor6,$valor5,$valor4,$valor3,$valor2,$valor1);

	// New graph with a drop shadow
	$graph = new Graph(1200,400,'auto');
	$graph->SetShadow();
	$graph->img->SetMargin(40,30,20,40);
	// Use a "text" X-scale
	$graph->SetScale("textlin");
	// Set title and subtitle
	$graph->title->Set("Escala de tiempo");
	// Use built in font
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(5,15,25,35,45,55,65,75,85,95));
	$graph->xaxis->SetTickLabels(array($nombres[5],$nombres[4],$nombres[3],$nombres[2],$nombres[1],$nombres[0]));
	// Create the bar plot
	$b1 = new BarPlot($databary);
	$b1->SetLegend($usuario);
	$b1->SetAbsWidth(60);
	//$b1->SetShadow();
	// The order the plots are added determines who's ontop
	$graph->Add($b1);
	$b1->value->Show();
	$b1->value->SetFormat('%d');
	$b1->SetValuePos('center');
	// Finally output the  image
	$graph->Stroke();

?>