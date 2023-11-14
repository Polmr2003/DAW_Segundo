<?php
//_______________funciones______________________________
//------------------------------------------------------

function myHeader()
{
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pizza planet</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    CABECERA;

    echo $head;
}

function myMenu()
{
    $menu = <<<MENU
    <nav id="menu">
    <div class="logo">
    <img src="../images/logoPizzaplanet.png" width="70" height="70">
    </div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Login.php">Login</a></li>
    </ul>
    </nav>
    <br>
    MENU;

    echo $menu;
}


/**
 * Limpiar los datos introducidos por el usuario
 * @param $data - datos del formulario
 * @return $data - dato limpio
 */
function limpiarDatosFormulario($data)
{
    $data = trim($data); //eliminar los caracteres innecesarios (espacio adicional, tabulación, nueva línea)
    $data = stripslashes($data); //eliminar las barras invertidas (\)
    $data = htmlspecialchars($data); //evita que el usuario ponga codigo html, convierte la cadena que ponga el usuario en html
    return $data;
}

/**
 * $someting - es la frase que queremos mostrar
 * return - con el return retornamos la frase con \n para que nos haga un salto de linea
 */
function println($something): string
{
    return "$something\n";
};


function start_session()
{
    return session_start();
};

function remove_session()
{
    // destroy the session
    return session_destroy();
};

function remove_var_session()
{
    // remove all session variables
    return session_unset();
};
