<?php
require_once './0901-functions-structure.php';



//Función print Array Pretty with print_r
//------------------------------------------------------------------------------------------------------------

function print_Array_Pretty(mixed $array){
    echo "<pre>" . print_r($array, true) . "</pre>";
}

//Función imprime array CON FUNCIONES: PRINT_R Y VAR_DUMP
//------------------------------------------------------------------------------------------------------------
function printArrayByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '-----Testing functions by print_r($myArray) -------' . '</h2>');
    print_Array_Pretty($array);

    print('<h2>' .  '<br>' . '-----Testing functions by var_dump($myArray)-------' . '</h2>');
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}


// Print HTML code: HEADER & NAVBAR
myHeader();
myMenu();
?>

<body>
    <!-- Declaración de variables PHP-->
    <?php
    $arrayrrayIndexado = ["M06", "M07", "M08", "M09"];
    $arrayrrayAsociative1 = [
        "Asignaturas de primero" => "M01, M02, M03, M04, M05, M10, M11",
        "Asignaturas de segundo" => "M06, M07, M08, M09, M012, M13"
    ];
    $arrayrrayAsociative2 = [
        "Asignaturas de primero" => ["M01", "M02", "M03", "M04", "M05", "M10", "M11"],
        "Asignaturas de segundo" => ["M06", "M07", "M08", "M09", "M12", "M13"]
    ];
    ?>

    <!-- WEB Code-->
    <br><h1>TESTING AND LEARNING ABOUT PHP ARRAYS:</h1><hr><br>
    <h2>
        <<<<< Arrays print with PHP functions>>>>>
    </h2>
 
    <?php
    printArrayByPHPFunctions($arrayrrayAsociative1);

    //Print myFooter
    myFooter();
    ?>


</body>

</html>