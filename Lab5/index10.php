<?php

// Interfaces for vehicle types
interface CarInterface { public function info(); }
interface TruckInterface { public function info(); }
interface BusInterface { public function info(); }

// Domestic Products (UA)
class UACar implements CarInterface {
    public function info() { return "UA Lanos"; }
}
class UATruck implements TruckInterface {
    public function info() { return "UA KrAZ"; }
}
class UABus implements BusInterface {
    public function info() { return "UA Bogdan"; }
}

// Foreign Products
class ForeignCar implements CarInterface {
    public function info() { return "Foreign Toyota"; }
}
class ForeignTruck implements TruckInterface {
    public function info() { return "Foreign MAN"; }
}
class ForeignBus implements BusInterface {
    public function info() { return "Foreign Mercedes"; }
}

// Abstract Factory
abstract class CarParkFactory {
    abstract public function createCar();
    abstract public function createTruck();
    abstract public function createBus();
}

// Concrete Factories
class UAFactory extends CarParkFactory {
    public function createCar() { return new UACar(); }
    public function createTruck() { return new UATruck(); }
    public function createBus() { return new UABus(); }
}

class ForeignFactory extends CarParkFactory {
    public function createCar() { return new ForeignCar(); }
    public function createTruck() { return new ForeignTruck(); }
    public function createBus() { return new ForeignBus(); }
}

// Main Logic

// Config string example
$configString = "factory=ua carNum=2 truckNum=1 busNum=1";

// Parsing config
parse_str(str_replace(' ', '&', $configString), $config);

$factoryType = $config['factory'];
$carNum = $config['carNum'];
$truckNum = $config['truckNum'];
$busNum = $config['busNum'];

// Select factory
$factory = null;
if ($factoryType == 'ua') {
    $factory = new UAFactory();
} else {
    $factory = new ForeignFactory();
}

echo "Creating Fleet using [$factoryType] factory:\n";

// Create Cars
for ($i = 0; $i < $carNum; $i++) {
    $car = $factory->createCar();
    echo "- Created: " . $car->info() . "\n";
}

// Create Trucks
for ($i = 0; $i < $truckNum; $i++) {
    $truck = $factory->createTruck();
    echo "- Created: " . $truck->info() . "\n";
}

// Create Buses
for ($i = 0; $i < $busNum; $i++) {
    $bus = $factory->createBus();
    echo "- Created: " . $bus->info() . "\n";
}