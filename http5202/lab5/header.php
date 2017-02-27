<?php
$listPage = "/http5202/lab5/list.php";
$addPage = "/http5202/lab5/form.php?action=add";
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Title</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="<?=$listPage?>">List</a>
                    <a class="mdl-navigation__link" href="<?=$addPage?>">Add</a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content">
