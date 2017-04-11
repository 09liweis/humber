<?php

class User {
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function register($user) {
        $username = $user['username'];
        $profileimage = $user['profleimage'];
        
    }
}