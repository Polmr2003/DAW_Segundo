<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos los archivos que hemos creado para utilizar sus funciones
require_once './Funtions.php';
    myHeader(); 
    myMenu();

//funciones
start_session();
$_SESSION['visita']=0;
?>

<html>
<body>
    <?php
    //Function Main
    //----------------------------------------------------------------
    /**
     * $Title - cremaos la variable Title i guardamos el contenido en nuestro caso un titulo i un segundo titulo
     * echo - mostramos el Title para visualizar el contenido en nuestra paguina
     */
    function main(): void
    {
        //printamos el titulo
        echo(title());
        
        // Comprobar si la variable de sesión está definida
        if (isset($_SESSION['isset_normal_1'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            // Si está definida, sumar uno
            $_SESSION['isset_normal_1']++;
        } else {
            // Si no está definida, crearla e inicializarla en 1
            $_SESSION['isset_normal_1'] = 1;
        }

        //printamos las variables de sessiones i sus valores
        print_r($_SESSION);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>