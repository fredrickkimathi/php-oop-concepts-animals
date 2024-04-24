<?php

interface AnimalAction {
    public function performAction();
}


trait Locomotion
{
    public function move()
    {
        echo $this->name . " is moving.\n";
    }

    public abstract function getMovementType(); // Abstract method for specific movement
}


class Animal {
    protected $name;
    protected $species;

    public function __construct($name, $species) {
        $this->name = $name;
        $this->species = $species;
    }

    public function getName() {
        return $this->name;
    }

    public function eat() {
        echo $this->name . " is consuming food.\n";
    }

}

$animal1 = new Animal("fred", "human");
$animal1->eat();


class Dog extends Animal implements AnimalAction
{
    use Locomotion;
    private $breed;

    public function __construct($name, $species, $breed)
    {
        parent::__construct($name, $species);  // Call parent constructor
        $this->breed = $breed;
    }

    public function performAction() {
        echo $this->name . " is rolling over.\n";
    }

    public function makeSound()
    {
        echo $this->name. " is barking.\n";
    }
    public function getMovementType() {
        return $this->name. "walking";
    }
    public function eat()
    {
        echo $this->name . " is consuming meat.\n";
    }
}

$dog1 = new Dog("max","dog","chihuahua");
$dog1->makeSound();
$dog1->performAction();
$dog1->eat();

