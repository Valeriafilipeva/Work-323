<?php
interface CalculateSquare
{
    public function calculateArea();
}

class Circle implements CalculateSquare
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getSide()
    {
        return $this->side;
    }
}

function displayArea($object)
{
    if ($object instanceof CalculateSquare) {
        echo "Площадь объекта типа " . get_class($object) . " равна " . $object->calculateArea() . "<br>";
    } else {
        echo "Объект класса " . get_class($object) . " не реализует интерфейс CalculateSquare" . "<br>";
    }
}

$obj1 = new Circle(5);
$obj2 = new Rectangle(4);

displayArea($obj1);
displayArea($obj2);
?>
