<?php
declare(strict_types=1);

// Associative Arrays
// ------------------

// PHP arrays are ordered maps.
// Alternative names for map: hash table, dictionary.

// Maps associate keys to values.
// - Keys:   Can be only ints or strings (in PHP).
// - Values: Can be any type.

// PHP naming:
// - When keys are ints, maps are called 'Indexed Arrays'.
// - When keys are strings, maps are called 'Associative Arrays'.

// But in the end, there is only ONE type: 'array' (map).
// It's unusual to call maps 'array'.
// PHP arrays are completely different from C/Java arrays!

// In this file we'll examine Associative Arrays.


// Print Line. Appends an EOL at the end
// --------------------------------------------------------------------
function println($something): void {
	echo $something . '<br>';
}

// --------------------------------------------------------------------
function show_associative_array_basics(): void {

    println("Empty array:");
    $empty_array = array();
    $empty_array = [];
    print_r($empty_array);


    println("Array construction, allows trailing coma:");
    $grades = ['John' =>  7,
               'Mary' => 10,
               'Lucy' =>  8,
               'Ryan' =>  4,
              ];
    print_r($grades);


    println("Get array size:");
    $size = count($grades);
    println($size);


    println("Access array values by key:");
    println("John: " . $grades['John']);
    println("Lucy: " . $grades['Lucy']);


    println("Overwrite value:");
    $grades['Ryan'] = 6;
    print_r($grades);


    println("Add key => value pair:");
    $grades['Aria'] = 9;
    print_r($grades);


    // Access to inexistent key will generate a warning only
    // println($grades['Jack']);
    // println("Key error, but PHP will continue executing the code!");

}

// --------------------------------------------------------------------
function show_associative_array_nulls(): void {

    $grades = ['John' =>  7];

    println("Null key becomes '':");
    $grades[null] = 0;
    print_r($grades);


    println("Null values are allowed:");
    $grades['Sven'] = null;
    print_r($grades);
    var_dump($grades['Sven']);

}

// --------------------------------------------------------------------
function show_associative_array_unset(): void {

    $grades = ['John' =>  7,
               ''     => 10,
               'Aria' =>  8,
               'Sven' =>  4,
              ];


    // You can remove a pair of (key, value) using its key
    // unset() looks like a function, but it's a keyword!
    // https://www.php.net/manual/en/reserved.keywords.php
    // That's why it works. If it were a regular function it would not!
    println("Remove association (key, value pair):");
    unset($grades['']);
    unset($grades['Aria']);
    unset($grades['Sven']);
    print_r($grades);

}

// --------------------------------------------------------------------
function show_associative_array_keys_and_values(): void {

    $grades = ['John' =>  7,
               'Mary' => 10,
               'Lucy' =>  8,
               'Ryan' =>  4,
              ];


    println("Get all keys in insertion order:");
    $keys = array_keys($grades);
    print_r($keys);


    println("Get all values in insertion order:");
    $values = array_values($grades);
    print_r($values);

}

// --------------------------------------------------------------------
function show_associative_array_concatenation(): void {

    $grades = ['John' =>  7,
               'Mary' => 10,
               'Lucy' =>  8,
               'Ryan' =>  4,
              ];


    println('Concatenate pair (key, value) at the beginning of array:');
    $grades = ['Aria' => 10] + $grades;
    print_r($grades);


    println('Concatenate pair (key, value) at the end of array:');
    $grades = $grades + ['Luke' => 10];
    print_r($grades);


    println('Concatenating an existing key does not change order nor value:');
    $grades = $grades + ['Aria' => 5];
    print_r($grades);


    println('array_merge() does the same as + but overwrites:');
    $grades = array_merge($grades, ['Nora' => 6]);
    print_r($grades);


    println('The spread ... operator does the same:');
    $additional_grades = ['Levi' => 5, 'Lily' => 4,];
    $grades = [...$grades, ...$additional_grades];
    print_r($grades);


    // Splice: Add pairs in the middle of an associative array.
    // https://stackoverflow.com/questions/2149437/how-to-add-an-array-value-to-the-middle-of-an-associative-array


    // array_merge() is the preferred way:
    // - Overwrites values in associative arrays
    // - Reindexes indexed arrays

}

// --------------------------------------------------------------------
function show_associative_array_queries(): void {

    $grades = ['John' =>  7,
               'Mary' => 10,
               'Lucy' =>  8,
               'Ryan' =>  4,
              ];


    println('array_key_exists():');
    if (array_key_exists('Luke', $grades)) {println('The student Luke is in the array.'); }


    println('in_array():');
    if (in_array('10', $grades)) {println('Somebody got a 10.'); }

}

// TESTING ------------------------------------------------------------------
show_associative_array_basics();
show_associative_array_nulls();
show_associative_array_unset();
show_associative_array_keys_and_values();
show_associative_array_concatenation();
show_associative_array_queries();
// --------------------------------------------------------------------
