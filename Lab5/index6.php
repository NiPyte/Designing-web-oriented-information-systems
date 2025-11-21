<?php

// Base class
abstract class Vehicle {
    protected $make;
    protected $year;
    protected $country;

    public function __construct($country, $make, $year) {
        $this->country = $country;
        $this->make = $make;
        $this->year = $year;
    }

    abstract public function getInfo();
}

class Car extends Vehicle {
    // Additional properties could be added here
    public function getInfo() {
        return "Car: $this->make ($this->year), Made in $this->country\n";
    }
}

class Bike extends Vehicle {
    public function getInfo() {
        return "Bike: $this->make ($this->year), Made in $this->country\n";
    }
}

class Motorcycle extends Vehicle {
    public function getInfo() {
        return "Motorcycle: $this->make ($this->year), Made in $this->country\n";
    }
}

class VehicleFactory {
    public static function createVehicle($type, $country, $make, $year) {
        // Convert type to lowercase to be safe
        switch (strtolower($type)) {
            case 'car':
                return new Car($country, $make, $year);
            case 'bike':
                return new Bike($country, $make, $year);
            case 'motorcycle':
                return new Motorcycle($country, $make, $year);
            default:
                return "Error: Factory cannot create vehicle of type '$type'.\n";
        }
    }
}

// Testing
$car = VehicleFactory::createVehicle('car', 'Germany', 'BMW', 2022);
echo $car->getInfo();

$bike = VehicleFactory::createVehicle('bike', 'USA', 'Trek', 2020);
echo $bike->getInfo();

$unknown = VehicleFactory::createVehicle('plane', 'France', 'Airbus', 2023);
echo $unknown;