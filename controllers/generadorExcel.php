<?php
header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Comparacion.xlsx");
header("Pragma: no-cache");
header("Expires: 0");

/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
ini_set('include_path', ini_get('include_path').';php/phpExcel/');

/** PHPExcel */
include 'PHPExcel.php';
include 'PHPExcel/Writer/Excel2007.php';
include 'PHPExcel/IOFactory.php';

if (!file_exists("excel/Base.xlsx")) {
	echo "error";
}else{
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
	
	// Create new PHPExcel object
	$objPHPExcel = PHPExcel_IOFactory::load("excel/Base.xlsx");
	// Set properties
	$objPHPExcel->getProperties()->setCreator("COJ-Data Extractor");
	$objPHPExcel->getProperties()->setLastModifiedBy($usuarioCoj);
	$objPHPExcel->getProperties()->setTitle("Comparar problemas de usuarios por categorías");
	$objPHPExcel->getProperties()->setSubject("Extracción de datos COJ");
	$objPHPExcel->getProperties()->setDescription("Grafica comparativa de porcentajes de usuarios respecto a cada una de las categorías.");
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0);
	$contadorCelda = 3;



	$objPHPExcel->getActiveSheet()->SetCellValue("B$contadorCelda", $usuarioCoj);
	$objPHPExcel->getActiveSheet()->SetCellValue("C$contadorCelda", $porcentajeAdHoc);
	$objPHPExcel->getActiveSheet()->SetCellValue("D$contadorCelda", $porcentajeArithmeticAlgebra);
	$objPHPExcel->getActiveSheet()->SetCellValue("E$contadorCelda", $porcentajeBruteForce);
	$objPHPExcel->getActiveSheet()->SetCellValue("F$contadorCelda", $porcentajeCombination);
	$objPHPExcel->getActiveSheet()->SetCellValue("G$contadorCelda", $porcentajeDataStructures);
	$objPHPExcel->getActiveSheet()->SetCellValue("H$contadorCelda", $porcentajeDynamicProgramming);
	$objPHPExcel->getActiveSheet()->SetCellValue("I$contadorCelda", $porcentajeGameTheory);
	$objPHPExcel->getActiveSheet()->SetCellValue("J$contadorCelda", $porcentajeGeometry);
	$objPHPExcel->getActiveSheet()->SetCellValue("K$contadorCelda", $porcentajeGraphTheory);
	$objPHPExcel->getActiveSheet()->SetCellValue("L$contadorCelda", $porcentajeGreedy);
	$objPHPExcel->getActiveSheet()->SetCellValue("M$contadorCelda", $porcentajeNumberTheory);
	$objPHPExcel->getActiveSheet()->SetCellValue("N$contadorCelda", $porcentajeSortingSearching);
	$objPHPExcel->getActiveSheet()->SetCellValue("O$contadorCelda", $porcentajeStrings);
	$contadorCelda++;

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

		$objPHPExcel->getActiveSheet()->SetCellValue("B$contadorCelda", $usuarioCoj);
		$objPHPExcel->getActiveSheet()->SetCellValue("C$contadorCelda", $porcentajeAdHoc);
		$objPHPExcel->getActiveSheet()->SetCellValue("D$contadorCelda", $porcentajeArithmeticAlgebra);
		$objPHPExcel->getActiveSheet()->SetCellValue("E$contadorCelda", $porcentajeBruteForce);
		$objPHPExcel->getActiveSheet()->SetCellValue("F$contadorCelda", $porcentajeCombination);
		$objPHPExcel->getActiveSheet()->SetCellValue("G$contadorCelda", $porcentajeDataStructures);
		$objPHPExcel->getActiveSheet()->SetCellValue("H$contadorCelda", $porcentajeDynamicProgramming);
		$objPHPExcel->getActiveSheet()->SetCellValue("I$contadorCelda", $porcentajeGameTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("J$contadorCelda", $porcentajeGeometry);
		$objPHPExcel->getActiveSheet()->SetCellValue("K$contadorCelda", $porcentajeGraphTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("L$contadorCelda", $porcentajeGreedy);
		$objPHPExcel->getActiveSheet()->SetCellValue("M$contadorCelda", $porcentajeNumberTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("N$contadorCelda", $porcentajeSortingSearching);
		$objPHPExcel->getActiveSheet()->SetCellValue("O$contadorCelda", $porcentajeStrings);
		$contadorCelda++;
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
		
		$objPHPExcel->getActiveSheet()->SetCellValue("B$contadorCelda", $usuarioCoj);
		$objPHPExcel->getActiveSheet()->SetCellValue("C$contadorCelda", $porcentajeAdHoc);
		$objPHPExcel->getActiveSheet()->SetCellValue("D$contadorCelda", $porcentajeArithmeticAlgebra);
		$objPHPExcel->getActiveSheet()->SetCellValue("E$contadorCelda", $porcentajeBruteForce);
		$objPHPExcel->getActiveSheet()->SetCellValue("F$contadorCelda", $porcentajeCombination);
		$objPHPExcel->getActiveSheet()->SetCellValue("G$contadorCelda", $porcentajeDataStructures);
		$objPHPExcel->getActiveSheet()->SetCellValue("H$contadorCelda", $porcentajeDynamicProgramming);
		$objPHPExcel->getActiveSheet()->SetCellValue("I$contadorCelda", $porcentajeGameTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("J$contadorCelda", $porcentajeGeometry);
		$objPHPExcel->getActiveSheet()->SetCellValue("K$contadorCelda", $porcentajeGraphTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("L$contadorCelda", $porcentajeGreedy);
		$objPHPExcel->getActiveSheet()->SetCellValue("M$contadorCelda", $porcentajeNumberTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("N$contadorCelda", $porcentajeSortingSearching);
		$objPHPExcel->getActiveSheet()->SetCellValue("O$contadorCelda", $porcentajeStrings);
		$contadorCelda++;
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
		
		$objPHPExcel->getActiveSheet()->SetCellValue("B$contadorCelda", $usuarioCoj);
		$objPHPExcel->getActiveSheet()->SetCellValue("C$contadorCelda", $porcentajeAdHoc);
		$objPHPExcel->getActiveSheet()->SetCellValue("D$contadorCelda", $porcentajeArithmeticAlgebra);
		$objPHPExcel->getActiveSheet()->SetCellValue("E$contadorCelda", $porcentajeBruteForce);
		$objPHPExcel->getActiveSheet()->SetCellValue("F$contadorCelda", $porcentajeCombination);
		$objPHPExcel->getActiveSheet()->SetCellValue("G$contadorCelda", $porcentajeDataStructures);
		$objPHPExcel->getActiveSheet()->SetCellValue("H$contadorCelda", $porcentajeDynamicProgramming);
		$objPHPExcel->getActiveSheet()->SetCellValue("I$contadorCelda", $porcentajeGameTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("J$contadorCelda", $porcentajeGeometry);
		$objPHPExcel->getActiveSheet()->SetCellValue("K$contadorCelda", $porcentajeGraphTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("L$contadorCelda", $porcentajeGreedy);
		$objPHPExcel->getActiveSheet()->SetCellValue("M$contadorCelda", $porcentajeNumberTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("N$contadorCelda", $porcentajeSortingSearching);
		$objPHPExcel->getActiveSheet()->SetCellValue("O$contadorCelda", $porcentajeStrings);
		$contadorCelda++;
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
		
		$objPHPExcel->getActiveSheet()->SetCellValue("B$contadorCelda", $usuarioCoj);
		$objPHPExcel->getActiveSheet()->SetCellValue("C$contadorCelda", $porcentajeAdHoc);
		$objPHPExcel->getActiveSheet()->SetCellValue("D$contadorCelda", $porcentajeArithmeticAlgebra);
		$objPHPExcel->getActiveSheet()->SetCellValue("E$contadorCelda", $porcentajeBruteForce);
		$objPHPExcel->getActiveSheet()->SetCellValue("F$contadorCelda", $porcentajeCombination);
		$objPHPExcel->getActiveSheet()->SetCellValue("G$contadorCelda", $porcentajeDataStructures);
		$objPHPExcel->getActiveSheet()->SetCellValue("H$contadorCelda", $porcentajeDynamicProgramming);
		$objPHPExcel->getActiveSheet()->SetCellValue("I$contadorCelda", $porcentajeGameTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("J$contadorCelda", $porcentajeGeometry);
		$objPHPExcel->getActiveSheet()->SetCellValue("K$contadorCelda", $porcentajeGraphTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("L$contadorCelda", $porcentajeGreedy);
		$objPHPExcel->getActiveSheet()->SetCellValue("M$contadorCelda", $porcentajeNumberTheory);
		$objPHPExcel->getActiveSheet()->SetCellValue("N$contadorCelda", $porcentajeSortingSearching);
		$objPHPExcel->getActiveSheet()->SetCellValue("O$contadorCelda", $porcentajeStrings);
		$contadorCelda++;
	}

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Comparación');

// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

// Echo done
	
}

