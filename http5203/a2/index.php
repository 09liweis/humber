<?php

session_start();

$room = simplexml_load_file("room.xml");

$messages = $room->xpath('//room/message');

if (isset($_POST['submit'])) {
    
    if (isset($_POST["username"])) {
        $_SESSION["username"] = $_POST["username"];
    } else {
        $content = $_POST['content'];
        $username = $_SESSION["username"];
        $submissiontime = date("Y-m-d H:i:s");
    
        $message = $room->addChild("message");
        $message->addAttribute("roomid", "1");
        
        $message->addChild("content", $content);
        $message->addChild("username", $username);
        $message->addChild("submissiontime", $submissiontime);
        
        
        $room->saveXML("room.xml");
    }
    
    $messages = $room->xpath('//room/message');
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat Room</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Assignment 2</h1>
            <?php if (isset($_SESSION["username"])) {?>
            <h2>Start Chating: <?=$_SESSION["username"]?></h2>
            
            <form method="POST" action="index.php">
                <div class="form-group">
                    <label for="content">message</label>
                    <input type="text" class="form-control" id="content" name="content" />
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Submit" />
            </form>
            <?php } else { ?>
            <form method="POST">
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" name="username" class="form-content" id="username" />
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-default" />
            </form>
            <?php } ?>
        </div>
    </body>
</html>