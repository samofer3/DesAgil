$cargarProblemasCojADH = $('#cargarProblemasCojADH'),
$cargarProblemasCojARI = $('#cargarProblemasCojARI'),
$cargarProblemasCojBRU = $('#cargarProblemasCojBRU'),
$cargarProblemasCojCOM = $('#cargarProblemasCojCOM'),
$cargarProblemasCojDAT = $('#cargarProblemasCojDAT'),
$cargarProblemasCojDYN = $('#cargarProblemasCojDYN'),
$cargarProblemasCojGAM = $('#cargarProblemasCojGAM'),
$cargarProblemasCojGEO = $('#cargarProblemasCojGEO'),
$cargarProblemasCojGRA = $('#cargarProblemasCojGRA'),
$cargarProblemasCojGRE = $('#cargarProblemasCojGRE'),
$cargarProblemasCojNUM = $('#cargarProblemasCojNUM'),
$cargarProblemasCojSOR = $('#cargarProblemasCojSOR'),
$cargarProblemasCojSTR = $('#cargarProblemasCojSTR');

function obtenerTiempoCargaExtracionProblemas(evento){
	evento.preventDefault();
	$.ajax({
	    url : 'php/ajaxCategorias.php',
	    data : { id : evento.data.id , calcular : true},	// la información a enviar (también es posible utilizar una cadena de datos)
	    type : 'POST',			// especifica si será una petición POST o GET
	    dataType : 'json',		// el tipo de información que se espera de respuesta
	    success : function(json) {	// código a ejecutar si la petición es satisfactoria;
	    	var problemas = json.problemas;
	    	var pagina = json.paginas;
	    	var nombre = evento.data.nombre;
	    	$("#elemento").html(problemas);
	    	$("#mensaje").html('Extrayendo de ' + nombre + ' por favor no cierre la página')
	    	$.ajax({
			    url : 'php/ajaxCategorias.php',
			    data : { id : evento.data.id , paginas : pagina},	// la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'POST',			// especifica si será una petición POST o GET
			    dataType : 'json',		// el tipo de información que se espera de respuesta
			    beforeSend : function(datos) {	// código a ejecutar si la petición es satisfactoria;
			    	$("#elemento").html("Problemas restantes aproximados " + problemas);
			    	$.timer(120, function(temporizador){
					   problemas --
					   $("#elemento").html("Problemas restantes aproximados " + problemas);
					   if (problemas<=0) {temporizador.stop(); $("#elemento").html("");};
					})
			    },
			    success : function(datos) {	// código a ejecutar si la petición es satisfactoria;
			    	problemas = 1;
			    	$("#mensaje").html("La actualización de " + nombre + " se realizó correctamente");
			    	$("#elemento").html("");
			    },
			    error : function(xhr, status) {	// código a ejecutar si la petición falla;
			    	problemas = 1;
			    	console.log(xhr);
			    	console.log(status);
			        alert('Disculpe, existió un problema con la petición');
			    },
			});
	    },
	    error : function(xhr, status) {	// código a ejecutar si la petición falla;
	        alert('Disculpe, existió un problema con la petición');
	    },
	});
}

$cargarProblemasCojADH.click({id: 25, nombre : 'Ad-Hoc'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojARI.click({id: 1, nombre : 'Arithmetic-Algebra'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojBRU.click({id: 2, nombre : 'Brute Force'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojCOM.click({id: 3, nombre : 'Combination'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojDAT.click({id: 4, nombre : 'Data Structures'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojDYN.click({id: 5, nombre : 'Dynamic Programming'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojGAM.click({id: 6, nombre : 'Game Theory'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojGEO.click({id: 7, nombre : 'Geometry'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojGRA.click({id: 23, nombre : 'Graph Theory'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojGRE.click({id: 8, nombre : 'Greedy'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojNUM.click({id: 9, nombre : 'Number Theory'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojSOR.click({id: 10, nombre : 'Sorting-Searching'},obtenerTiempoCargaExtracionProblemas);
$cargarProblemasCojSTR.click({id: 24, nombre : 'Strings'},obtenerTiempoCargaExtracionProblemas);