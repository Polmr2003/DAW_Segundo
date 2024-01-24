<?php

	// Incluimos el archivo con la definicion de la Clase usada
	require_once("Sumar.php");
	require_once("Restar.php");

	$objSumar = new Sumar();
	$objSumar->setNumero1(22);
	$objSumar->setNumero2(33);

	$objRestar = new Restar();
	$objRestar->setNumero1(22);
	$objRestar->setNumero2(33);

	echo "La suma de los dos numeros es : [".$objSumar->realizarOperacion()."]<br/>";    // Devuelve: [55]
	echo "La resta de los dos numeros es: [".$objRestar->realizarOperacion()."]<br/>";   // Devuelve: [-11]

?>
