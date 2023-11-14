<?php

// datos de usuarios logeados
$datos_login = [
    'usuario1'=> 'pass1',
    'usuario2'=> 'pass2',
    'usuario3'=> 'pass3'
];

// $data_login=[
//     'nombre_usu' => $_POST["nombre_usu"],
//     'Contraseña_usu' => $_POST["Contraseña_usu"]
// ];

// //Datos del formulario
// $datos_formulario = [
//     'nombre' => $_POST["nombre"],
//     'apellidos' => $_POST["apellidos"],
//     'telefono' => $_POST["telefono"],
//     'direccion' => $_POST["direccion"],
//     'correo_electronico' => $_POST["correo"]
// ];


//Validación campos
$fields = [
    'nombre' => 'required | min: 2,  max:255',
    'apellidos' => 'required | min: 2, max: 255',
    'direccion' => 'required | alphanumeric | min: 10, max:255',
    'telefono' => 'required | min: 9,  max:9',
    'correo_electronico' => 'email',
];


//Mensajes de error
const DEFAULT_VALIDATION_ERRORS = [ 
    'required' => 'Este campo %s obligatorio', // %s para formatear el array i poner lo que queramos
    'email' => 'El %s es invalido',
    'min' => 'El minimo del campo %s es de %s caracteres',
    'max' => 'El maximo del campo %s es de %s caracteres',
    'alphanumeric' => 'Este campo %s solo acepta letras i caracteres',
];
