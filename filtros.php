<?php
include 'api/conexion.php';
foreach($_POST as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';
foreach($_GET as $k => $v){$$k=$v;} // echo $k.' -> '.$v.' | ';

	$CantidadMostrar=5;
//Conexion  al servidor mysql
// Validado de la variable GET


if($filtro){
	//*-for ($i=0; $i <= $_POST['filtro']; $i++) { 
		$compag = (int)(!isset($pag)) ? 1 : $pag; 
		$TotalReg =$conexion->query("SELECT * FROM alumnos WHERE alumno_semestre = $filtro");

		$consultavistas = "SELECT * FROM alumnos WHERE alumno_semestre = ".$filtro." ORDER BY alumno_apaterno ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
		$consulta = $conexion->query($consultavistas);
		$TotalRegistro=$TotalReg->fetch_assoc();
		$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
		header("location:inicio.php?accion=administracion_alumnos&filtro=$filtro&pag=$pag");

	//*-}
}else{
$compag = (int)(!isset($pag)) ? 1 : $pag; 
$TotalReg =$conexion->query("SELECT * FROM alumnos");

$consultavistas ="SELECT * FROM alumnos ORDER BY alumno_apaterno ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
$consulta=$conexion->query($consultavistas);
$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
header("location:inicio.php?accion=administracion_alumnos&pag=$pag");
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
