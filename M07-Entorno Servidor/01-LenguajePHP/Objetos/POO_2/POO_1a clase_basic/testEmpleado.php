<?php
require_once "Empleat.php";

$empleat1 = new Empleat("Juan", 3333);
$empleat2 = new Empleat("Juan");

$empleat1->toPrint();
$empleat2->toPrint();

?>