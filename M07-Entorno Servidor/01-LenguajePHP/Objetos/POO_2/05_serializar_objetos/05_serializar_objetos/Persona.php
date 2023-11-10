<?php

	class Persona
	{
        public $nombre    = null;
        public $apellidos = null;

        function __construct()
		{
        }

        function getNombre() {
            return $this->nombre;
        }

        function setNombre( $nombre ) {
            $this->nombre = $nombre;
        }

        function getApellidos() {
            return $this->apellidos;
        }

        function setApellidos( $apellidos ) {
            $this->apellidos = $apellidos;
        }
	}

?>
