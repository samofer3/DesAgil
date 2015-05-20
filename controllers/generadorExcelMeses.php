<?php
header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=AvanceMeses.xlsx");
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

if (!file_exists("excel/BaseMeses.xlsx")) {
	echo "error";
}else{
	require_once ('helpers.php');

	$nombres = getArrayNamesLastSixMonths();
	$usuario = $_GET["user"];
	$valor1 = $_GET["fecha0"];
	$valor2 = $_GET["fecha1"];
	$valor3 = $_GET["fecha2"];
	$valor4 = $_GET["fecha3"];
	$valor5 = $_GET["fecha4"];
	$valor6 = $_GET["fecha5"];
	
	
	// Create new PHPExcel object
	$objPHPExcel = PHPExcel_IOFactory::load("excel/BaseMeses.xlsx");
	// Set properties
	$objPHPExcel->getProperties()->setCreator("COJ-Data Extractor");
	$objPHPExcel->getProperties()->setLastModifiedBy($usuario);
	$objPHPExcel->getProperties()->setTitle("Avance últimos 6 meses");
	$objPHPExcel->getProperties()->setSubject("Extracción de datos COJ");
	$objPHPExcel->getProperties()->setDescription("Avance de número de problemas por mes.");
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0);

	$objPHPExcel->getActiveSheet()->SetCellValue("B3", $usuario);
	$objPHPExcel->getActiveSheet()->SetCellValue("C2", $nombres[5]);
	$objPHPExcel->getActiveSheet()->SetCellValue("D2", $nombres[4]);
	$objPHPExcel->getActiveSheet()->SetCellValue("E2", $nombres[3]);
	$objPHPExcel->getActiveSheet()->SetCellValue("F2", $nombres[2]);
	$objPHPExcel->getActiveSheet()->SetCellValue("G2", $nombres[1]);
	$objPHPExcel->getActiveSheet()->SetCellValue("H2", $nombres[0]);

	$objPHPExcel->getActiveSheet()->SetCellValue("C3", $valor6);
	$objPHPExcel->getActiveSheet()->SetCellValue("D3", $valor5);
	$objPHPExcel->getActiveSheet()->SetCellValue("E3", $valor4);
	$objPHPExcel->getActiveSheet()->SetCellValue("F3", $valor3);
	$objPHPExcel->getActiveSheet()->SetCellValue("G3", $valor2);
	$objPHPExcel->getActiveSheet()->SetCellValue("H3", $valor1);


// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Avance últimos 6 meses');

// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

// Echo done
	
}

