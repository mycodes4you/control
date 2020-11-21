<?php 
include('api/conexion.php');

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


$accion = 'leer';

if (isset($_GET['accion'])) {
	$accion = $_GET['accion'];
}

if ($accion == 'leer') {


	$result = $conexion->query('SELECT * FROM alumnos');
	$alumnos  = array();


	while ($row = $result->fetch_assoc()) {
	array_push($alumnos, $row);
	}
	$res['alumnos'] = $alumnos;
	//print_r,($alumnos);

	}



if ($accion == 'agregar') {
	// --- Registro del alumno
	$alumno_activo = 1;
	$alumno_foto = 'assets/img/img-avatar.gif';
	unset($sql_data_array);
	$sql_data_array = [
	  'alumno_matricula' => $alumno_matricula, 
	  'alumno_apaterno' => $alumno_apaterno, 
	  'alumno_amaterno' => $alumno_amaterno, 
	  'alumno_1ernombre' => $alumno_1ernombre, 
	  'alumno_2donombre' => $alumno_2donombre,
	  'alumno_email' => $alumno_email,
	  'alumno_telefono' => $alumno_telefono,
	  'alumno_d_calle' => $alumno_d_calle,
	  'alumno_d_n_exterior' => $alumno_d_n_exterior,
	  'alumno_d_n_interior' => $alumno_d_n_interior,
	  'alumno_d_colonia' => $alumno_d_colonia,
	  'alumno_d_municipio' => $alumno_d_municipio,
	  'alumno_d_estado' => $alumno_d_estado,
	  'alumno_d_cp' => $alumno_d_cp,
	  'alumno_d_pais' => $alumno_d_pais,
	  'alumno_carrera' => $alumno_carrera,
	  'alumno_semestre' => $alumno_semestre,
	  'alumno_activo' => $alumno_activo,
	  'alumno_contacto_e_nombre' => $alumno_contacto_e_nombre,
	  'alumno_contacto_e_telefono' => $alumno_contacto_e_telefono,
	  'alumno_contacto_e_parentesco' => $alumno_contacto_e_parentesco,
	  'alumno_foto' => $alumno_foto
	];
	$accion = 'insertar';

	ejecutar_db('alumnos', $sql_data_array, $accion);
	
	// --- Obtener id del alum
	$sqlultimo = $conexion->query("SELECT MAX(alumno_id) AS Largestalumno_id FROM alumnos");
	$ultimo_id = $sqlultimo->fetch_assoc();
	$id = implode($ultimo_id, '');
	// --- generar contraseña aleatoria
	$longitud = 8;
  // --- $usuario_contrasena_temporal = substr(MD5(rand(5, 100)), 0, $logintud);
  $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
  $usuario_contrasena_temporal = "";
    
  for($i=0;$i<$longitud;$i++) {
   	$usuario_contrasena_temporal .= substr($str,rand(0,62),1);
  }
  $usuario_contrasena = md5($usuario_contrasena_temporal);

	// --- Creando Usuario
	unset($sql_data_array);
	$sql_data_array = [
	  'alumno_id' => $id,
	  'usuario_correo' => $usuario_correo,
	  'usuario_contrasena' => $usuario_contrasena,
	  'usuario_telegramID' => $usuario_telegramID,
	  'usuario_contrasena_temporal' => $usuario_contrasena_temporal
	];

	$accion = 'insertar';
	ejecutar_db('usuarios', $sql_data_array, $accion);
	// --- consultar materias
	for ($i = 1; $i <= $alumno_semestre; $i++) {
		$sql_mat = $conexion->query("SELECT * FROM materias WHERE carrera_id = $alumno_carrera AND materia_semestre = $alumno_semestre");
		while($materias = $sql_mat->fetch_array(MYSQLI_ASSOC)) {
			$mats[] = $materias['materia_id'];
		}
		foreach ($mats as $key => $value) {
			for ($i = 1; $i <= 4; $i++) {
				unset($sql_data_array);
				$sql_data_array = [
				  'materia_id' => $value,
				  'carrera_id' => $alumno_carrera,
				  'alumno_id' => $id, 
				  'semestre_id' => $alumno_semestre,
				  'calificacion_parcial' => $i
				];

			$accion = 'insertar';
			ejecutar_db('calificaciones', $sql_data_array, $accion);
			}
		}  
		unset($mats); 
		unset($value);
	}						

	unset($sql_data_array);
	$sql_data_array = [
		'bitacora_usuario' => $bitacora_usuario,
		'bitacora_descripcion' => 'Se registro el alumno: ' . $alumno_matricula,
		'bitacora_codigo' => 'Registro Alumno'
	];
	
	
	// --- Guardando en bitacora
	if (ejecutar_db('bitacora', $sql_data_array, $accion)) {
		// --- Mostrando resultados
		$res['message'] = 'Exito! se agrego el Alumno con matricula ' .$alumno_matricula;
		$_SESSION['mensajes']['aviso'] = 'Exito! se agrego el Alumno con matricula ' .$alumno_matricula;
	} else {
		$res['error']   = true;
		$res['message'] = 'Error al crear alumno!.';
	}
}

if ($accion == 'actualizar') {


		$result = $conexion->query("UPDATE alumnos SET alumno_matricula = '$alumno_matricula', alumno_apaterno = '$alumno_apaterno', alumno_amaterno = '$alumno_amaterno', alumno_1ernombre = '$alumno_1ernombre', alumno_2donombre = '$alumno_2donombre', alumno_email = '$alumno_email', alumno_telefono = '$alumno_telefono', alumno_d_calle = '$alumno_d_calle', alumno_d_n_exterior = '$alumno_d_n_exterior', alumno_d_n_interior = '$alumno_d_n_interior', alumno_d_colonia = '$alumno_d_colonia', alumno_d_municipio = '$alumno_d_municipio', alumno_d_estado = '$alumno_d_estado', alumno_d_cp = '$alumno_d_cp', alumno_d_pais = '$alumno_d_pais', alumno_carrera = '$alumno_carrera', alumno_semestre = '$alumno_semestre', alumno_activo = '$alumno_activo', alumno_contacto_e_nombre = '$alumno_contacto_e_nombre', alumno_contacto_e_telefono = '$alumno_contacto_e_telefono', alumno_contacto_e_parentesco = '$alumno_contacto_e_parentesco' WHERE alumno_id='$alumno_id'");
		//$desc_bit = 'Se edito alumno: ' . $alumno_matricula . ' con el alumno_email: ' . $alumno_email . ' y el telefono: ' . $alumno_telefono;
		//$bitacora = $conn->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = 'Exito! se actualizo el Alumno con matricula: <b>' . $alumno_matricula . '</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al actualizar Alumno!.';
		}
	}

if ($accion == 'eliminar') {

		$result = $conexion->query("DELETE FROM alumnos WHERE alumno_id='$alumno_id'");
		//$desc_bit = 'Se elimino el alumno: ' . $alumno_matricula . ' con el alumno_email: ' . $alumno_email . ' y el telefono: ' . $alumno_telefono;
		//$bitacora = $conn->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");

		if ($result) {
			$res['message'] = 'Exito! se elimino el Alumno con matricula: <b>' . $alumno_matricula . '</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al eliminar el Alumno!.';
		}
	}

if ($accion == 'cambiar_foto') {
	if (!isset($alumno_foto)){
		$nombre_archivo =$_FILES['alumno_foto']['name'];
    $tipo_archivo = $_FILES['alumno_foto']['type'];
    $tamano_archivo = $_FILES['alumno_foto']['size'];
    $archivo= $_FILES['alumno_foto']['tmp_name'];


 	} else{
 		$nombre_archivo="";
  }

  if ($nombre_archivo!=""){
	  if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg")))) {
	  	if ($tamano_archivo  < 30000000) {
	  		$res['error']   = true;
				$mensaje = 'El tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos de 3 Mb máximo.</td></tr></table>';
				$res['message'] = $mensaje;
	  	}
	  	$res['error']   = true;
	  	$res1 = explode(".", $nombre_archivo);
      $extension1 = $res1[count($res1)-1];
			$mensaje = 'El tipo de archivo ' . $extension1 . ' no esta permitido. <br><br><table><tr><td><li>Se permiten archivos .jpg, .jpeg</td></tr></table>';
			$res['message'] = $mensaje;
	  }
	  else{

	  	$directorio = 'imagenes/alumnos/';
	  	$tipo = $_FILES['alumno_foto']['name'];
			$ext = explode('.',$tipo);
			$extension = array_pop($ext);
			$fecha = new DateTime();
			$archivo = $directorio.$alumno_matricula.'-'.$fecha->getTimestamp().'.'.$extension;
			
            if (move_uploaded_file($_FILES['alumno_foto']['tmp_name'], $archivo)) {
              
              $sqlFoto = $conexion->query("UPDATE alumnos SET alumno_foto = '$archivo' WHERE alumno_id = '$alumno_id'");
							if ($sqlFoto) {
								$mensaje = 'Se actuializo correctamente la fotografía del usuario con matricula: ' . $alumno_matricula;
								$res['message'] = $mensaje;
								//$res['message2'] = $desc_bit;
							} else {
								$res['error']   = true;
								$mensaje = 'Error al actualizar la fotografía del alumno con matricula: ' . $alumno_matricula;
								$res['message'] = $mensaje;
							}
                unlink($dirtemp); //Borrar el fichero temporal
            }
            else
            {
              $res['error']   = true;
							$mensaje = 'Ocurrió algún error al subir el fichero. No pudo guardarse.';
							$res['message'] = $mensaje;
            }

	  	/*$directorio = 'imagenes/alumnos/';
	  	$tipo = $_FILES['alumno_foto']['name'];
			$ext = explode('.',$tipo);
			$extension = array_pop($ext);
			$fecha = new DateTime();
			$archivo = $directorio.$alumno_matricula.'-'.$fecha->getTimestamp().'.'.$extension;
			move_uploaded_file($_FILES['alumno_foto']['tmp_name'], $archivo);*/

			
    }
	}      
}


// Close database connection
	$conexion->close();
	//echo 'hola<br>';
	//print_r($res);
	// print json encoded data
	echo json_encode($res);
	die();
