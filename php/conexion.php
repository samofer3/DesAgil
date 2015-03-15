<?php 

	function conectarse()
	{
		$servidor ="localhost";
		$usuario="root";
		$password="root";
		$bd="cojdb";

		$conectar = new mysqli($servidor,$usuario,$password,$bd);
		return $conectar;
	}

	$conexion = conectarse();
?>