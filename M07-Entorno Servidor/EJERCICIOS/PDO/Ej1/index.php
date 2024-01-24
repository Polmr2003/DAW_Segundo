<?php

// Servidor MySQL
$servidor = "localhost";

// Datos de usuario
$usuario = "root";
$password = "";

// Creamos un try catch para capturar los errores i mostrarlos
try {
    // Creamos la instancia de la conexion a la base de datos con los datos que hemos declarado antes
    $conexion = new PDO("mysql:host=$servidor;dbname=prueba", $usuario, $password);

    // creamos los atributos para que lance excepciones cuando ocurran errores en las consultas a la base de datos || ATTR_ERRMODE-> modo de manejo de errores || ERRMODE_EXCEPTION -> en caso de error, se lanzará una excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si se a realizado la conexion con exito aparecera este mensaje
    echo "Conexion con exito";

} catch (PDOException $ex) {
    // Si a habido algun error en el contenido de el try aparecera este mensaje
    echo "Conexion con exito " . $ex->getMessage();
}

$conexion = null;

?>