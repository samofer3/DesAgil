<?php

/*
	$confidencial = "Muy confidencial";
	$language = "PHP";
	$titulo = "PruebaPHP";

	//compact("language","titulo")
*/
	session_start();
	session_destroy();
	view("index");