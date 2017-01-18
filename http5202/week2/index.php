<?php

$age = 35;
$msg;

if ($age < 12) {
    $msg = "child";
} elseif ($age >= 11 && $age < 19) {
    $msg = "teen";
} else {
    $msg = "adult";
}

var_dump($msg);

?>