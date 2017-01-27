<?php

function greet() {
    $name = 'Sam';
    global $age;
    $age = 25;
    echo 'Hello word';
}

greet();
echo $age;

function add(&$num1, $num2) {
    return $num1 + $num2;
}

//variable function
$hello = function() {
    return 'Anonymous functions';
};

//call after initial
echo $hello;

$a = 4;
$b = 5;
$result = add($a, $b);

echo '<br /> Result: ' . $result . '<br />';