<?php

class agenda
{
    private $nombre;
    private $apellidos;
    private $fecha_de_nacimiento;
    private $email;

    function __construct($nombre, $apellidos, $fecha_de_nacimiento)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fecha_de_nacimiento = $fecha_de_nacimiento;
        $this->email = "";
    }

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
        $this->fecha_de_nacimiento = $miFecha_de_nacimiento;
    }

    function getFecha_de_nacimiento()
    {
        return $this->fecha_de_nacimiento;
    }

    function setEmail(string $miEmail)
    {
        $edad = $this->calcularEdad(); // Utiliza $this para referenciar al objeto actual

        if ($edad >= 18) {
            $this->email = $miEmail;
        } else {
            $this->email = "menor de edad";
        }
    }

    function getEmail()
    {
        return $this->email;
    }

    function calcularEdad()
    {
        // Formatear la cadena a tipo Date con el formato día/mes/año
        $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $this->fecha_de_nacimiento);

        // Crear una variable que almacena la fecha actual
        $hoy = new DateTime();

        // Calcular la edad usando el método diff de DateTime
        $edad = $hoy->diff($fechaNacimiento);

        // Devolver solo el componente de años de la diferencia (y) || y -> year, m -> month, d -> day
        return $edad->y;
    }
}

?>