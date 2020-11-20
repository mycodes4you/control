<?php
include 'api/conexion.php';
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
header("Content-type: application/json");

if($accion =="leer_carreras"){
	
	// --- Consulta para listado de carreras
	$query_carreras = "SELECT * FROM carreras";
	$consulta_carreras = $conexion->query($query_carreras) or die ("Falló carreras" . $query_carreras);
	$l_carreras = [];
	while($lista_carreras = $consulta_carreras->fetch_assoc()){
		array_push($l_carreras, $lista_carreras); 
	}
	$res['l_carreras'] = $l_carreras;


}

elseif($accion == 'registrar'){
	unset($sql_data_array);
	$sql_data_array = [
	  'grupo_nombre' => $grupo_nombre,
	  'carrera_id' => $carrera_id,
	  'grupo_semestre' => $grupo_semestre,
	];

	/*echo '<pre>';
	print_r($sql_data_array);
	echo '</pre>';*/
	$accion = 'insertar';
	

	if (ejecutar_db('grupos', $sql_data_array, $accion)) {
			$res['message'] = 'Exito! ';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error ';
		}
}


elseif($accion == 'leer'){

	$query_grupos = "SELECT * FROM grupos INNER JOIN carreras ON grupos.carrera_id = carreras.carrera_id ORDER BY grupos.grupo_nombre ASC";
	$consulta_grupos = $conexion->query($query_grupos) or die ("Falló grupos" . $query_grupos);
	$grupos = [];
	while($lista_grupos = $consulta_grupos->fetch_assoc()){
		array_push($grupos, $lista_grupos); 
	}
	$res['grupos'] = $grupos;

	// --- Consulta para listado de carreras
	$query_carreras = "SELECT * FROM carreras";
	$consulta_carreras = $conexion->query($query_carreras) or die ("Falló carreras" . $query_carreras);
	$l_carreras = [];
	while($lista_carreras = $consulta_carreras->fetch_assoc()){
		array_push($l_carreras, $lista_carreras); 
	}
	$res['l_carreras'] = $l_carreras;

}

echo json_encode($res);
