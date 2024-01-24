<html>
<head>
<title>Pruebas</title>
</head>
<body>
<?php
class Operacion {
	//tiene 3 atributos
	protected $valor1;//lo presta a cualquier hijo
	protected $valor2;//lo presta a cualquier hijo
	private $resultado;//no se deja a las clase hijas
	
	public function cargar1($v)
	{
		$this->valor1=$v;
	}
	public function cargar2($v)
	{
		$this->valor2=$v;
	}
	public function imprimirResultado()
	{
		echo $this->resultado.'<br>';
	}
}


class Suma extends Operacion{
	
	private $resultado;//atributo de la clase suma
	
	public function operar()
	{
		$this->resultado=$this->valor1+$this->valor2;
	}
	public function imprimirResultado()
	{
		echo "La suma de $this->valor1 y $this->valor2 es:";
		parent::imprimirResultado();
	}
}


class Resta extends Operacion{
	public function operar()
	{
		$this->resultado=$this->valor1-$this->valor2;
	}
	public function imprimirResultado()
	{
		echo "La diferencia de $this->valor1 y $this->valor2 es:";
		parent::imprimirResultado();
	
	}
}
$suma=new Suma();
$suma->cargar1(10);
$suma->cargar2(10);
$suma->operar();
$suma->imprimirResultado();
//Es crida el mètode imprimirResultado de la classe Suma





?>
</body>
</html>
