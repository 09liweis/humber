<?php
$navigations = array(
    array('name' => 'Home', 'url' => '#'),
    array('name' => 'About', 'url' => '#'),
    array('name' => 'Service', 'url' => '#'),
    array('name' => 'Porfolio', 'url' => '#'),
    array('name' => 'Contact', 'url' => '#')
);

function display_navigation($navigations) {
    $navigationsHTML = '<ul>';
    foreach($navigations as $navigation) {
        $navigationsHTML .= '<li><a href="' . $navigation["url"] . '">' . $navigation["name"] . '</a></li>';
    }
    $navigationHTML .= '</ul>';
    return $navigationsHTML;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lab 3</title>
        <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        <header class="wrapper">
            <img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Logo_TV_2015.png" alt="logo"/>
            <p id="contact"><?php echo display_navigation($navigations)?></p>
        </header>
        <main class="wrapper">