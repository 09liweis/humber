<?php

require "Database.php";
require "Request.php";

$db = Database::dbConnect();
$request = new Request($db);

$products = $request->getProducts();


if (isset($_POST["btnsubmit"])) {

    if ($request->validate($_POST)) {
        $returnRequest = $request->addRequest($_POST);
    }
}


?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Request Information</title>
        <style>
            #body_wrap {margin: auto;width: 80%;padding: 20px;background-color: white;}
            body {background-color: bisque;}
            #error_block {background-color: lightgray;text-align: center;}
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <div id="body_wrap">
            <?php if(isset($returnRequest)) { ?>
            <div>
                <h2>You have submit your request successfully</h2>
                <p>First Name: <?=$returnRequest["firstname"]?></p>
                <p>Last Name: <?=$returnRequest["lastname"]?></p>
                <p>Postal Code: <?=$returnRequest["postalcode"]?></p>
                <p>Phone: <?=$returnRequest["phone"]?></p>
                <p>Email: <?=$returnRequest["email"]?></p>
                <p>Insurance Type: <?=$returnRequest["insrancetype"]?></p>
            </div>
            <?php } ?>
            
            <h1>Request for Information Form</h1>
            <b>To receive information on our products and services by email, please complete the form below.</b>
        <form method="post" action="index.php">
        <table>
            <tr>
                <td>First name</td>
                <td><input type="text" name="firstname" value="<?=$request->getFieldValue($_POST["firstname"])?>"/></td>
                <?php if ($request->validateField($_POST["firstname"])) { ?>
                <td class="error">You must fill in first name</td>
                <?php } ?>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input type="text" name="lastname" value="<?=$request->getFieldValue($_POST["lastname"])?>"/></td>
                <?php if ($request->validateField($_POST["lastname"])) { ?>
                <td class="error">You must fill in last name</td>
                <?php } ?>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="postalcode" value="<?=$request->getFieldValue($_POST["postalcode"])?>"/></td>
                <?php if ($request->validateField($_POST["postalcode"])) { ?>
                <td class="error">You must fill in postal</td>
                <?php } ?>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="phone" value="<?=$request->getFieldValue($_POST["phone"])?>"/></td>
                <?php if ($request->validateField($_POST["phone"])) { ?>
                <td class="error">You must fill in phone number</td>
                <?php } ?>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?=$request->getFieldValue($_POST["email"])?>"/></td>
                <?php if ($request->validateField($_POST["email"])) { ?>
                <td class="error">You must fill in email</td>
                <?php } ?>
            </tr>

            <tr>
                <td>Please send me<br> information on the <br> following product </td>
                <td>
                    <?php
                    $checked = true;
                    foreach ($products as $product) { ?>
                    <input type="radio" name="insrancetype" value="<?=$product["product"]?>" <?=($_POST["insrancetype"] != NULL && $_POST["insrancetype"] == $product["product"]) || $checked ? "checked" : ""?>  /> <?=$product["product"]?> <br />
                    <?php
                    $checked = false;
                    } ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="btnsubmit" value="Submit" /></td>
            </tr>
        </table>

        </div>
    </body>
</html>
