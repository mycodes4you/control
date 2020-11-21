<?php
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';  
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
include 'api/conexion.php';
//header("Content-type: application/json");
	// --- Consulta para listado de carreras
	if($accion == 'filtro_grupos'){
		// --- Consulta para listado de carreras
		$query_grupos= "SELECT * FROM grupos WHERE carrera_id = $filtro_carreras";
		$consulta_grupos = $conexion->query($query_grupos) or die ("Falló grupos <br>" . $query_grupos);
		$l_grupos = [];
		while($lista_grupos = $consulta_grupos->fetch_assoc()){
			$grupos = '<option value="' .$lista_grupos["grupo_id"]. '">' .$lista_grupos["grupo_nombre"]. '</option>';
			//array_push($l_grupos, $lista_grupos); 
			echo $grupos;
		}
		//$res['grupos'] = $grupos;
	}

	if($accion == 'lista_alumnos'){
		header("Content-type: application/json");
		// --- Consulta para listado de carreras
		$query_alumnos= "SELECT * FROM alumnos WHERE alumno_carrera = $filtro_carreras AND grupo_id = $filtro_grupo";
		$consulta_alumnos = $conexion->query($query_alumnos) or die ("Falló grupos <br>" . $query_alumnos);
		$grupos = [];
		while($lista_alumnos = $consulta_alumnos->fetch_assoc()){
			//$alumnos = '<option value="' .$lista_alumnos["grupo_id"]. '">' .$lista_alumnos["grupo_nombre"]. '</option>';
			array_push($grupos, $lista_alumnos); 
			//echo $alumnos;
		}
		$res['grupos'] = $grupos;

		$query_titulo= "SELECT * FROM carreras WHERE carrera_id = $filtro_carreras";
		$consulta_titulo = $conexion->query($query_titulo) or die ("Falló titulo <br>" . $query_titulo);
		$datos_titulo = $consulta_titulo->fetch_assoc();
		$nombre_carrera = $datos_titulo['carrera_nombre'];

		$query_grupo= "SELECT * FROM grupos WHERE grupo_id = $filtro_grupo";
		$consulta_grupo = $conexion->query($query_grupo) or die ("Falló grupo <br>" . $query_grupo);
		$datos_grupo = $consulta_grupo->fetch_assoc();
		$nombre_grupo = $datos_grupo['grupo_nombre']; 

		$res['titulo'] = 'Grupo ' . $nombre_grupo . ' ->  ' . $nombre_carrera;

		if ($query_alumnos) {
			$res['message'] = 'Lista: <br>Grupo ' . $nombre_grupo . ' ->  ' . $nombre_carrera . '<br><b>Cargada con Exito!</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al cargar lista de alumnos '.$query_alumnos;
			//$res['message'] = $result;
		}
		echo json_encode($res);
	}


//echo json_encode($res);
//die(); 
	?>