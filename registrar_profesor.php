<?php 
include('api/conexion.php');

//foreach($_POST as $k => $v){$$k=$v;}//  echo $k.' -> '.$v.' | ';
//foreach($_GET as $k => $v){$$k=$v;}//  echo $k.' -> '.$v.' | ';
//header("Content-type: application/json");
//if ($accion == 'registrar_profesor') {
	// --- Registro del profesor
unset($sql_data_array);
$sql_data_array = [
  'bitacora_usuario' => 1,
];

echo '<pre>';
print_r($sql_data_array);
echo '</pre>';
$accion = 'insertar';
ejecutar_db('bitacora', $sql_data_array, $accion);

/*
	$profesor_activo = 1;
	unset($sql_data_array);
echo '1';
	$sql_data_array = [
	  'profesor_apaterno' => 'profesor_apaterno1'
	];
	$accion = 'insertar';
echo '2';
	ejecutar_db('profesores', $sql_data_array, $accion);
		$res['prueba'] = 'EXito';
		echo '3';
	
		$res['error']   = true;
		$res['message'] = 'Error';
		echo '4';

	echo '5';*/
	/*
	// --- Obtener id del alum
	$sqlultimo = $conexion->query("SELECT MAX(profesor_id) AS Largestprofesor_id FROM profesores");
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
	  'profesor_id' => $id,
	  'usuario_correo' => $usuario_correo,
	  'usuario_contrasena' => $usuario_contrasena,
	  'usuario_contrasena_temporal' => $usuario_contrasena_temporal
	];

	$accion = 'insertar';
	ejecutar_db('usuarios', $sql_data_array, $accion);
							

	unset($sql_data_array);
	$sql_data_array = [
		'bitacora_usuario' => $bitacora_usuario,
		'bitacora_descripcion' => 'Se registro el profesor: ' . $profesor_id,
		'bitacora_codigo' => 'Registro Profesor'
	];
	
	
	// --- Guardando en bitacora
	if (ejecutar_db('bitacora', $sql_data_array, $accion)) {
		// --- Mostrando resultados
		$res['message'] = 'Exito! se agrego el Profesor: ' .$profesor_id;
		$_SESSION['mensajes']['aviso'] = 'Exito! se agrego el Profesor id: ' .$profesor_matricula;
	} else {
		$res['error']   = true;
		$res['message'] = 'Error al crear profesor!.';
	}
//}*/
//echo json_encode($res);