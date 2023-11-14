<?php

	require_once("Persona.php");

	// Iniciar la sesion
	session_start();

	// Crear una instancia del objeto:
	$objPersona = new Persona();
	$objPersona->setNombre("MARTINA");
	$objPersona->setApellidos("MARRERO MEDINA");

	// Variables de sesion:
	$_SESSION['usuario'] = serialize($objPersona);

	echo "PAGINA PRINCIPAL<br />";
	echo "================<p />";

	echo "<a href='05_serializar_objetos_2.php'>Ir a la otra pagina</a><br/>";

?>