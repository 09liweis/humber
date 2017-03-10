<?php

class Office {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getCountries() {
        $sql = "SELECT DISTINCT(country) FROM offices";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->execute();
        $countries = $pdostmt->fetchAll();
        return $countries;
    }
    
    public function getOfficesByCountry($country) {
        $sql = "SELECT * FROM offices WHERE country = :country";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':country', $country, PDO::PARAM_STR);
        $pdostmt->execute();
        $offices = $pdostmt->fetchAll();
        return $offices;
    }
}