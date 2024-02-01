<?php

	class Clase1
	{

		public $variable_1 = "CLASE1";
		const CONSTANTE_1 = 11;
		static $variable_estatica_1 = 22;
		static $variablex = "*****";

		function __construct()
		{
	
		}

		public function metodo_publico() {
			echo "Estoy en el método publico de 'Clase1', la variable vale [".$this->variable_1."] y la variable estatica vale[".self::$variable_estatica_1."]<br />";
		}

		static function metodo_estatico() {
			echo "Estoy en el metodo estatico de 'Clase1', la variable estatica vale[".self::$variable_estatica_1."] (no se puede acceder a la propiedad publica).<br />";
		}

	}

	// ----------------------------------

	class Clase2 extends Clase1
	{

		public $variable_2 = "CLASE2";
		const CONSTANTE_2  = 33;
		static $variable_estatica_2 = 44;
		static $variablex = "-----";

		function __construct()
		{
			
		}

		public function mostrar() 
		{

			echo "Accediendo a la constante de 'Clase1' desde 'Clase2', usando el nombre de 'Clase1' (::) -> [".Clase1::CONSTANTE_1."]<br />";
			echo "Accediendo a la variable estatica de 'Clase1' desde 'Clase2', usando el nombre de 'Clase1' (::) -> [".Clase1::$variable_estatica_1."]<br />";
			echo "Accediendo a la variable estatica que se repite, desde 'Clase2' usando el nombre de 'Clase1' (::) -> [".Clase1::$variablex."]<p />";

			echo "<p>----------------------------------------------</p>";

			echo "Accediendo a la constante de 'Clase1' desde 'Clase2' (parent) -> [".parent::CONSTANTE_1."]<br />";
			echo "Accediendo a la variable estatica de 'Clase1' desde Clase2' (parent) -> [".parent::$variable_estatica_1."]<br />";
			echo "Accediendo a la variable estatica que se repite, en 'Clase1' desde 'Clase2' (parent) -> [".parent::$variablex."]<p />";

			echo "<p>----------------------------------------------</p>";

			parent::metodo_publico();
			parent::metodo_estatico();

			echo "<p>----------------------------------------------</p>";

			echo "Accediendo a la variable estatica de 'Clase1' desde Clase2' (self) -> [".self::$variable_estatica_1."]<br />";
			echo "Accediendo a la variable estatica que se repite, desde 'Clase2' (self) -> [".self::$variablex."]<p />";

			echo "<p>----------------------------------------------</p>";

			echo "Accediendo a la variable de 'Clase2' (this) -> : [".$this->variable_2."]<br />";
			echo "Accediendo a la constante de 'Clase2' (self) -> [".self::CONSTANTE_2."]<br />";
			echo "Accediendo a la variable estatica de 'Clase2' (self) -> [".self::$variable_estatica_2."]<br />";
			echo "Accediendo a la variable estatica que se repite, desde 'Clase2' (self) -> [".self::$variablex."]<br />";

			echo "<p>----------------------------------------------</p>";

			echo "<p><b>NOTA</b>: si usamos 'self' para acceder a miembros que no existen en la clase actual pero si en su clase padre,<br/> se accedera tambien a ellos:</p>";

			echo "Accediendo a la constante de 'Clase1' desde 'Clase2' (self) -> [".self::CONSTANTE_1."]<br />";
			self::metodo_publico();
			self::metodo_estatico();

		}

	}

	// ----------------------------------

	$objeto = new Clase2();
	$objeto->mostrar();

?>