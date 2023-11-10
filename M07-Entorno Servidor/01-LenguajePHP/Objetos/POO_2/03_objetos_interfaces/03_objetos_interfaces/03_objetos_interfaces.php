<?php

	// Incluimos el archivo con la definicion de la Clase usada:
	require_once("Persona.php");

	// Crear un Objeto (una instancia de la Clase):
	$objPersona = new Persona();

	$objPersona->setNombre("MARTINA");
	$objPersona->setApellidos("MARRERO MEDINA");
	$objPersona->setGenero("FEMENINO");

	echo "Nombre: [".$objPersona->getNombre()."]<br/>";         // Devuelve: "Nombre: [MARTINA]"
	echo "Apellidos: [".$objPersona->getApellidos()."]<br/>";   // Devuelve: "Apellidos: [MARRERO MEDINA]"
	echo "Usuario: [".$objPersona->getGenero()."]<br/>";			// Devuelve: "Usuario: [FEMENINO]"

?>
