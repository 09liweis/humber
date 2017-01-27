<?php

$country = array('Canada', 'US', 'China');

$country[6] = 'India';

echo $country[1];

// for ($i = 0; $i < count($country); $i++) {
//     echo "<li>" . $country[$i] . "</li>";
// }

foreach($country as $index => $c) {
    echo $c . '<br/>';
}

$number = [1, 2, 3, 5];

$students = array(
    array('Sam', 'weisen.li@hotmail.com', 'n01197743'),
    array('Sam', 'weisen.li@hotmail.com', 'n01197743'),
    array('Sam', 'weisen.li@hotmail.com', 'n01197743')
);

echo $students[1][1];

foreach($students as $student) {
    echo $info[0] . '<br/>';
}

$student = array('name' => 'Sam', 'email' => 'weisen.li@hotmail.com', 'stunum' => 'n01197743');

echo $student['name'];

$products = array(
    array('name' => 'Apple', 'description' => 'fruit', 'price' => 3.34),
    array('name' => 'Pear', 'description' => 'fruit', 'price' => 3.14),
    array('name' => 'Orango', 'description' => 'fruit', 'price' => 3.24),
);

foreach($products as $product) {
    echo $product['name'] . $product['description'] . $product['price'];
}