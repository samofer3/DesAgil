<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar categorías</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section class="center">
		<fieldset class="fieldsetEliminar">
			<legend>Actualizar categorías</legend>
			<p class="justify">Aquí podrás actualizar la información almacenada de los problemas según su categoría, selecciona el que desees actualizar de la lista y espera a que el proceso termine.</p>
			<p><a href="?id=25" id="cargarProblemasCojADH" class="activeLoginALink">Ad-Hoc</a></br>
			<a href="?id=1" id="cargarProblemasCojARI" class="activeLoginALink">Arithmetic-Algebra</a></br>
			<a href="?id=2" id="cargarProblemasCojBRU" class="activeLoginALink">Brute Force</a></br>
			<a href="?id=3" id="cargarProblemasCojCOM" class="activeLoginALink">Combination</a></br>
			<a href="?id=4" id="cargarProblemasCojDAT" class="activeLoginALink">Data Structures</a></br>
			<a href="?id=5" id="cargarProblemasCojDYN" class="activeLoginALink">Dynamic Programming</a></br>
			<a href="?id=6" id="cargarProblemasCojGAM" class="activeLoginALink">Game Theory</a></br>
			<a href="?id=7" id="cargarProblemasCojGEO" class="activeLoginALink">Geometry</a></br>
			<a href="?id=23" id="cargarProblemasCojGRA" class="activeLoginALink">Graph Theory</a></br>
			<a href="?id=8" id="cargarProblemasCojGRE" class="activeLoginALink">Greedy</a></br>
			<a href="?id=9" id="cargarProblemasCojNUM" class="activeLoginALink">Number Theory</a></br>
			<a href="?id=10" id="cargarProblemasCojSOR" class="activeLoginALink">Sorting-Searching</a></br>
			<a href="?id=24" id="cargarProblemasCojSTR" class="activeLoginALink">Strings</a></br></p>
			<div id="mensaje"></div>
			<div id="elemento"></div>
		</fieldset>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/funcionesAjax.js"></script>
	<script src="js/jquery.timer.js"></script>
</body>
</html>