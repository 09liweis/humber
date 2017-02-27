<?php

require_once 'user.php';

$myadmin = new Admin('section', 'Sam', 'weisen.li@hotmail.com');
echo $myadmin->getName();