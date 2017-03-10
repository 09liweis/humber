<?php

require "Database.php";
require "Office.php";

$db = Database::dbConnect();
$office = new Office($db);

$countries = $office->getCountries();
$country = "";

if (isset($_GET["country"])) {
    $country = $_GET["country"];
    $offices = $office->getOfficesByCountry($country);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Midterm</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php" method="GET">
                <div class="form-group">
                    <label for="country">Select a country</label>
                    <select name="country">
                        <option value="">Select a country</option>
                        <?php foreach($countries as $c) {?>
                        <option value="<?=$c["country"]?>" <?=($c["country"] == $country) ? "selected" : ""?> ><?=$c["country"]?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="List Offices" />
                </div>
            </form>
            <?php if(!empty($country)) {?>
            <h1>Locations: ABC Offices in <?=$country?></h1>
                <?php if (isset($offices) && count($offices) > 0) {
                    foreach($offices as $office) {
                ?>
                
                <div class="row">
                    <div class="col-xs-6">
                        <img class="img-responsive" src="<?=$office["photo"]?>" />
                    </div>
                    <div class="col-xs-6">
                        <p>Office Code: <?=$office["officecode"]?></p>
                        <p>Phone: <?=$office["phone"]?></p>
                        <p>Address: <?=$office["address"]?></p>
                        <p>City: <?=$office["city"]?></p>
                        <p>State: <?=$office["state"]?></p>
                        <p>Country: <?=$office["country"]?></p>
                        <p>Postal Code: <?=$office["postalcode"]?></p>
                    </div>
                </div>
                
                <?php
                    } 
                } 
                ?>
            <?php } ?>
        </div>
    </body>
</html>