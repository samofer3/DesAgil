<?php
	include_once("php/sesion.php");
	$classFieldset = "displayNone";
	$usuarioPropio = $_SESSION["usuarioCoj"];
	$nombresItver = $_SESSION["itver30"];
	$nombresGlobal = $_SESSION["global30"];
	$nombresMexico = $_SESSION["mexico30"];
	$opcionesItver = converterArrayToSelect($nombresItver, $usuarioPropio);
	$opcionesGlobal = converterArrayToSelect($nombresGlobal, $usuarioPropio);
	$opcionesGlobal.= converterArrayToSelect($nombresMexico, $usuarioPropio, "<option value=''>---- MÉXICO ----</option>");

	

	if (isset($_POST["usuarioACompararItver_slc"])) {
		$classFieldset = "displayBlock";
		$usuarioItver = $_POST["usuarioACompararItver_slc"];
		$usuarioGlobal = $_POST["usuarioACompararGlobal_slc"];
		$usuario1 = $_POST["usuarioAComparar1_txt"];
		$usuario2 = $_POST["usuarioAComparar2_txt"];
		$link = "";
		$porcentajes = getArrayPorcentajesClasificacionProblemas($usuarioPropio);
		$up = array();
		$up["AdH"] = $porcentajes["AdHoc"];
		$up["Ari"] = $porcentajes["ArithmeticAlgebra"];
		$up["Bru"] = $porcentajes["BruteForce"];
		$up["Com"] = $porcentajes["Combination"];
		$up["Dat"] = $porcentajes["DataStructures"];
		$up["Dyn"] = $porcentajes["DynamicProgramming"];
		$up["Gam"] = $porcentajes["GameTheory"];
		$up["Geo"] = $porcentajes["Geometry"];
		$up["Gra"] = $porcentajes["GraphTheory"];
		$up["Gre"] = $porcentajes["Greedy"];
		$up["Num"] = $porcentajes["NumberTheory"];
		$up["Sor"] = $porcentajes["SortingSearching"];
		$up["Str"] = $porcentajes["Strings"];
		$up["name"] = $usuarioPropio;

		$link.= '?upName='.$up["name"].'&upAri='.$up["Ari"].'&upBru='.$up["Bru"].'&upCom='.$up["Com"].'&upDat='.$up["Dat"].'&upDyn='.$up["Dyn"].'&upGam='.$up["Gam"].'&upGeo='.$up["Geo"].'&upGra='.$up["Gra"].'&upGre='.$up["Gre"].'&upNum='.$up["Num"].'&upSor='.$up["Sor"].'&upStr='.$up["Str"].'&upAdH='.$up["AdH"];
		
		

		if ($usuarioItver != "") {
			$porcentajes = getArrayPorcentajesClasificacionProblemas($usuarioItver);
			if (!isset($porcentajes["noExiste"])) {
				$ui = array();
				$ui["AdH"] = $porcentajes["AdHoc"];
				$ui["Ari"] = $porcentajes["ArithmeticAlgebra"];
				$ui["Bru"] = $porcentajes["BruteForce"];
				$ui["Com"] = $porcentajes["Combination"];
				$ui["Dat"] = $porcentajes["DataStructures"];
				$ui["Dyn"] = $porcentajes["DynamicProgramming"];
				$ui["Gam"] = $porcentajes["GameTheory"];
				$ui["Geo"] = $porcentajes["Geometry"];
				$ui["Gra"] = $porcentajes["GraphTheory"];
				$ui["Gre"] = $porcentajes["Greedy"];
				$ui["Num"] = $porcentajes["NumberTheory"];
				$ui["Sor"] = $porcentajes["SortingSearching"];
				$ui["Str"] = $porcentajes["Strings"];
				$ui["name"] = $usuarioItver;

				$link.= '&uiName='.$ui["name"].'&uiAdH='.$ui["AdH"].'&uiAri='.$ui["Ari"].'&uiBru='.$ui["Bru"].'&uiCom='.$ui["Com"].'&uiDat='.$ui["Dat"].'&uiDyn='.$ui["Dyn"].'&uiGam='.$ui["Gam"].'&uiGeo='.$ui["Geo"].'&uiGra='.$ui["Gra"].'&uiGre='.$ui["Gre"].'&uiNum='.$ui["Num"].'&uiSor='.$ui["Sor"].'&uiStr='.$ui["Str"];
			}
		}

		if ($usuarioGlobal != "") {
			$porcentajes = getArrayPorcentajesClasificacionProblemas($usuarioGlobal);
			if (!isset($porcentajes["noExiste"])) {
				$ug = array();
				$ug["AdH"] = $porcentajes["AdHoc"];
				$ug["Ari"] = $porcentajes["ArithmeticAlgebra"];
				$ug["Bru"] = $porcentajes["BruteForce"];
				$ug["Com"] = $porcentajes["Combination"];
				$ug["Dat"] = $porcentajes["DataStructures"];
				$ug["Dyn"] = $porcentajes["DynamicProgramming"];
				$ug["Gam"] = $porcentajes["GameTheory"];
				$ug["Geo"] = $porcentajes["Geometry"];
				$ug["Gra"] = $porcentajes["GraphTheory"];
				$ug["Gre"] = $porcentajes["Greedy"];
				$ug["Num"] = $porcentajes["NumberTheory"];
				$ug["Sor"] = $porcentajes["SortingSearching"];
				$ug["Str"] = $porcentajes["Strings"];
				$ug["name"] = $usuarioGlobal;

				$link.= '&ugName='.$ug["name"].'&ugAdH='.$ug["AdH"].'&ugAri='.$ug["Ari"].'&ugBru='.$ug["Bru"].'&ugCom='.$ug["Com"].'&ugDat='.$ug["Dat"].'&ugDyn='.$ug["Dyn"].'&ugGam='.$ug["Gam"].'&ugGeo='.$ug["Geo"].'&ugGra='.$ug["Gra"].'&ugGre='.$ug["Gre"].'&ugNum='.$ug["Num"].'&ugSor='.$ug["Sor"].'&ugStr='.$ug["Str"];
			}
		}

		if ($usuario1 != "") {
			$porcentajes = getArrayPorcentajesClasificacionProblemas($usuario1);
			if (!isset($porcentajes["noExiste"])) {
				$u1 = array();
				$u1["AdH"] = $porcentajes["AdHoc"];
				$u1["Ari"] = $porcentajes["ArithmeticAlgebra"];
				$u1["Bru"] = $porcentajes["BruteForce"];
				$u1["Com"] = $porcentajes["Combination"];
				$u1["Dat"] = $porcentajes["DataStructures"];
				$u1["Dyn"] = $porcentajes["DynamicProgramming"];
				$u1["Gam"] = $porcentajes["GameTheory"];
				$u1["Geo"] = $porcentajes["Geometry"];
				$u1["Gra"] = $porcentajes["GraphTheory"];
				$u1["Gre"] = $porcentajes["Greedy"];
				$u1["Num"] = $porcentajes["NumberTheory"];
				$u1["Sor"] = $porcentajes["SortingSearching"];
				$u1["Str"] = $porcentajes["Strings"];
				$u1["name"] = $usuario1;

				$link.= '&u1Name='.$u1["name"].'&u1AdH='.$u1["AdH"].'&u1Ari='.$u1["Ari"].'&u1Bru='.$u1["Bru"].'&u1Com='.$u1["Com"].'&u1Dat='.$u1["Dat"].'&u1Dyn='.$u1["Dyn"].'&u1Gam='.$u1["Gam"].'&u1Geo='.$u1["Geo"].'&u1Gra='.$u1["Gra"].'&u1Gre='.$u1["Gre"].'&u1Num='.$u1["Num"].'&u1Sor='.$u1["Sor"].'&u1Str='.$u1["Str"];
			}
		}

		if ($usuario2 != "") {
			$porcentajes = getArrayPorcentajesClasificacionProblemas($usuario2);
			if (!isset($porcentajes["noExiste"])) {
				$u2 = array();
				$u2["AdH"] = $porcentajes["AdHoc"];
				$u2["Ari"] = $porcentajes["ArithmeticAlgebra"];
				$u2["Bru"] = $porcentajes["BruteForce"];
				$u2["Com"] = $porcentajes["Combination"];
				$u2["Dat"] = $porcentajes["DataStructures"];
				$u2["Dyn"] = $porcentajes["DynamicProgramming"];
				$u2["Gam"] = $porcentajes["GameTheory"];
				$u2["Geo"] = $porcentajes["Geometry"];
				$u2["Gra"] = $porcentajes["GraphTheory"];
				$u2["Gre"] = $porcentajes["Greedy"];
				$u2["Num"] = $porcentajes["NumberTheory"];
				$u2["Sor"] = $porcentajes["SortingSearching"];
				$u2["Str"] = $porcentajes["Strings"];
				$u2["name"] = $usuario2;

				$link.= '&u2Name='.$u2["name"].'&u2AdH='.$u2["AdH"].'&u2Ari='.$u2["Ari"].'&u2Bru='.$u2["Bru"].'&u2Com='.$u2["Com"].'&u2Dat='.$u2["Dat"].'&u2Dyn='.$u2["Dyn"].'&u2Gam='.$u2["Gam"].'&u2Geo='.$u2["Geo"].'&u2Gra='.$u2["Gra"].'&u2Gre='.$u2["Gre"].'&u2Num='.$u2["Num"].'&u2Sor='.$u2["Sor"].'&u2Str='.$u2["Str"];
			}
		}

		extract(getArraysProblemasDB());
	
		$AdHoc = sizeof($AdHoc);
		$ArithmeticAlgebra = sizeof($ArithmeticAlgebra);
		$BruteForce = sizeof($BruteForce);
		$Combination = sizeof($Combination);
		$DataStructures = sizeof($DataStructures);
		$DynamicProgramming = sizeof($DynamicProgramming);
		$GameTheory = sizeof($GameTheory);
		$Geometry = sizeof($Geometry);
		$GraphTheory = sizeof($GraphTheory);
		$Greedy = sizeof($Greedy);
		$NumberTheory = sizeof($NumberTheory);
		$SortingSearching = sizeof($SortingSearching);
		$Strings = sizeof($Strings);


		view("compararCategorias", compact('opcionesItver','opcionesGlobal','classFieldset','link','AdHoc','ArithmeticAlgebra','BruteForce','Combination','DataStructures','DynamicProgramming','GameTheory','Geometry','GraphTheory','Greedy','NumberTheory','SortingSearching','Strings'));
	}else{
		view("compararCategorias", compact('opcionesItver','opcionesGlobal','classFieldset'));
	}