<?php 
include('api/conexion.php');

foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
header("Content-type: application/json");
if($accion="consultaCURP"){
	$query_curp= "SELECT * FROM alumnos WHERE alumno_curp LIKE '$alumno_curp'";
	$consulta_curp = $conexion->query($query_curp) or die ("Falló titulo <br>" . $query_curp);
	$datos_curp = $consulta_curp->fetch_assoc();


	// --- Consulta para listado de carreras
	$query_carreras = "SELECT * FROM carreras";
	$consulta_carreras = $conexion->query($query_carreras) or die ("Falló carreras" . $query_carreras);
	$l_carreras = [];
	while($lista_carreras = $consulta_carreras->fetch_assoc()){
		array_push($l_carreras, $lista_carreras); 
	}
	$res['l_carreras'] = $l_carreras;


	if($datos_curp){
		$res['error']   = true;
		$res['message'] = 'La CURP: ' . $alumno_curp . ', ya se encuentra registrada con el alumno/matricula->' . $datos_curp['alumno_matricula'];
		
	} else {
			$res['message'] = 'La CURP: <b>' . $alumno_curp. '</b><br> No esta registrada, completa el formulario';
			//$res['message2'] = $desc_bit;
			//$res['message'] = $result;
	}
	$res['curp'] = $alumno_curp;
	echo json_encode($res);
}