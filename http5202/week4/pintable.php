<?php

require_once 'person.php';

interface Printable {
    const PI = 3.14;
    public function print1();
    public function show($name, $num);
}


interface Testable {
    public function test1();
    public function test2();
}

class Student extends Person implements Printable, Testable {
    public function print1() {
        
    }
    
    public function show($name, $num) {
        
    }
    
    public function test1() {
        
    }
    
    public function test2() {
        
    }
}