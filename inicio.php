<?php
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
session_start(); // --- Validar sesión ---

include 'api/conexion.php';

// --- URL para axios
$url_axios = "https://localhost/control/";
//$url_axios = "https://atom-rm.com/control/";


if(!isset($_SESSION['usr'])){
	header("location:login.php?accion=entrar"); // --- redirigir a login si no hay sesión ---
}
// ---- Se establece la zona horarira y el lenguaje
date_default_timezone_set("America/Mexico_City");
setlocale(LC_ALL , 'es_ES.UTF-8');

// ---- Hora actual
$hora_actual = strftime("%A, %e $de %B $de %Y %R");

// ---- Saludo de acuerdo a la hora del día
$today = getdate();
$hora=$today["hours"];
if ($hora<12) {
	$saludo = 'Buenos días <i class="fas fa-sun fa-lg" style="color: #ffef00; text-shadow: 0 0 5px #000;"></i>';
}elseif($hora<19){
	$saludo = 'Buenas tardes <i class="fas fa-cloud-sun fa-lg" style="color: #faff50; text-shadow: 0 0 5px #000;"></i>';
}else{ 
	$saludo = 'Buenas Noches <i class="fas fa-moon fa-lg" style="color: blue; text-shadow: 0 0 5px #000;"></i>'; 
}

// ---- Consulta numero de eventos disponibles
if ($accion == 'cuenta' || $accion == 'eventos'){
	$hoyeventos = date("Y-m-d H:i:s");
	$query_eventos = "SELECT * FROM eventos WHERE evento_fecha >= '$hoyeventos'";
	$consulta_eventos = $conexion->query($query_eventos) or die ("Falló " . $query_eventos);
	$n_eventos = mysqli_num_rows($consulta_eventos);
}

// --- Array Semestres 
$lista_semestres = [
	'1' => '1<sup>er</sup> Semestre',
	'2' => '2<sup>do</sup> Semestre',
	'3' => '3<sup>er</sup> Semestre',
	'4' => '4<sup>to</sup> Semestre',
	'5' => '5<sup>to</sup> Semestre',
	'6' => '6<sup>to</sup> Semestre',
	'7' => '7<sup>mo</sup> Semestre',
	'8' => '8<sup>vo</sup> Semestre',
	];
// ---- Inicio de Acciones
if($accion == 'cuenta'){
	
	$titulo_pagina = 'MI CUENTA';
	// ---- Marcar la sección en el menú ---
	$menu_cuenta = 'active';
	// --- BACKEND ----

	if ($_SESSION['alumno_semestre'] == 1) { $semestre = '1<sup>er</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 2) { $semestre = '2<sup>do</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 3) { $semestre = '3<sup>er</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 4) { $semestre = '4<sup>to</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 5) { $semestre = '5<sup>to</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 6) { $semestre = '6<sup>to</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 7) { $semestre = '7<sup>mo</sup> Semestre'; }
	elseif ($_SESSION['alumno_semestre'] == 8) { $semestre = '8<sup>vo</sup> Semestre'; }




	$sql_listado = "SELECT * FROM materias WHERE carrera_id = '$_SESSION[alumno_carrera]' AND materia_semestre = '$_SESSION[alumno_semestre]' ORDER BY materia_descripcion DESC";
	$obtlistado = $conexion->query($sql_listado) or die ("ERROR");
	while($listado = $obtlistado->fetch_array()){
		$lista[] = $listado;
	}

	$sql_carreras = "SELECT * FROM carreras WHERE carrera_id = '$_SESSION[alumno_carrera]'";
	$obtcarrea = $conexion->query($sql_carreras) or die ("Error al selecionar carrerras");
	$obtcarrera_nombre = $obtcarrea->fetch_assoc();
	$carrera_nombre = $obtcarrera_nombre['carrera_nombre'];
	// ---- Front HTML ----
	/*echo '<pre>';
	print_r($lista);
	echo '</pre>';*/
	$result = $conexion->query('SELECT * FROM eventos ORDER BY evento_fecha ASC');
	//$eventos  = array();

	while ($row = $result->fetch_array()) {
	//array_push($eventos, $row);
		$eventos[] = $row;
	}

	include('front/cuenta.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'eventos'){
	
	$titulo_pagina = 'EVENTOS';
	// ---- Marcar la sección en el menú ---
	$menu_cuenta = 'active';
	// --- BACKEND ----
	
	include('front/eventos.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'grupos'){
	
	$titulo_pagina = 'GRUPOS';
	// ---- Marcar la sección en el menú ---
	$menu_grupos = 'active';
	// --- BACKEND ----
	$query_grupos = "SELECT * FROM grupos INNER JOIN carreras ON grupos.carrera_id = carreras.carrera_id ORDER BY grupos.grupo_nombre ASC";
	$consulta_grupos = $conexion->query($query_grupos) or die ("Falló grupos" . $query_grupos);

	$l_grupos = [];
	/*while($lista_grupos = $consulta_grupos->fetch_assoc()){
		array_push($l_grupos, $lista_grupos); 
	}
	$res['l_grupos'] = $l_grupos;*/

	include('front/grupos.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'ver_grupo'){
	
	$titulo_pagina = 'GRUPO ';
	// ---- Marcar la sección en el menú ---
	$menu_ver_grupos = 'active';
	// --- BACKEND ----
	$query_alumnos= "SELECT * FROM alumnos WHERE grupo_id = $grupo_id ORDER BY alumno_apaterno ASC";
	$consulta_alumnos = $conexion->query($query_alumnos) or die ("Falló grupos" . $query_alumnos);

	$sql_grupo = "SELECT * FROM grupos WHERE grupo_id = '$grupo_id'";
	$obtgrupo = $conexion->query($sql_grupo) or die ("Error al selecionar grupo");
	$obtgrupo_nombre = $obtgrupo->fetch_assoc();
	$grupo_nom = $obtgrupo_nombre['grupo_nombre'];
	$carr_id = $obtgrupo_nombre['carrera_id'];

	$sql_carrera = "SELECT * FROM carreras WHERE carrera_id = '$carr_id'";
	$obtcarrera = $conexion->query($sql_carrera) or die ("Error al selecionar carrera");
	$obtcarrera_nombre = $obtcarrera->fetch_assoc();
	$carrera_nom = $obtcarrera_nombre['carrera_nombre'];

	include('front/ver_grupo.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'editar_grupo'){
	
	$titulo_pagina = 'EDITAR GRUPO ';
	// ---- Marcar la sección en el menú ---
	$menu_editar_grupos = 'active';
	// --- BACKEND ----
	$sql_grupo = "SELECT * FROM grupos WHERE grupo_id = '$grupo_id'";
	$obtgrupo = $conexion->query($sql_grupo) or die ("Error al selecionar grupo");
	$obtgrupo_nombre = $obtgrupo->fetch_assoc();
	$grupo_nom = $obtgrupo_nombre['grupo_nombre'];
	$carr_id = $obtgrupo_nombre['carrera_id'];
	$datosG = $obtgrupo_nombre;

	$sql_carrera = "SELECT * FROM carreras WHERE carrera_id = '$carr_id'";
	$obtcarrera = $conexion->query($sql_carrera) or die ("Error al selecionar carrera");
	$obtcarrera_nombre = $obtcarrera->fetch_assoc();
	$carrera_nom = $obtcarrera_nombre['carrera_nombre'];

	include('front/editar_grupo.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'registrar_profesor'){
	
	$titulo_pagina = 'REGISTRAR PROFESOR';
	// ---- Marcar la sección en el menú ---
	$registrar_profesor = 'active';
	// --- BACKEND ----
	
	include('front/registrar_profesor.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'registrar_grupo'){
	
	$titulo_pagina = 'REGISTRAR GRUPO';
	// ---- Marcar la sección en el menú ---
	$registrar_grupo = 'active';
	// --- BACKEND ----
	
	include('front/registrar_grupo.php');
	unset($_SESSION['mensajes']);
	
}

if($accion == 'registro'){
	
	$titulo_pagina = 'REGISTRO';
	// ---- Marcar la sección en el menú ---
	$menu_cuenta = 'active';
	
	// ---- Front HTML ----
	include('front/alumnos_registrar.php');
	unset($_SESSION['mensajes']);
	
}

elseif($accion == 'calificaciones'){
	
	$titulo_pagina = 'MIS CALIFICACIONES';
	// ---- Marcar la sección en el menú ---
	$menu_calificaciones = 'active';
	
	// ---- Front HTML ----
	include('front/calificaciones.php');
	unset($_SESSION['mensajes']);
	
}

elseif($accion == 'administracion'){
	
	$titulo_pagina = 'ADMINISTRACIÓN';
	// ---- Marcar la sección en el menú ---
	$menu_administracion = 'active';

	// ---- Back ----


	// ---- Front HTML ----
	include('front/administracion.php');
	unset($_SESSION['mensajes']);
	
}
elseif($accion == 'registrar_alumno'){
	$titulo_pagina = 'Registrar Alumnos';
	// ---- Marcar la sección en el menú ---
	$registrar_alumno = 'active';
	$CantidadMostrar=5;
	//Conexion  al servidor mysql
	// Validado de la variable GET


	if($filtro_carreras){
		//*-for ($i=0; $i <= $_POST['filtro']; $i++) { 
			$consulta =$conexion->query("SELECT * FROM alumnos WHERE alumno_carrera = $filtro_carreras");

			//header("location:inicio.php?accion=administracion_alumnos&filtro=$filtro&pag=$pag");
	}else{
		$compag = (int)(!isset($pag)) ? 1 : $pag; 
		$TotalReg =$conexion->query("SELECT * FROM alumnos");

		$consultavistas ="SELECT * FROM alumnos ORDER BY alumno_apaterno ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
		$consulta=$conexion->query($consultavistas);
		$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
		//header("location:inicio.php?accion=administracion_alumnos&pag=$pag");
	}

			/*** VALES DE VALUES INDICE 

		[0] => ID
    [1] => MATRICULA
    [2] => APATERNO
    [3] => AMATERNO
    [4] => 1ER NOMBRE
    [5] => 2DO NOMBRE
    [6] => EMAIL
    [7] => TELEFONO
    [8] => CALLE
    [9] => NEXTERIOIR
    [10] => NINTERIOR
    [11] => COLONIA
    [12] => MUNICIPIO
    [13] => ESTADO
    [14] => CP
    [15] => PAIS
    [16] => CARRERA
    [17] => SEMESTRE
    [18] => CONTACTO NOMBRE
    [19] => CONTACTO TELEFONO
    [20] => PARENTESCO
    [21] => FOTOGRAFIA
    [22] => ACTIVO

	**/


	// ---- Front HTML ----
	include('front/registrar_alumno.php');
	unset($_SESSION['mensajes']);
	// SOLO ADMINISTRADORES *********** }
	
}

elseif($accion == 'lista_alumnos'){
	
	$titulo_pagina = 'Listado de Alumnos';
	// ---- Marcar la sección en el menú ---
	$lista_alumnos = 'active';

	// ---- Back ----
	// --- Consulta para listado de carreras
	$query_carreras = "SELECT * FROM carreras";
	$consulta_carreras = $conexion->query($query_carreras) or die ("Falló carreras" . $query_carreras);
	$l_carreras = [];
	while($lista_carreras = $consulta_carreras->fetch_assoc()){
		array_push($l_carreras, $lista_carreras); 
	}
	$res3['l_carreras'] = $l_carreras;


	// ---- Front HTML ----
	include('front/lista_alumnos.php');
	unset($_SESSION['mensajes']);
	
}
?>
