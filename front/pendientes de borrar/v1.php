    <?php
//l5nKWHqLzHbgxfb
	// Content Type JSON
	header("Content-type: application/json");

	function limpiar_cadena($string) {
		$patterns = '/[<*°\'\\\[\{\]\}\!#\=$%&+\">]/';
		$replace = '';
		if (is_string($string)) {
			return preg_replace($patterns, $replace, $string);
		} elseif (is_array($string)) {
			reset($string);
			while (list($key, $value) = each($string)) {
				$string[$key] = limpiar_cadena($value);
			}
			return $string;
		}
	}

	foreach($_POST as $k => $v) {$$k = limpiar_cadena($v);}
	foreach($_GET as $k => $v) {$$k = limpiar_cadena($v);}

	// Database conexionection
	/*$conexion = new mysqli("localhost", "u_control", "g0VIRb2sYEuZIonH", "atm_cutc0ntr0l");
	//$conexion = new mysqli('localhost', 'uservue', 'Myx9ln.2', 'crudvue');
	if ($conexion->conexionect_error) {
		die('Error de conexion con la base de datos!');
	}*/
	include('conexion.php');
	$res = array('error' => false);


	// Read data from database
	$action = 'leer';

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if ($action == 'leer') {
		$result = $conexion->query('SELECT * FROM alumnos');
		$alumnos  = array();

		while ($row = $result->fetch_assoc()) {
			array_push($alumnos, $row);
		}
		$res['alumnos'] = $alumnos;
		//print_r($alumnos);
	}


	// Insert data into database
	if ($action == 'agregar') {
		

		$result = $conexion->query("INSERT INTO alumnos (alumno_matricula, alumno_apaterno, alumno_amaterno, alumno_nombres, alumno_email, alumno_telefono) VALUES('$alumno_matricula','$alumno_apaterno', '$alumno_amaterno', '$alumno_nombres', '$alumno_email', '$alumno_telefono')");
		//$desc_bit = 'Se creo el alumno: ' . $alumno_matricula . ' con el alumno_email: ' . $alumno_email . ' y el telefono: ' . $alumno_telefono;
		//$bitacora = $conexion->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");
		if ($result) {
			$res['message'] = 'Exito! se agrego el Alumno con matricula <b>' . $alumno_matricula . '</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al crear alumno!.';
			//$res['message'] = $result;
		}
	}


	// Update data

	if ($action == 'actualizar') {


		$result = $conexion->query("UPDATE alumnos SET alumno_matricula='$alumno_matricula', alumno_apaterno='$alumno_apaterno', alumno_amaterno='$alumno_amaterno', alumno_nombres='$alumno_nombres', alumno_email='$alumno_email', alumno_telefono='$alumno_telefono' WHERE alumno_id='$alumno_id'");
		//$desc_bit = 'Se edito alumno: ' . $alumno_matricula . ' con el alumno_email: ' . $alumno_email . ' y el telefono: ' . $alumno_telefono;
		//$bitacora = $conexion->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = 'Exito! se actualizo el Alumno con matricula: <b>' . $alumno_matricula . '</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al actualizar Alumno!.';
		}
	}


	// Delete data

	if ($action == 'eliminar') {

		$result = $conexion->query("DELETE FROM alumnos WHERE alumno_id='$alumno_id'");
		//$desc_bit = 'Se elimino el alumno: ' . $alumno_matricula . ' con el alumno_email: ' . $alumno_email . ' y el telefono: ' . $alumno_telefono;
		//$bitacora = $conexion->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = 'Exito! se elimino el Alumno con matricula: <b>' . $alumno_matricula . '</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al eliminar el Alumno!.';
		}
	}


	// Close database conexionection
	$conexion->close();
	//echo 'hola<br>';
	//print_r($res);
	// print json encoded data
	echo json_encode($res);
	die();

?>