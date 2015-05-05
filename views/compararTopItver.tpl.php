<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comparación con usuarios TOP en el ITVER</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/progressBar.css">
	<link rel="shortcut icon" href="img/coj_favicon.png">
</head>
<body>
	<?php include("views/header.tpl.php"); ?>
	<section>
		<fieldset class="datosUsuario diferenciaProblemas center">
			<legend><?= $usuarioPropio['UsuarioCoj'];?> VS TOP <?= $limite ?></legend>
			<table id="diferenciaProblemas">
			  <tr>
			    <td>Comparaciones de problemas resueltos con usuarios TOP ITVER:</td>
				<td>
			    	<?= $usuarioPropio['UsuarioCoj'];?>
			    	<div class="progressbar" data-perc="<?= $usuarioPropio['porcentajeRealizado']; ?>">
						<div class="bar <?= $usuarioPropio['progressBarColor']; ?>"><span></span></div>
						<div class="label"><span></span></div>
					</div></br>
					<?php 
						foreach ($usuariosComparadosItver as $usuario) {
							view("compararTopProgress", compact('usuario'));
						}
					?>
				</td>
			  </tr>
			</table>
		</fieldset>
	</section>
	<?php include("views/footer.tpl.php"); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/progressBar.js"></script>
</body>
</html>