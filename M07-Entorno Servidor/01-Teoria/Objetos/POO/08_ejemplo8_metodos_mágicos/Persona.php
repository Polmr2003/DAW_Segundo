<?php
    class Persona
    {
        // Propiedades
        private $nombreCompleto = null;

        // Constructor:
         function __construct() {
            echo "<p>En el Constructor de la Clase [".get_class($this)."]</p>";
        }

        // El Constructor también puede hacerse así (con el mismo nombre del Clase):
         function Persona() {
            echo "<p>No entraremos aquí puesto que existe __construct()</p>";
        }

        // Destructor:
         function __destruct() {
            echo "<p>En el Destructor de la Clase [".get_class($this)."]</p>";
        }
        
        // Métodos:
        public function getNombreCompleto() {
            return $this->nombreCompleto;
        }
        public function setNombreCompleto( $nombreCompleto ) {
            $this->nombreCompleto = $nombreCompleto;
        }
         public function __toString() {
            return "el nombre de la persona es: [".strtolower($this->getNombreCompleto())."]";
        }
    }
?>