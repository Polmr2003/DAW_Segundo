<?php
     require_once("Persona.php");

    session_start();  // Continuar la sesión
    
    if( isset($_SESSION['usuario']) == true )
    {
        echo "COMPROBAR LOS VALORES<br />";
        echo "=======================<p />";

        echo "Objeto serializado:<p/>";
        echo $_SESSION['usuario']."<br/>";
        echo "------------------------<p/>";
         $_SESSION['usuario'] = unserialize($_SESSION['usuario']);
        
        echo "Conversión a Objeto correcta:<p/>";
        print_r( $_SESSION['usuario'] );
        echo "<p>------------------------</p>";
        
        // Mostrar información del objeto en la sesión:
        echo "Nombre: [".$_SESSION['usuario']->getNombre()."]<br/>";
        echo "Apellidos: [".$_SESSION['usuario']->getApellidos()."]<p/>";
    }
    else
    {
        echo "<p>No has pasado por la página principal</p>";
    }
    echo "<a href='serializar_objetos1.php'>Volver a la página principal</a>";
?>