<?php

class Person {
    const MALE = 'm';
    const FEMALE = 'f';
    public $name = 'marie';
    private $age = 21;
    private $gender;
    private static $count = 0;
    
    public function __construct($name, $age = 21) {
        $this->name = $name;
        $this->setAge($age);
        self::$count++;
    }
    
    public function setGender($gender) {
        $this->$gender = $gender;
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function setAge($value) {
        if ($value >= 21) {
            $this->age = $value;
        }
    }
    
    public function displayPerson() {
        return 'Name: ' . $this->name . 'Age: ' . $this->getAge() . self::FEMALE;
    }
    
    public function getCount() {
        return self::$count;
    }
}

$person = new Person('Sam', 27);
$person->setGender(Person::FEMALE);
echo $person->getCount();