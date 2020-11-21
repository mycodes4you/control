<?php 
include('api/conexion.php');
foreach($_POST as $k => $v) {}
foreach($_GET as $k => $v) {}

// --- Subien la foto al servidor
$dir_subida = 'imagenes/alumnos/';
$fichero_subido = $dir_subida . basename($_FILES['alumno_foto']['name']);

if (move_uploaded_file($_FILES['alumno_foto']['tmp_name'], $fichero_subido)) {
		echo "Se ha subido la fotografia con éxito.\n";
} else {
		echo "Hubo un error al procesar la fotografía\n";
}
/*
print "<pre>";
echo 'Más información de depuración:';
print_r($_FILES);
print "</pre>";
*/

// --- Reciendo los datos de la imagen
$nombre_foto = $_FILES['alumno_foto']['name'];
$tipo = $_FILES['alumno_foto']['type'];
$tamano = $_FILES['alumno_foto']['size'];

// --- Si existe imagen y tiene un tamaño correcto
if (($nombre_foto == !NULL) && ($_FILES['alumno_foto']['size'] <= 200000)) {
	// --- Se definen los tipos de archivos aceptados
	if (($_FILES["alumno_foto"]["type"] == "image/jpeg") || ($_FILES["alumno_foto"]["type"] == "image/jpg") || ($_FILES["alumno_foto"]["type"] == "image/png")) {
	  // --- Ruta donde se guardarán las imágenes que se suban
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/imagenes/alumnos/';
		// --- Se mueve la imagen desde el directorio temporal a la ruta indicada
		move_uploaded_file($_FILES['alumno_foto']['tmp_name'],$directorio.$nombre_foto);

		// --- Se define la ruta que se almacenara en la bd
		$ruta = $directorio.$nombre_foto;

		$sql_data_array = [
  		'alumno_foto' => $ruta
		];
/*
		$accion = 'actualizar';
		$parametros = 'alumno_id = ' .$alumno_id;

		ejecutar_db('alumnos', $sql_data_array, $accion, $parametros);*/

		$sqlNom = $conexion->query("UPDATE alumnos SET alumno_foto = '$ruta' WHERE alumno_id = $alumno_id");
		if ($sqlNom) {
				$res['message'] = 'Exito! se actualizo la fotografía de el Alumno';
				header("location:inicio.php?accion=administracion_alumnos&res=exito");
			} else {
				$res['error']   = true;
				$res['message'] = 'Error al actualizar fotografía de el Alumno.';
				header("location:inicio.php?accion=administracion_alumnos&res=exito");
			}
	}	else {
		// --- Si no cumple con el formato
		$res['error']   = true;
		$res['message'] = 'No se puede subir una imagen con ese formato';
		header("location:inicio.php?accion=administracion_alumnos&res=exito");
	}
} else {
	// --Si existe la variable pero se pasa del tamaño permitido
	if($nombre_foto == !NULL) {
		$res['error']   = true;
		$res['message'] = 'La imagen supera el peso permitido';
	}
}
?>