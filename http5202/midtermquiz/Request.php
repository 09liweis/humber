<?php

class Request {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getProducts() {
        $sql = "SELECT * FROM insproducts";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->execute();
        $dinosaurs = $pdostmt->fetchAll();
        return $dinosaurs;
    }
    
    public function addRequest($request) {
        $firstname = $request["firstname"];
        $lastname = $request["lastname"];
        $postalcode = $request["postalcode"];
        $phone = $request["phone"];
        $email = $request["email"];
        $insrancetype = $request["insrancetype"];
        
        $sql = "INSERT INTO insrequests (fname, lname, postalCode, phone, email, insurance) VALUES (:firstname, :lastname, :postalcode, :phone, :email, :insrancetype)";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $pdostmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $pdostmt->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $pdostmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $pdostmt->bindValue(':email', $email, PDO::PARAM_STR);
        $pdostmt->bindValue(':insrancetype', $insrancetype, PDO::PARAM_STR);
        $pdostmt->execute();
        //print_r($pdostmt->errorInfo());
        return $request;
    }
    
    public function validate($request) {

        foreach ($request as $key => $value) {

            if (empty($value)) {
                return false;
            }
        }
        return true;
    }
    
    public function validateField($value) {
        if (isset($value)) {
            return empty($value);
        }
    }
    
    public function getFieldValue($value) {
        if (!$this->validateField($value)) {
            return $value;
        }
        return "";
    }
    
}