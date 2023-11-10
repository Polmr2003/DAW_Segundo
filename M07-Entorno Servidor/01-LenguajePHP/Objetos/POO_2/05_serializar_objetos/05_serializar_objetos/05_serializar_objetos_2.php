<?php

	require_once("Persona.php");

	session_start();  // Continuar la sesion

	if( isset($_SESSION['usuario']) == true )
	{
		echo "COMPROBAR LOS VALORES<br />";
		echo "=======================<p />";

		echo "Objeto serializado:<p/>";
		echo $_SESSION['usuario']."<br/>";
		echo "------------------------<p/>";
		
		$_SESSION['usuario'] = unserialize($_SESSION['usuario']);

		echo "Conversion a Objeto correcta:<p/>";
		print_r( $_SESSION['usuario'] );

		echo "<p>------------------------</p>";

		// Mostrar informacion del objeto en la sesion:
		echo "Nombre: [".$_SESSION['usuario']->getNombre()."]<br/>";
		echo "Apellidos: [".$_SESSION['usuario']->getApellidos()."]<p/>";
	}
	else
	{
		echo "<p>No has pasado por la pagina principal</p>";
	}

	echo "<a href='05_serializar_objetos_1.php'>Volver a la pagina principal</a>";

?>
