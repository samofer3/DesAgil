<?php
	include_once("php/sesion.php");
	$UsuarioCoj = $_SESSION["usuarioCoj"];
	$Usuario = $_SESSION["usuario"];
	view("home",compact('UsuarioCoj','Usuario'));