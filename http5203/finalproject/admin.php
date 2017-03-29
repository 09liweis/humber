<?php

require 'Database.php';
require 'API.php';
require 'Event.php';

$api = new API();
$data = $api->getData();

$event = new Event(Database::dbConnect());
$event->insertEvents($data);

?>