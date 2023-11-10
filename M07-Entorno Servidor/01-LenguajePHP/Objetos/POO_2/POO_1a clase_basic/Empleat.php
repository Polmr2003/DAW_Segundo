<?php

class Empleat{

//atributs
private $nom;
private $sou;

//getter i setters = accessors dels atributs

public function getNom(){
    return $this->nom;
}
public function setNom($nom){
    $this->nom=$nom;
}

public function getSou(){
    return $this->sou;
}
public function setSou($sou){
    $this->sou=$sou;
}
public function __construct($nom,$sou=1000){
    $this->nom=$nom;
    $this->sou=$sou;
}
public function toPrint(){
    echo "El teu nom és ".$this->nom." i el teu sou és ".$this->sou . "</br>";
}



}




?>