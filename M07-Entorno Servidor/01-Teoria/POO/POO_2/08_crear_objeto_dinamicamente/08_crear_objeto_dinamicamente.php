<?php

	// Creamos un Objeto de forma dinamica:
	$objeto = new stdclass;

	// Añadimos propiedades al Objeto:
	$objeto->nombre = "Pedro";
	$objeto->edad = 33;
	$objeto->ciudad = "Madrid";
	$objeto->pais   = "España";
	$objeto->observaciones = "Mi pasion es la informatica";

	echo "Nombre: [".$objeto->nombre."]<br/>";
	echo "Edad: [".$objeto->edad."]<br/>";
	echo "Ciudad: [".$objeto->ciudad."]<br/>";
	echo "Pais: [".$objeto->pais."]<br/>";
	echo "Observaciones: [".$objeto->observaciones."]<br/>";

?>