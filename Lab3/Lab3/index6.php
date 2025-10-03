<?php

// Figure interface
interface Figure
{
    // Methods of interface to implement
    public function draw();
    public function move();
    public function erase();
    public function getColor();
    public function setColor();
}

// Class Circle with implemented interface Figure
class Circle implements Figure
{
    // Implemented interface methods
    public function draw() {
        echo "Draw Circle" . PHP_EOL;
    }

    public function move() {
        echo "Move Circle" . PHP_EOL;
    }

    public function erase() {
        echo "Erase Circle" . PHP_EOL;
    }

    public function getColor() {
        echo "Get Circle Color" . PHP_EOL;
    }

    public function setColor() {
        echo "Set Circle Color" . PHP_EOL;
    }
}

// Class Square with implemented interface Figure
class Square implements Figure {
    // Implemented interface methods
    public function draw() {
        echo "Draw Square" . PHP_EOL;
    }

    public function move() {
        echo "Move Square" . PHP_EOL;
    }

    public function erase() {
        echo "Erase Square" . PHP_EOL;
    }

    public function getColor() {
        echo "Get Square Color" . PHP_EOL;
    }

    public function setColor() {
        echo "Set Square Color" . PHP_EOL;
    }
}

// Class Triangle with implemented interface Figure
class Triangle implements Figure {
    // Implemented interface methods
    public function draw() {
        echo "Draw Triangle" . PHP_EOL;
    }

    public function move() {
        echo "Move Triangle" . PHP_EOL;
    }

    public function erase() {
        echo "Erase Triangle" . PHP_EOL;
    }

    public function getColor() {
        echo "Get Triangle Color" . PHP_EOL;
    }

    public function setColor() {
        echo "Set Triangle Color" . PHP_EOL;
    }
}

// Create new objects
$circle = new Circle();
$square = new Square();
$triangle = new Triangle();

// Call methods of created objects
$circle->setColor();
$circle->getColor();
$square->draw();
$square->erase();
$triangle->draw();
$triangle->move();