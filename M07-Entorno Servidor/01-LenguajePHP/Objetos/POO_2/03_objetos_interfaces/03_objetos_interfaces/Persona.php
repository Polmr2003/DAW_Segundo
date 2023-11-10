<?php

	// Incluimos el archivo con la definicion de la Interface usada:
	require_once("iGenero.php");

	class Persona implements iGenero
	{

		// Propiedades
        private $nombre	   = null;
        private $apellidos = null;
		private $genero    = null;

		// Constructor:
        function __construct()
        {

        }

		// Metodos:

        function getNombre() {
            return $this->nombre;
        }

        public function setNombre( $nombre ) {
            $this->nombre = $nombre;
        }

        public function getApellidos() {
            return $this->apellidos;
        }

        public function setApellidos( $apellidos ) {
            $this->apellidos = $apellidos;
        }

		// Metodos obligatorios segun la interface (si se elimina alguno se generara un error):

        public function getGenero() {
            return $this->genero;
        }

        public function setGenero( $genero ) {
            $this->genero = $genero;
        }

	}

?>

