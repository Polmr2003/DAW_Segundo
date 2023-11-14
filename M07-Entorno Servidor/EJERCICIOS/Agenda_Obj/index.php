<?php
// importamos la clase
require_once("agenda.php");

// instanciamos la clase
$contacto1 = new Agenda("Pol", "Moreno Romero", "10/12/2003");

// obtenemos la edad
$edad = $contacto1->calcularEdad();

// establecemos el correo
$contacto1->setEmail("pol.mr.2003@gmail.com");

// obtenemos el correo
$correo_electronico=$contacto1->getEmail();

// mostramos la edad
echo "Edad: " . $edad . "<br>";

// mostramos el correo
echo "Correo: " . $correo_electronico;

?>