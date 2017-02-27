<?php
class User {
    protected $name;
    protected $email;
    const PI = 3.14;
    public static $add;
    
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
    
    public function displayUser() {
        return $this->name . " : " . $this->email;
    }
    
    private function displayUser2() {
        return self::PI;
    }
}


class Admin extends User {
    private $section;
    
    public function __construct($s, $name, $email) {
        parent::__construct($name, $email);
        $this->section = $s;
    }
    
    public function displayUser() {
        return "from admin class";
    }
    
    public function getName() {
        return $this->name;
    }
}


?>