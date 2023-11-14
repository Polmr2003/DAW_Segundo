<?php
header('Content-Type: text/plain', true); //para que respete el texto plano i se ponga como lo hemos puesto aqui

/*
Define functions with the 'Function' keyword
*/

//PHP Functions
//-------------


//Print Line. appends an EOL at the end
//-------------------------------------
function println($something){
    echo "$something\n";
};

//Main
//--------------------------------------
println("Good morning!!!");

//Global variables
//-----------------
$its_ok = true; //bool
$num= 23; //int
$price = 56.25; // float
$text = "Hola"; //string

?>