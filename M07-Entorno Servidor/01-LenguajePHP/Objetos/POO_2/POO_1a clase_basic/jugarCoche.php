<?php
require_once "Coche.php";
// Creamos el objeto / Instanciamos la clase
$coche = new Coche();
 
// Usamos los métodos
$coche->setColor("ROJO");
echo "Color del coche: ".$coche->getColor();
 
// Le sumamos 3 y le restamos 1 al atributo
$coche->acelerar();
echo "<br/> acelerando.... " . $coche->getVelocidad();
$coche->acelerar();
$coche->acelerar();
$coche->frenar();
 
echo "<br/> Velocidad actual: ".$coche->getVelocidad();
?>