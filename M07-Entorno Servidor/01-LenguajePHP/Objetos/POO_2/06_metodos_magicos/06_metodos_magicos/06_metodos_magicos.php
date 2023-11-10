<?php

	require_once("Persona.php");

	// Crear una instancia del objeto:
	$objPersona1 = new Persona();
	$objPersona1->setNombreCompleto("MARTINA M. M.");

	echo "objPersona1: ".$objPersona1."<br />";
	echo "objPersona1: ".$objPersona1->__toString()."<p />";

	echo "Creamos un objeto clonado 'objPersona2' a partir de 'objPersona1':<p/>";

	$objPersona2 = clone $objPersona1;

	echo "objPersona2: ".$objPersona2."<br />";
	echo "objPersona2: ".$objPersona2->__toString()."<p />";

	echo "Modificamos el objeto clonado 'objPersona2':<p/>";

	$objPersona2->setNombreCompleto("Pedro R. Laurel");

	echo "objPersona1: ".$objPersona2."<br />";
	echo "objPersona1: ".$objPersona2->__toString()."<p />";

	echo "Comprobamos si el objeto original 'objPersona1' ha sido modificado:<p/>";

	echo "objPersona2: ".$objPersona1."<br />";
	echo "objPersona2: ".$objPersona1->__toString()."<br />";

?>