<?php

require_once __DIR__ .'/vendor/autoload.php';
const CLIENT_ID = '433300294368-sp6f150psm0akdkomhn80laqqmd5fukh.apps.googleusercontent.com';
const CLIENT_SECRET = '1QwJraMuCR0FG8mexKoLXhl-';

if ($_SERVER['HTTP_HOST'] == 'humber-assignment-a09liweis.c9users.io') {
    $redirectURL = 'https://humber-assignment-a09liweis.c9users.io/http5203/a3/index.php';
} else {
    $redirectURL = 'https://http5203-assignment3.herokuapp.com/';
}


session_start();

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectURi($redirectURL);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

if(isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}

if(isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location:' . $redirectURL);
}

if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
    $client->setAccessToken($_SESSION['access_token']);
    $me = $plus->people->get('me');
    
    $_SESSION['username'] = $me->displayName;
    $_SESSION['profileimage'] = $me->image->url;
} else {
    $authUrl = $client->createAuthUrl();
}

if (isset($_POST['pickroom'])) {
    $_SESSION['roomid'] = $_POST['roomid'];
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat Room</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <h1>Assignment 3</h1>
            <?php if (isset($authUrl)) {?>
            <a href="<?=$authUrl?>" class="btn btn-primary">Login with Google+</a>
            <?php } else if (isset($_SESSION['roomid'])) { ?>
            <form method="POST" action="index.php">
                <input type="submit" name="logout" value="Logout" class="btn btn-danger" />
            </form>
            <h2>Start Chating: <?=$_SESSION["username"]?></h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Room <?=$_SESSION["roomid"]?></h3>
                </div>
                <div class="panel-body" id="messages">
                    
                </div>
            </div>
            <form method="POST" name="submitmsg" id="submitmsg">
                <div class="form-group">
                    <label for="content">message</label>
                    <input type="text" class="form-control" id="content" name="content" />
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Submit" />
            </form>
            <?php } else if (isset($_SESSION['username'])) {?>
            <form method="POST">
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
                <input type="submit" name="pickroom" value="Pick Room" class="btn btn-primary"/>
            </form>
            <?php } ?>
        </div>
    </body>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="script.js"></script>
</html>