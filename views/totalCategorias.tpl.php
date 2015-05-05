<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Total Problemas Resueltos</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/progressBar.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section>
		<fieldset class="datosUsuario">
			<legend>Datos de usuario</legend>
			<table id="datosUsuario">
			  <tr>
			    <td>Usuario:</td>
			    <td><strong class="usuario"><?= $usuarioCoj; ?></strong></td>
			  </tr>
			  <tr>
			    <td>Problemas totales resueltos:</td>
			    <td><strong class="personalResultados"><?= $totalRealizados; ?></strong></td>
			  </tr>
			</table>
		</fieldset>
		<div id="graficaPersonal">
		<fieldset>
			<legend>Clasificación de los problemas:</legend>
			<?= "<img src='graficarClasificacionProblemasPersonal?porcentajeAdHoc=$porcentajeAdHoc&porcentajeArithmeticAlgebra=$porcentajeArithmeticAlgebra&porcentajeBruteForce=$porcentajeBruteForce&porcentajeCombination=$porcentajeCombination&porcentajeDataStructures=$porcentajeDataStructures&porcentajeDynamicProgramming=$porcentajeDynamicProgramming&porcentajeGameTheory=$porcentajeGameTheory&porcentajeGeometry=$porcentajeGeometry&porcentajeGraphTheory=$porcentajeGraphTheory&porcentajeGreedy=$porcentajeGreedy&porcentajeNumberTheory=$porcentajeNumberTheory&porcentajeSortingSearching=$porcentajeSortingSearching&porcentajeStrings=$porcentajeStrings&usuarioCoj=$usuarioCoj' />";?> 
		</fieldset>
		</div>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/progressBar.js"></script>
</body>
</html>