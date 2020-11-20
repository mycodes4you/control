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
	$result = $conexion->query('SELECT * FROM eventos ORDER BY evento_fecha ASC');
	$eventos  = array();



	while ($row = $result->fetch_assoc()) {
	array_push($eventos, $row);
	}
	$res['eventos'] = $eventos;
	//print_r($eventos);

	}



if ($accion == 'agregar') {

	if (!isset($evento_imagen)){
		$nombre_archivo =$_FILES['evento_imagen']['name'];
    $tipo_archivo = $_FILES['evento_imagen']['type'];
    $tamano_archivo = $_FILES['evento_imagen']['size'];
    $archivo= $_FILES['evento_imagen']['tmp_name'];


 	} else{
 		$nombre_archivo="";
  }

  if ($nombre_archivo!=""){
	  if (!((strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "jpg")))) {
	  	if ($tamano_archivo  < 30000000) {
	  		$res['error']   = true;
				$mensaje = 'El tamaño de los archivos no es correcto. <br><br><table><tr><td><li>Se permiten archivos de 3 Mb máximo.</td></tr></table>';
				$res['message'] = $mensaje;
	  	}
	  	$res['error']   = true;
	  	$res1 = explode(".", $nombre_archivo);
      $extension1 = $res1[count($res1)-1];
			$mensaje = 'El tipo de archivo ' . $extension1 . ' no esta permitido. <br><br><table><tr><td><li>Se permiten archivos .jpg, .jpeg</td></tr></table>';
			$res['message'] = $mensaje;
	  }
	  else{

	  	$directorio = 'imagenes/eventos/';
	  	$tipo = $_FILES['evento_imagen']['name'];
			$ext = explode('.',$tipo);
			$extension = array_pop($ext);
			$fecha = new DateTime();
			$archivo = $directorio.$fecha->getTimestamp().'.'.$extension;
			$evento_fecha_creado = date("Y-m-d H:i:s");
			
            if (move_uploaded_file($_FILES['evento_imagen']['tmp_name'], $archivo)) {
               
              $sqlFoto = $conexion->query("INSERT INTO eventos (evento_nombre, evento_descripcion, evento_fecha, evento_imagen) VALUES('$evento_nombre', '$evento_descripcion', '$evento_fecha', '$archivo')");

              //$sqlFoto = $conexion->query("UPDATE eventos SET evento_imagen = '$archivo' WHERE alumno_id = '$alumno_id'");
							if ($sqlFoto) {
								$mensaje = 'Se agrego correctamente el evento: '.$evento_nombre.'.';
								$res['message'] = $mensaje;
								//$res['message2'] = $desc_bit;
							} else {
								$res['error']   = true;
								$mensaje = 'Error agregar el evento: ' . $evento_nombre .'<br>' .$evento_descripcion. '<br> ' .$evento_fecha . '<br> ' .$archivo;
								$res['message'] = $mensaje;
							}
                unlink($dirtemp); //Borrar el fichero temporal
            }
            else
            {
              $res['error']   = true;
							$mensaje = 'Ocurrió algún error al subir el fichero. No pudo guardarse. Nombre:<br><b>'.$evento_nombre.' - Desc ' .$evento_descripcion.' - Fecha '. $evento_fecha.' - Creado: ' .$evento_fecha_creado. ' - Archovo: '.$archivo.'</b>';
							$res['message'] = $mensaje;
            }			
    }
	}      
}

if ($accion == 'actualizar') {


		$result = $conexion->query("UPDATE eventos SET alumno_matricula = '$alumno_matricula', alumno_apaterno = '$alumno_apaterno', alumno_amaterno = '$alumno_amaterno', alumno_1ernombre = '$alumno_1ernombre', alumno_2donombre = '$alumno_2donombre', alumno_email = '$alumno_email', alumno_telefono = '$alumno_telefono', alumno_d_calle = '$alumno_d_calle', alumno_d_n_exterior = '$alumno_d_n_exterior', alumno_d_n_interior = '$alumno_d_n_interior', alumno_d_colonia = '$alumno_d_colonia', alumno_d_municipio = '$alumno_d_municipio', alumno_d_estado = '$alumno_d_estado', alumno_d_cp = '$alumno_d_cp', alumno_d_pais = '$alumno_d_pais', alumno_carrera = '$alumno_carrera', alumno_semestre = '$alumno_semestre', alumno_activo = '$alumno_activo', alumno_contacto_e_nombre = '$alumno_contacto_e_nombre', alumno_contacto_e_telefono = '$alumno_contacto_e_telefono', alumno_contacto_e_parentesco = '$alumno_contacto_e_parentesco' WHERE alumno_id='$alumno_id'");
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

		$result = $conexion->query("DELETE FROM eventos WHERE evento_id='$evento_id'");
		//$desc_bit = 'Se elimino el alumno: ' . $alumno_matricula . ' con el alumno_email: ' . $alumno_email . ' y el telefono: ' . $alumno_telefono;
		//$bitacora = $conn->query("INSERT INTO bitacora (desc_bit) VALUES('$desc_bit')");
		unlink($evento_imagen);
		if ($result) {
			$res['message'] = 'Exito! se elimino el evento: <b>' . $evento_nombre . '</b>';
			//$res['message2'] = $desc_bit;
		} else {
			$res['error']   = true;
			$res['message'] = 'Error al eliminar el Evento!.';
		}
	}

if ($accion == 'cambiar_foto') {
	if (!isset($evento_imagen)){
		$nombre_archivo =$_FILES['evento_imagen']['name'];
    $tipo_archivo = $_FILES['evento_imagen']['type'];
    $tamano_archivo = $_FILES['evento_imagen']['size'];
    $archivo= $_FILES['evento_imagen']['tmp_name'];


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

	  	$directorio = 'imagenes/eventos/';
	  	$tipo = $_FILES['evento_imagen']['name'];
			$ext = explode('.',$tipo);
			$extension = array_pop($ext);
			$fecha = new DateTime();
			$archivo = $directorio.$alumno_matricula.'-'.$fecha->getTimestamp().'.'.$extension;
			
            if (move_uploaded_file($_FILES['evento_imagen']['tmp_name'], $archivo)) {
              
              $sqlFoto = $conexion->query("UPDATE eventos SET evento_imagen = '$archivo' WHERE alumno_id = '$alumno_id'");
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

	  	/*$directorio = 'imagenes/eventos/';
	  	$tipo = $_FILES['evento_imagen']['name'];
			$ext = explode('.',$tipo);
			$extension = array_pop($ext);
			$fecha = new DateTime();
			$archivo = $directorio.$alumno_matricula.'-'.$fecha->getTimestamp().'.'.$extension;
			move_uploaded_file($_FILES['evento_imagen']['tmp_name'], $archivo);*/

			
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
