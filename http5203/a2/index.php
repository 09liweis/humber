<?php

session_start();

$room = simplexml_load_file("room.xml");

$messages = $room->xpath('//room/message');

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    
    if (isset($_POST["username"])) {
        $_SESSION["roomid"] = $_POST["roomid"];
        $_SESSION["username"] = $_POST["username"];
    } else {
        $content = $_POST['content'];
        $username = $_SESSION["username"];
        $submissiontime = date("Y-m-d H:i:s");
    
        $message = $room->addChild("message");
        $message->addAttribute("roomid", $_SESSION["roomid"]);
        
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Room <?=$_SESSION["roomid"]?></h3>
                </div>
                <div class="panel-body">
                    <?php foreach($messages as $message) {
                        if ($message->attributes()->roomid == $_SESSION["roomid"]) {
                    ?>
                    <div class="row">
                        <div class="pull-left col-md-12">
                            <h4><?=$message->username?></h4>
                            <p><?=$message->content?></p>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <form method="POST" action="index.php">
                <div class="form-group">
                    <label for="content">message</label>
                    <input type="text" class="form-control" id="content" name="content" />
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Submit" />
            </form>
            <form method="POST" action="index.php">
                <input type="submit" name="logout" value="Logout" class="btn btn-danger" />
            </form>
            <?php } else { ?>
            <form method="POST">
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" name="username" class="form-content" id="username" />
                </div>
                <div class="form-group">
                    Choose a Room
                    <div class="radio">
                        <label>
                        <input type="radio" name="roomid" value="1" checked>
                        Room 1
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="roomid" value="2">
                        Room 2
                        </label>
                    </div>
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-default" />
            </form>
            <?php } ?>
        </div>
    </body>
</html>