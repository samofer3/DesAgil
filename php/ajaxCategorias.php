<?php 
	include_once("simple_html_dom.php");
	
	if (isset($_POST["id"])) {
		if (isset($_POST["calcular"])) {
			$id = $_POST["id"];
			$respuesta = array ('problemas'=>150);
			
			$html = file_get_html("http://coj.uci.cu/tables/problems.xhtml?classification=$id&page=10000");
			$navbuttons = $html->find('a');
			$posicion = count($navbuttons)-3;
			$a = $html->find('a',$posicion)->plaintext;

			$html2 = file_get_html("http://coj.uci.cu/tables/problems.xhtml?classification=$id&page=$a");
			$tr = $html2->find('table',1);
			$aCount = $tr->getElementsByTagName('tr');
			$aUltimo = count($aCount)-1;

			$totalProblemas = (($a-1)*50)+$aUltimo;
			$respuesta["problemas"] = $totalProblemas;
			$respuesta["paginas"] = $a;

	    	echo json_encode($respuesta);
		}else{
			include_once("conexion.php");
			$respuesta2 = array ('problemas'=>1);
			$paginas = intval($_POST["paginas"]);
			$id = intval($_POST["id"]);
			$fecha= date("Y-n-j");

			$consulta = "SELECT * FROM categorias WHERE idCategorias = '$id'";
			$ejecutar_consulta = $conexion->query($consulta);
			$num_regs = $ejecutar_consulta->num_rows;
			
			if ($num_regs != 1) {
				$consulta = "call crearCategoria('$id','$fecha')"; 
				$ejecutar_consulta = $conexion->query($consulta);
			}
	
			for ($i=1; $i <= $paginas; $i++) {
				$horaAntes= date("Y-n-j H:i:s");

				$html = file_get_html("http://coj.uci.cu/tables/problems.xhtml?classification=$id&page=$i");
				$tr = $html->find('table',1);
				$aCount = $tr->getElementsByTagName('tr');
				array_shift($aCount);

				foreach ($aCount as $element) {
					$idd = trim($element->children(0)->plaintext);
					$nombre = trim($element->children(1)->plaintext);

					$consulta = "SELECT * FROM problemas WHERE idproblemas = '$idd'";
					$ejecutar_consulta = $conexion->query($consulta);
					$num_regs = $ejecutar_consulta->num_rows;

					if ($num_regs != 1) {
						$consulta = "call agregarProblema('$idd','$nombre','$id')";
						$ejecutar_consulta = $conexion->query($consulta);
					}else{
						$consulta = "call actualizarProblema('$idd','$nombre','$id')";
						$ejecutar_consulta = $conexion->query($consulta);
					}
				}
	    		$tiempo_transcurrido = 0;
				while ($tiempo_transcurrido < 5) {
					$horaAhora = date("Y-n-j H:i:s");
					$tiempo_transcurrido = (strtotime($horaAhora)-strtotime($horaAntes));
				}
			}

			$consulta = "call actualizarFecha('$id','$fecha')";
			$ejecutar_consulta = $conexion->query($consulta);
			$conexion->close();
			echo json_encode($respuesta2);
		}
	}