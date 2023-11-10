<?php

	abstract class OperacionAritmetica
	{

		// Propiedades
        private $numero1 = null;
        private $numero2 = null;

		// Constructor:
        function __constructor() {
        }

		// Metodos comunes:

		public function getNumero1() {
			return $this->numero1;
		}

		public function setNumero1($numero1) {
			$this->numero1 = $numero1;
		}

		public function getNumero2() {
			return $this->numero2;
		}

		public function setNumero2($numero2) {
			$this->numero2 = $numero2;
		}

		// Metodos que seran redefinidos:

		abstract protected function realizarOperacion();

	}

?>