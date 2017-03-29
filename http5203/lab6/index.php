<?php
// -- ------------------------------------ -- //
// -- XML Lab 06                           -- //
// -- March 20, 2017                       -- //
// -- Done by Sam Weisen & Irfaan Auhammad -- //
// -- ------------------------------------ -- //

require_once __DIR__ .'/googlesignin/vendor/autoload.php';
const CLIENT_ID = '433300294368-sp6f150psm0akdkomhn80laqqmd5fukh.apps.googleusercontent.com';
const CLIENT_SECRET = '1QwJraMuCR0FG8mexKoLXhl-';
const REDIRECT_URI = 'https://humber-assignment-a09liweis.c9users.io/http5203/lab6';

session_start();

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectURi(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

if(isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}

if(isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect = 'https://humber-assignment-a09liweis.c9users.io/http5203/lab6';
    header('Location:' . $redirect);
}

if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
    $client->setAccessToken($_SESSION['access_token']);
    $me = $plus->people->get('me');
    
    $clientName = $me->displayName;
    $profileImage = $me->image->url;
} else {
    $authUrl = $client->createAuthUrl();
}

?>
<div>
    <?php
    if(isset($authUrl)) {
        echo "<a class='login' href='" . $authUrl . "'><img src='googlesignin/signin_button.png' height='50px' /></a>";
    }else {
        echo "Welcome, {$clientName}";
        echo "<br />";
        echo "<img src='{$profileImage}' />";
        echo "<br />";
        echo "<a href='?logout'><button>logout</button></a>";
    }
    
    ?>
</div>