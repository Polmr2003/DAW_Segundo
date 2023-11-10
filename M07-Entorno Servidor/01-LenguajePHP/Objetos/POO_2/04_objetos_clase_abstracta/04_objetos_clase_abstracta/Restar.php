<?php

	// Incluimos el archivo con la definicion de la Clase de la que heredamos
	require_once("OperacionAritmetica.php");

	class Restar extends OperacionAritmetica
	{

		// Constructor:
        function __construct() {
        }

		// Metodos redefinidos :

        public function realizarOperacion() {
			return $this->getNumero1() - $this->getNumero2();
        }

	}

?>
