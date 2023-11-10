<?php

//EJEMPLO1: Crear o definir una clase

class agenda
{
    //Variables o atributos

    private $nombre;
    private $apellidos;
    private $fecha_de_nacimiento;
    private $email;

    //cConstructor
    function __construct($nombre, $apellidos, $fecha_de_nacimiento)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fecha_de_nacimiento = $fecha_de_nacimiento;
        $this->email = "" ;
    }
    //Funciones o métodos GETTERS & SETTERS

    function setNombre($miNombre)
    {
        $this->nombre = $miNombre;
    }

    function getNombre()
    {
        return $this->nombre;
    }


    function setApellidos($miApellidos)
    {
        $this->apellidos = $miApellidos;
    }


    function getApellidos()
    {
        return $this->apellidos;
    }


    function setFecha_de_nacimiento($miFecha_de_nacimiento)
    {
        $this->miFecha_de_nacimiento = $miFecha_de_nacimiento;
    }


    function getmiFecha_de_nacimiento()
    {
        return $this->fecha_de_nacimiento;
    }


    function setEmail($miEmail)
    {
        $this->email = $miEmail;
    }


    function getEmail()
    {
        return $this->email;
    }
}

?>