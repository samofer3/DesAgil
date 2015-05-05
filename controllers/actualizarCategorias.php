<?php
	include_once("php/sesion.php");

	extract(getFechasProblemasDB());
	view('actualizarCategorias',compact('AdHocFecha','ArithmeticAlgebraFecha','BruteForceFecha','CombinationFecha','DataStructuresFecha','DynamicProgrammingFecha','GameTheoryFecha','GeometryFecha','GraphTheoryFecha','GreedyFecha','NumberTheoryFecha','SortingSearchingFecha','StringsFecha'));