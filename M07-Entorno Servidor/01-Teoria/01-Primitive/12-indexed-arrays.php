<?php
declare(strict_types=1);

// Indexed Arrays
// --------------

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

// In this file we'll examine Indexed Arrays.


// Print Line. Appends an EOL at the end
// --------------------------------------------------------------------
function println($something): void {
	echo $something . '<br>';
}

// --------------------------------------------------------------------
function show_indexed_array_basics(): void {

    println("Empty array:");
    $empty_array = array();
    $empty_array = [];
    print_r($empty_array);


    println("Array construction, allows trailing coma:");
    $letters = ['a', 'b', 'c',];
    print_r($letters);


    println("Get array size:");
    $size = count($letters);
    println($size);


    println("Access array values by index (key):");
    println("Index 0: $letters[0]");
    println("Index 1: $letters[1]");
    println("Index 2: $letters[2]");


    println("Overwrite element (value):");
    $letters[0] = 'z';
    print_r($letters);


    println("Append element (value) at the end of the array:");
    $letters[] = 'd';
    print_r($letters);


    println("Can insert values at a non-contiguous index (key):");
    $letters[-10] = 'w';
    print_r($letters);


    // Access to inexistent index will generate a warning only
    // println($letters[10]);
    // println("Index error, but PHP will continue executing the code!");

}

// --------------------------------------------------------------------
function show_indexed_array_nulls(): void {

    $letters = ['a', 'b', 'c',];

    println("Indexed arrays: Null index becomes the empty string:");
    $letters[null] = 'd';
    print_r($letters);
    var_dump(array_keys($letters));

    println("Indexed arrays: Can have a null value:");
    $letters[] = null;
    print_r($letters);

}

// --------------------------------------------------------------------
function show_indexed_array_unset(): void {

    $letters = ['a', 'b', 'c',];

    // Removing a value removes also its key (index)!
    // This clearly shows that indexed arrays are just associative arrays.
    // unset() looks like a function, but it's a keyword!
    // https://www.php.net/manual/en/reserved.keywords.php
    // That's why it works. If it were a regular function it would not!
    println("Remove element at key (index) 1:");
    unset($letters[1]);
    print_r($letters);

}

// --------------------------------------------------------------------
function show_indexed_array_keys_and_values(): void {

    $letters = ['a', 'b', 'c',];

    println("Get all indexes (keys) in insertion order:");
    $keys = array_keys($letters);
    print_r($keys);


    println("Get all elements (values) in insertion order:");
    $values = array_values($letters);
    print_r($values);

}

// --------------------------------------------------------------------
function show_indexed_array_reindexing_and_order(): void {

    $letters = ['a', 'b', 'c',];

    println("For reindexing an array, just reassign the array of values:");
    $letters = array_values($letters);
    print_r($letters);


    println("Insertion order decides order, not keys:");
    $unordered_array = [];
    $unordered_array[1] = 'b';
    $unordered_array[2] = 'c';
    $unordered_array[0] = 'a';
    $unordered_array[3] = 'd';
    print_r($unordered_array);
    println("Array_values:");
    print_r(array_values($unordered_array));

}

// --------------------------------------------------------------------
function show_indexed_array_concatenation(): void {

    $letters = ['a', 'b', 'c',];

    println('Unshift values to the right to prepend elements:');
    array_unshift($letters, 'x');
    print_r($letters);


    println('Shift values to the left to remove the first element:');
    array_shift($letters);
    print_r($letters);


    println('Push() to append an element at the end:');
    array_push($letters, 'x');
    print_r($letters);


    println('Pop() to remove last element:');
    array_pop($letters);
    print_r($letters);


    println('Concatenation with indexed arrays does not work due to repeated keys:');
    $a123 = [1,2,3];
    $a456 = [4,5,6];
    print_r($a123 + $a456);


    println('array_merge() resets the int indexes of the result, unlike +:');
    print_r(array_merge($a123, $a456));
    

    println('The spread ... operator does the same:');
    print_r([...$a123, ...$a456]);


    // array_merge() is the preferred way:
    // - Overwrites values in associative arrays
    // - Reindexes indexed arrays

}

// --------------------------------------------------------------------
function show_indexed_array_queries(): void {

    $letters = ['a', 'b', 'c',];

    println('array_key_exists():');
    if (array_key_exists(2, $letters)) {println('There is something at index 2.'); }


    println('in_array():');
    if (in_array('c', $letters)) {println('The arrays contains the letter c.'); }


    // Conclusion
    println("Conclusion: In PHP, indexed arrays are just associative arrays!");

}

// --------------------------------------------------------------------
show_indexed_array_basics();
show_indexed_array_nulls();
show_indexed_array_unset();
show_indexed_array_keys_and_values();
show_indexed_array_reindexing_and_order();
show_indexed_array_concatenation();
show_indexed_array_queries();
// --------------------------------------------------------------------
