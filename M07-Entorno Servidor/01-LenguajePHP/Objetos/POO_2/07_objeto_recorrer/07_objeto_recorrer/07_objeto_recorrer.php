<?php

	require_once("Persona4.php");

	$objPersona = new Persona4();

	$aPropiedades1 = get_class_vars("Persona4");
	$aPropiedades2 = get_object_vars( $objPersona );
	$aMetodos	   = get_class_methods("Persona4");

	// Tambien podria hacerse usando 'get_class()' y el nombre de un Objeto:	
	// $aPropiedades1 = get_class_vars( get_class($objPersona) );
	// $aMetodos = get_class_methods( get_class($objPersona) );

	echo "<p>PROPIEDADES 1:</p>";
	
    foreach( $aPropiedades1 as $nombre => $valor ){
        echo $nombre.": [".$valor."]<br/>";
	}

	echo "<p>PROPIEDADES 2:</p>";
	
    foreach( $aPropiedades2 as $nombre => $valor ){
        echo $nombre.": [".$valor."]<br/>";
	}

	echo "<p>PROPIEDADES (obtenidas desde la clase):</p>";
	
	$objPersona->getPropiedades();	// Se devolveran TODAS las propiedades

	echo "<p>METODOS:</p>";

    foreach( $aMetodos as $nombre => $valor ){
        echo $nombre.": [".$valor."]<br/>";
	}

	echo "<p>Finalizado</p>";

?>