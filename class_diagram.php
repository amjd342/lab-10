<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]
// CPIT-405 Lab 10 - Assessment 2

// Parent Class
class Animal {
    protected $name;
    protected $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    
    public function makeSound() {
        return "Some generic animal sound";
    }
    
    public function getInfo() {
        return "Name: {$this->name}, Age: {$this->age} years";
    }
    
    public function eat() {
        return "{$this->name} is eating.";
    }
}

// Child Class - Dog
class Dog extends Animal {
    private $breed;
    
    public function __construct($name, $age, $breed) {
        parent::__construct($name, $age);
        $this->breed = $breed;
    }
    
    public function makeSound() {
        return "Woof! Woof!";
    }
    
    public function getBreed() {
        return $this->breed;
    }
    
    public function fetch() {
        return "{$this->name} is fetching the ball!";
    }
}

// Child Class - Cat
class Cat extends Animal {
    private $color;
    
    public function __construct($name, $age, $color) {
        parent::__construct($name, $age);
        $this->color = $color;
    }
    
    public function makeSound() {
        return "Meow!";
    }
    
    public function getColor() {
        return $this->color;
    }
    
    public function scratch() {
        return "{$this->name} is scratching the furniture!";
    }
}

// Demo Code
echo "<h2>Object-Oriented Programming Demo</h2>";

echo "<h3>Dog Object:</h3>";
$dog = new Dog("Buddy", 3, "Golden Retriever");
echo $dog->getInfo() . "<br>";
echo "Sound: " . $dog->makeSound() . "<br>";
echo "Breed: " . $dog->getBreed() . "<br>";
echo $dog->fetch() . "<br>";
echo $dog->eat() . "<br>";

echo "<h3>Cat Object:</h3>";
$cat = new Cat("Whiskers", 2, "Orange Tabby");
echo $cat->getInfo() . "<br>";
echo "Sound: " . $cat->makeSound() . "<br>";
echo "Color: " . $cat->getColor() . "<br>";
echo $cat->scratch() . "<br>";
echo $cat->eat() . "<br>";

// Demonstrating Polymorphism
echo "<h3>Polymorphism Demo:</h3>";
$animals = [$dog, $cat];
foreach ($animals as $animal) {
    echo $animal->getInfo() . " says: " . $animal->makeSound() . "<br>";
}
?>