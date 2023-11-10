
<?php

// Instanciar una clase externa
// A medida que vamos complicando nuestro desarrollo, se hace necesario separar en diferentes archivos 
//la lógica de nuestra programación, y de hecho esta será una de las bases para el patrón MVC que veremos más adelante.
// Así, el ejemplo anterior podría tener la clase Coche en un archivo diferente o archivo de clase, 
//la cual podríamos requerir y utilizar en cualquier otro archivo.

class Coche
{
    //Variables o atributos
    private $marca;
    private $modelo;
    private $color;
    private $propietario;

    function __construct($miMarca,$miModelo,$miColor,$miPropietario){
        $this->marca = $miMarca;
        $this->modelo = $miModelo;
        $this->color = $miColor;
        $this->propietario = $miPropietario;
    }

    //Funciones o métodos
    function setMarca($miMarca){
        $this->marca = $miMarca;
    }

    function getMarca(){
        return $this->marca;
    }

    function setModelo($miModelo){
        $this->modelo = $miModelo;
    }

    function getModelo(){
        return $this->modelo;
    }

    function setColor($miColor){
        $this->color = $miColor;
    }

    function getColor(){
        return $this->color;
    }

    function setPropietario($miPropietario){
        $this->propietario = $miPropietario;
    }

    function getPropietario(){
        return $this->propietario;
    }
}