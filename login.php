<?php
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
session_start(); // --- Validar sesión ---

if($accion == 'salir'){

	session_destroy();
	header("location:index.php");

}

if(isset($_SESSION['usr'])){ // ---- sesión iniciada, redirigir a index ----

	header("location:index.php");

}

if($accion == 'entrar' && !isset($_SESSION['usr'])){ // --- Iniciar sesión si es redirigido y la sessi´on no existe ---
	
	// ---- Include del front ----
	include('front/login.php');
	
}

elseif($accion == 'validar'){ // --- Validar datos ---
		
	include 'api/conexion.php';

	// --- Limpiar variables ---
	$email = $conexion->real_escape_string(htmlentities($email));
	$pass = $conexion->real_escape_string(htmlentities($pass));

	$passEncriptada = md5($pass);

	// --- Consultar el correo ---
	$query = "SELECT * FROM usuarios WHERE usuario_correo = '" . $email . "' AND usuario_contrasena = '" . $passEncriptada . "'";
	$consulta = $conexion->query($query) or die ("Falló " . $query);
	//echo $query . '<br>';

	if($datos = $consulta->fetch_assoc()){ // -- Si la consulta es exitosa ---


		session_unset();
		session_destroy();
		//session_id($instan.$array_log['usuario_id']);
		session_start();

		$_SESSION['usr'] = [];
		$_SESSION['usuario_id'] = $datos['usuario_id'];
		$_SESSION['usuario_telegramID'] = $datos['usuario_telegramID'];
		$_SESSION['tipo'] = $usuario_tipo;
		
		// ---- Consultar información extra del alumno, administrador o profesor ---
		if ($datos['administrador_id'] != NULL) {

			$_SESSION['tipo'] = 'Administrador';
			$query_info_extra = "SELECT * FROM administradores WHERE administrador_id = '" . $datos[administrador_id] . "'";
			$consulta_info_extra = $conexion->query($query_info_extra) or die ("Falló " . $query_info_extra);
			$info_extra = $consulta_info_extra->fetch_assoc();
			//$_SESSION['usuario_id'] = $info_extra['administrador_id'];
			$_SESSION['usuario_nom_corto'] = $info_extra['administrador_1ernombre'] . ' ' . $info_extra['administrador_apaterno'];
			$_SESSION['usuario_nom_completo'] = $info_extra['administrador_apaterno'] . ' ' . $info_extra['administrador_amaterno'] . '<br>' . $info_extra['administrador_1ernombre'] . ' ' . $info_extra['administrador_2donombre'];
			$_SESSION['usuario_email'] = $info_extra['administrador_email'];
			$_SESSION['usuario_telefono'] = $info_extra['administrador_telefono'];
			$_SESSION['usuario_activo'] = $info_extra['administrador_activo'];
			$_SESSION['usuario_foto'] = $info_extra['administrador_foto'];

		}
		elseif ($datos['profesor_id'] != NULL) {

			$_SESSION['tipo'] = 'Profesor';
			$query_info_extra = "SELECT * FROM profesores WHERE profesor_id = '" . $datos[profesor_id] . "'";
			$consulta_info_extra = $conexion->query($query_info_extra) or die ("Falló " . $query_info_extra);
			$info_extra = $consulta_info_extra->fetch_assoc();
			$_SESSION['usuario_id'] = $info_extra['profesor_id'];
			$_SESSION['usuario_nom_corto'] = $info_extra['profesor_1ernombre'] . ' ' . $info_extra['profesor_apaterno'];
			$_SESSION['usuario_nom_completo'] = $info_extra['profesor_apaterno'] . ' ' . $info_extra['profesor_amaterno'] . '<br>' . $info_extra['profesor_1ernombre'] . ' ' . $info_extra['profesor_2donombre'];
			$_SESSION['usuario_email'] = $info_extra['profesor_email'];
			$_SESSION['usuario_telefono'] = $info_extra['profesor_telefono'];
			$_SESSION['usuario_activo'] = $info_extra['profesor_activo'];
			$_SESSION['usuario_foto'] = $info_extra['profesor_foto'];
		}
		elseif ($datos['alumno_id'] != NULL) {

			$_SESSION['tipo'] = 'Alumno';
			$query_info_extra = "SELECT * FROM alumnos WHERE alumno_id = '" . $datos[alumno_id] . "'";
			$consulta_info_extra = $conexion->query($query_info_extra) or die ("Falló " . $query_info_extra);
			$info_extra = $consulta_info_extra->fetch_assoc();
			$_SESSION['usuario_id'] = $info_extra['alumno_id'];
			$_SESSION['usuario_nom_corto'] = $info_extra['alumno_1ernombre'] . ' ' . $info_extra['alumno_apaterno'];
			$_SESSION['usuario_nom_completo'] = $info_extra['alumno_apaterno'] . ' ' . $info_extra['alumno_amaterno'] . '<br>' . $info_extra['alumno_1ernombre'] . ' ' . $info_extra['alumno_2donombre'];
			$_SESSION['usuario_email'] = $info_extra['alumno_email'];
			$_SESSION['usuario_telefono'] = $info_extra['alumno_telefono'];
			$_SESSION['usuario_activo'] = $info_extra['alumno_activo'];
			$_SESSION['alumno_foto'] = $info_extra['alumno_foto'];
			$_SESSION['alumno_matricula'] = $info_extra['alumno_matricula'];
			$_SESSION['alumno_semestre'] = $info_extra['alumno_semestre'];
			$_SESSION['alumno_carrera'] = $info_extra['alumno_carrera'];
			$_SESSION['alumno_d_calle'] = $info_extra['alumno_d_calle'];
			$_SESSION['alumno_d_n_exterior'] = $info_extra['alumno_d_n_exterior'];
			$_SESSION['alumno_d_n_interior'] = $info_extra['alumno_d_n_interior'];
			$_SESSION['alumno_d_colonia'] = $info_extra['alumno_d_colonia'];
			$_SESSION['alumno_d_municipio'] = $info_extra['alumno_d_municipio'];
			$_SESSION['alumno_d_estado'] = $info_extra['alumno_d_estado'];
			$_SESSION['alumno_d_cp'] = $info_extra['alumno_d_cp'];
			$_SESSION['alumno_d_pais'] = $info_extra['alumno_d_pais'];
			$_SESSION['alumno_telefono'] = $info_extra['alumno_telefono'];
			$_SESSION['alumno_email'] = $info_extra['alumno_email'];
			$_SESSION['alumno_contacto_e_nombre'] = $info_extra['alumno_contacto_e_nombre'];
			$_SESSION['alumno_contacto_e_telefono'] = $info_extra['alumno_contacto_e_telefono'];
			$_SESSION['alumno_contacto_e_parentesco'] = $info_extra['alumno_contacto_e_parentesco'];

		}

		//print_r($_SESSION);

		// --- Verificar si el usaurio tiene acceso ---
		$acceso = ($_SESSION['usuario_activo'] == 1) ? 1 : 0;
		// --- conceder acceso o denegar ---
		echo ($acceso == 1) ? 'success' : 'Tu usuario se encuentra inactivo' . session_destroy();


	} else{ 
		echo 'fail';
	}

}
