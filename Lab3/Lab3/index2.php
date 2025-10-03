<?php

abstract class Figure // Basic class
{
    // Center coordinates
    protected float $x_center;
    protected float $y_center;
    public function __construct(float $x_center, float $y_center) {
        $this->x_center = $x_center;
        $this->y_center = $y_center;
    }
    // Abstract method for finding area
    abstract public function area();

    // Method for printing center coordinates
    abstract public function printCenterCoordinates();
}

class Circle extends Figure
{
    // Circle radius
    private float $radius;
    public function __construct(float $x_center, float $y_center, float $radius) {
        parent::__construct($x_center, $y_center);
        $this->radius = $radius;
    }
    // Area finding
    public function area(): float
    {
        return M_PI * ($this->radius ** 2);
    }

    public function printCenterCoordinates() {
        echo "Circle X center = " . $this->x_center . PHP_EOL .
            "Circle Y center = " . $this->y_center . PHP_EOL;
    }
}

class Rectangle extends Figure
{
    // Rectangle properties
    private float $width;
    private float $height;

    public function __construct(
        float $x_center,
        float $y_center,
        float $width,
        float $height
    ) {
        parent::__construct($x_center, $y_center);
        $this->width = $width;
        $this->height = $height;
    }

    // Area finding
    public function area(): float
    {
        return $this->width * $this->height;
    }

    public function printCenterCoordinates() {
        echo "Rectangle X center = " . $this->x_center . PHP_EOL .
            "Rectangle Y center = " . $this->y_center . PHP_EOL;
    }
}

$circle = new Circle(3, 3, 5);
$circle->printCenterCoordinates();
echo "Circle area = " . $circle->area() . PHP_EOL . PHP_EOL;

$rectangle = new Rectangle(10, 22, 3, 5);
$rectangle->printCenterCoordinates();
echo "Rectangle area = " . $rectangle->area() . PHP_EOL;
