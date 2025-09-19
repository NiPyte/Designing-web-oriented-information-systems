<?php

class Color
{
    private string $name;

    public function __construct(string $name = "Nick") {
        $this->name = $name;
    }
    public function __get(string $property): mixed {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    public function __set(string $property, mixed $value): void {
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}

//creating a new array
$works = [];

//writing a “Color” object in array
$works[0] = new Color();
//set a name
$works[0]->name = "Nick";

$works[1] = new Color();
$works[1]->name = "Nick 1";

$works[2] = new Color();
$works[2]->name = "Nick 2";

//circle with printing names of objects in array
for($i = 0; $i < 3; $i++) {
    echo $works[$i]->name . "<br>";
}