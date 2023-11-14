<!-- En determinadas ocasiones es posible que necesitemos serializar un Objeto para así por ejemplo 
guardarlo en un archivo de texto o en una tabla de una base de datos, 
o bien propagarlo en una sesión (necesario dependiendo de la configuración de PHP).

Para serializar un Objeto usaremos la función de PHP serialize(), 
que devuelve una cadena de texto con la representación del mismo, y para volverlo a convertir en un Objeto usaremos unserialize().

En el siguiente ejemplo serializamos un Objeto en PHP y lo pasamos en la sesión. -->

<?php
    require_once("Persona.php");
    // Iniciar la sesión
    session_start();

    // Crear una instancia del objeto:
    $objPersona = new Persona();
    $objPersona->setNombre("MARTINA");
    $objPersona->setApellidos("MARRERO MEDINA");

    // Variables de sesión:
     $_SESSION['usuario'] = serialize($objPersona);
     
    echo "PÁGINA PRINCIPAL<br />";
    echo "================<p />";
    echo "<a href='serializar_objetos2.php'>Ir a la otra página</a><br/>";
?>