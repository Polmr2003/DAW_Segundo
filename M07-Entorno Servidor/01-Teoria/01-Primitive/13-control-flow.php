<?php
declare(strict_types=1);

// Control Flow
// ------------

// PHP Conditionals:
// - if (...) {} else {} for simple conditions.
// - if (...) {} elseif (...) {} for multiple branches.
//   Avoid 'switch'. It's easy to forget the 'break' keyword.
// - There is a new syntax with colons, but it's less supported by editors.

// PHP Loops:
// - for() if you need to generate a list of numbers.
// - foreach() if you traverse an array.
// - Use 'break' when you need to terminate the loop.


// Print Line. Appends an EOL at the end
// --------------------------------------------------------------------
function println($something): void {
    echo $something . '<br>';
}

// --------------------------------------------------------------------
function show_conditionals(): void {

    println('Conditions in brackets, code in curly brackets:');
    $is_ok = true;
    if ($is_ok) { println('Is ok!'); }
    else        { println('Not ok.'); }


    println('Elseif is less error-prone than a switch:');
    $num = 3;
    if      ($num == 1) { println('Number 1'); }
    elseif  ($num == 2) { println('Number 2'); }
    elseif  ($num == 3) { println('Number 3'); }
    else                { println('Unknown number'); }

}

// --------------------------------------------------------------------
function show_loops(): void {

    $letter_array = ['a', 'b', 'c'];
    $grade_array  = ['John' =>  7, 'Mary' => 10, 'Lucy' =>  8, 'Ryan' =>  4];


    println('Use for() if you need to generate a list of numbers:');
    for($num = 1; $num <= 3; $num++) { println($num); }

    println('Use foreach() on indexed arrays. Keys are indexes, Values are elements.');
    foreach($letter_array as $value)         { println($value); }
    foreach($letter_array as $key => $value) { println("$key: $value"); }

    println('Use foreach() on associative arrays. Works like indexed arrays.');
    foreach($grade_array as $value)         { println($value); }
    foreach($grade_array as $key => $value) { println("$key: $value"); }

}

// --------------------------------------------------------------------
function show_search(): void {

    $grade_array = ['John' =>  7, 'Mary' => 10, 'Lucy' =>  8, 'Ryan' =>  4];


    println('While() loop example: Code is very long.');

    $index      = 0;
    $length     = count($grade_array);
    $name_array = array_keys($grade_array);

    $found      = false;
    $traversed  = ($index >= $length);
    $finished   = ($found or $traversed);

    while (!$finished) {

        // Get current name and grade
        $name  = $name_array[$index];
        $grade = $grade_array[$name];

        // Check if we found Lucy
        if ($name == 'Lucy') {
            println("Lucy's grade is $grade");
            $found = true;
        }

        // Update vars
        $index     += 1;
        $traversed  = ($index >= $length);
        $finished   = ($found or $traversed);
    }



    println('Foreach() + break example: Code is much shorter.');
    foreach($grade_array as $name => $grade) {
        if ($name == 'Lucy') { println("Lucy's grade is $grade"); break; }
    }



    println('Example without loops:');
    $lucy_found = array_key_exists('Lucy', $grade_array);
    if ($lucy_found) { println("Lucy's grade is " . $grade_array['Lucy']); }

}

// --------------------------------------------------------------------
show_conditionals();
show_loops();
show_search();
// --------------------------------------------------------------------
