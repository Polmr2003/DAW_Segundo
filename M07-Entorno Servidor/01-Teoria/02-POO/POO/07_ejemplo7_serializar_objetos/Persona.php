<?php
    class Persona
    {
        // Propiedades
        private $nombre    = null;
        private $apellidos = null;

        // Constantes:
        const PERSONA_HOMBRE = "HOMBRE";
        const PERSONA_MUJER  = "MUJER";
        
        // Constructor:
        function Persona() {
        }
        
        // Métodos:
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