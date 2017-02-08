<?php

$host = 'localhost';
$dbname = 'c9';
$dsn = "mysql:host=$host;dbname=$dbname";
$username = 'a09liweis';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM dinosaurs";
    $name = $_GET['name'];
    $name = "';drop table cd''";
    $sql = "SELECT * FROM dinosaurs WHERE name = :name";
    $pdostmt = $db->prepare($sql);
    $pdostmt->setFetchMode(PDO::FETCH_ASSOC);
    //$pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
    $pdostmt->execute(['name' => $name]);
    var_dump($pdostmt);
    
    // $pdostmt = $db->query($sql);
    // $pdostmt->setFetchMode(PDO::FETCH_ASSOC);
    // $dinosaurs = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
    $dinosaurs = $pdostmt->fetchAll();
    var_dump($dinosaurs);
    foreach ($dinosaurs as $d) {
        echo "<li>" . $d['name'] . "</li>";
        //echo "<li>" . $d->name . "</li>";
    }
    
} catch (PDOException $e) {
    echo $e->getMessage();
}