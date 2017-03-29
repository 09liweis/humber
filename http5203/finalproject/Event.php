<?php

class Event {
    private $db;
    private $apiDomain = "http://app.toronto.ca";

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getEvents() {
        $sql = "SELECT * FROM events";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->execute();
        $events = $pdostmt->fetchAll();
        return $events;
    }
    
    // public function getOfficesByCountry($country) {
    //     $sql = "SELECT * FROM offices WHERE country = :country";
    //     $pdostmt = $this->db->prepare($sql);
    //     $pdostmt->bindValue(':country', $country, PDO::PARAM_STR);
    //     $pdostmt->execute();
    //     $offices = $pdostmt->fetchAll();
    //     return $offices;
    // }
    
    public function insertEvents($events) {
        foreach ($events as $event) {
            $this->insertEvent($event);
        }
    }
    
    public function insertEvent($event) {
        $calEvent = $event["calEvent"];
        
        $name = $calEvent["eventName"];
        $description = $calEvent["description"];
        
        $location = $calEvent["locations"][0]["locationName"];
        $address = $calEvent["locations"][0]["address"];
        $lat = $calEvent["locations"][0]["coords"]["lat"];
        $lng = $calEvent["locations"][0]["coords"]["lng"];
        
        $startDate = $calEvent["startDate"];
        
        if (isset($calEvent["thumbImage"])) {
            $thumbImage = $this->apiDomain . $calEvent["thumbImage"]["url"];
        } else {
            $thumbImage = "";
        }
        
        if (isset($calEvent["image"])) {
            $image = $this->apiDomain . $calEvent["image"]["url"];
        } else {
            $image = "";
        }
        
        $sql = "INSERT INTO events (name, 
                                    address, 
                                    location, 
                                    lat, 
                                    lng, 
                                    description, 
                                    startDate, 
                                    thumbImage, 
                                    image) 
                                    VALUES (
                                        :name, 
                                        :address, 
                                        :location, 
                                        :lat, 
                                        :lng, 
                                        :description, 
                                        :startDate, 
                                        :thumbImage, 
                                        :image)";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->bindValue(':address', $address, PDO::PARAM_STR);
        $pdostmt->bindValue(':location', $location, PDO::PARAM_STR);
        $pdostmt->bindValue(':lat', $lat, PDO::PARAM_STR);
        $pdostmt->bindValue(':lng', $lng, PDO::PARAM_STR);
        $pdostmt->bindValue(':description', $description, PDO::PARAM_STR);
        $pdostmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $pdostmt->bindValue(':thumbImage', $thumbImage, PDO::PARAM_STR);
        $pdostmt->bindValue(':image', $image, PDO::PARAM_STR);
        $pdostmt->execute();
    }
    
    public function addDinosaur($name, $color) {
        $sql = "INSERT INTO dinosaurs (name, color) VALUES (:name, :color)";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->bindValue(':color', $color, PDO::PARAM_STR);
        //$pdostmt->execute(['name' => $name, 'color' => $color]);
        return $pdostmt->execute();
    }
    
    public function updateDinosaur($id, $name, $color) {
        $sql = "UPDATE dinosaurs SET name = :name, color = :color WHERE id = :id";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->bindValue(':color', $color, PDO::PARAM_STR);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_STR);
        return $pdostmt->execute();
    }
}