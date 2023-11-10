<?php

	class Persona4
	{

		// Propiedades
        private $nombre    = null;
        private $apellidos = null;
		public  $provincia = null;
		public  $pais	   = "ESPAÑA";
		public  $importe   = 100;

		// Constantes:
		const PERSONA_HOMBRE = "HOMBRE";
		const PERSONA_MUJER  = "MUJER";

		// Constructor vacio:
        function __construct() {
        }

		// Metodos:

        function getNombre() {
            return $this->nombre;
        }

        function setNombre( $nombre ) {
            $this->nombre = $nombre;
        }

        private function getPais() {
            return $this->pais;
        }

		public function getPropiedades(){
			$aPropiedades1 = get_class_vars("Persona4");
			foreach( $aPropiedades1 as $nombre => $valor ){
				echo $nombre.": [".$valor."]<br/>";
			}
		}

	}

?>