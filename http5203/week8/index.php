<?php

$xml = simplexml_load_file("people.xml");
$xml->addChild("person", "Hermions Granger");
$xml->saveXML("people.xml");
print_r($xml);

echo '<div>' . $xml->person[1]. '</div>';

//$xml2 = new SimpleXMLElement();