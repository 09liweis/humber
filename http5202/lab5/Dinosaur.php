<?php
class Dinosaur {
    
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getDinosaurs() {
        $sql = "SELECT * FROM dinosaurs";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->execute();
        $dinosaurs = $pdostmt->fetchAll();
        return $dinosaurs;
    }
    
    public function getDinosaur($id) {
        $sql = "SELECT * FROM dinosaurs WHERE id = :id";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_STR);
        $pdostmt->execute();
        return $pdostmt->fetch();
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
    
    public function deleteDinosaur($id) {
        $sql = "DELETE FROM dinosaurs WHERE id = :id";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_STR);
        //$pdostmt->execute(['name' => $name, 'color' => $color]);
        $pdostmt->execute();
    }
}
?>