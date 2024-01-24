<?php
// Definimos la clase
class Coche{
     
    // Atributos
    private $color;
    private $modelo = "BMW Generico";
    private $velocidad=0;
     
    //Métodos
    public function getColor(){
 
          // Con el operador $this le decimos que busque el atributo     color en esta clase
        return $this->color;
    }
     
    public function setColor($color){
        $this->color = $color;
    }
     
    public function acelerar(){
        echo "<br/> acelerando.... ";
        $this->velocidad++;
    }
     
    public function frenar(){
        $this->velocidad--;
    }
     
    public function getVelocidad(){
        return $this->velocidad;
    }
}
