<?php

class Cat
{
    private $name;
    private $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function sayHello()
    {
        echo "Меня зовут {$this->name}, я {$this->color} кот.\n";
    }
}

$cat1 = new Cat("Симон", "рыжий");
$cat1->sayHello();