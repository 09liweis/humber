<?php

session_start();
$room = simplexml_load_file("room.xml");
$messages = $room->xpath('//room/message');

$roomid = isset($_SESSION['roomid']) ? $_SESSION['roomid'] : '1';

if (isset($_SESSION['username'])) {
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $username = $_SESSION["username"];
        $submissiontime = date("Y-m-d H:i:s");
        
        $message = $room->addChild("message");
        $message->addAttribute("roomid", $roomid);
        
        $message->addChild("content", $content);
        $message->addChild("username", $username);
        $message->addChild("submissiontime", $submissiontime);
        
        
        $room->saveXML("room.xml");
        $messages = $room->xpath('//room/message');   
    }
}

$results = array();

foreach($messages as $message) {
    if ($message->attributes()->roomid == $roomid) {
        $results[] = array(
            'username' => strval($message->username),
            'content' => strval($message->content),
        );
    }
}
//var_dump($results);
echo json_encode($results);