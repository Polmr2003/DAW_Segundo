<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

header('Content-Type: text/plain', true);

//PHP is an implicity Typed language.
//But you cab Explicit types in function declarations

//Funcion PrintLn
//-----------------------
function println($something){
    echo "$something\n";
};

//To do: Add 2 ints
//--------------------------------
function sum_ints(int $num1 , int $num2 ): int /* Para decirle que lo que devuelva la funcion sea un int, PERO NO HACE FALTA PONERLO*/{
    return $num1 + $num2;
}

//To do: Add 2 float
//--------------------------------
function sum_float(float $num1 , float $num2 ): float /* Para decirle que lo que devuelva la funcion sea un float*/{
    return $num1 + $num2;
}

//To do: Add 2 String + return
//--------------------------------
function Add_newline(string $text): string /* Para decirle que lo que devuelva la funcion sea un String*/{
    return $text;
}


//Main Function
//---------------------------------
function main(): void{
    //Local vars
    $sum_ints = sum_ints(3, 1);
    $sum_float = sum_float(3.8, 1.2);

    //Print
    println("$sum_ints");
    println("var_dump:");
    var_dump($sum_ints);

    println("$sum_float");
    println("var_dump:");
    var_dump($sum_float);

    println(Add_newline("hola"));
}

//Web code
//---------------------------
main();
?>