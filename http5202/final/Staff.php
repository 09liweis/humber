<?php

class Staff {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getDepartments() {
        $sql = "SELECT DISTINCT(department) FROM staffdirectory";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->execute();
        $departments = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
        return $departments;
    }
    
    public function getStaffsByDepartment($department) {
        $sql = "SELECT * FROM staffdirectory WHERE department = :department";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':department', $department, PDO::PARAM_STR);
        $pdostmt->execute();
        $staffs = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
        return $staffs;
    }
    
    public function getStaff($id) {
         $sql = "SELECT * FROM staffdirectory WHERE id = :id";
        $pdostmt = $this->db->prepare($sql);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_STR);
        $pdostmt->execute();
        $staff = $pdostmt->fetch(PDO::FETCH_ASSOC);
        return $staff;
    }
}