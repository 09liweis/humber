<?php
require_once 'API.php';

$api = new API();
$events = $api->getData();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Events in Toronto</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div class="wrapper" id="app">
            <?php foreach ($events as $event) { ?>
            <div class="event">
                <div class="event__image">
                    <img src="http://app.toronto.ca<?=$event["calEvent"]["thumbImage"]["url"]?>" />
                </div>
                <div class="event__detail">
                    <h3><?=$event["calEvent"]["eventName"]?></h3>
                    <p><?=$event["calEvent"]["locations"][0]["locationName"]?></p>
                </div>
            </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </body>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>
    <!--<script type="text/javascript" src="index.js"></script>-->
</html>