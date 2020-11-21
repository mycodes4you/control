<?php

	session_start(); // --- Validar sesión ---
	error_reporting(0);

	if(!isset($_SESSION['usr'])){
			
		echo 'no hay sesión';
		header("location:login.php?accion=entrar"); // --- redirigir a login si no hay sesión ---
			
	} else{
		
		echo 'hay sesión<br>';
		if ($_SESSION['tipo'] == 'Administrador'){
			header("location:inicio.php?accion=administracion"); // --- redirigir a login si no hay sesión ---
		}
		elseif ($_SESSION['tipo'] == 'Profesor') {
			header("location:inicio.php?accion=cuenta"); // --- redirigir a login si no hay sesión ---
		}
		elseif ($_SESSION['tipo'] == 'Alumno') {
			header("location:inicio.php?accion=cuenta"); // --- redirigir a login si no hay sesión ---
		}
		
			
	}


?>