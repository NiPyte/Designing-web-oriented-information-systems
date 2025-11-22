<?php

// Base class supporting cloning
abstract class VehiclePrototype {
    protected string $model;
    public function __construct($model) {
        $this->model = $model;
    }
    abstract public function __clone();
    public function getInfo() {
        return $this->model;
    }
}

class Car extends VehiclePrototype {
    public function __clone() { /* Logic for cloning if needed */ }
}

class Truck extends VehiclePrototype {
    public function __clone() { }
}

class Bus extends VehiclePrototype {
    public function __clone() { }
}

// Factory that uses Prototypes
class PrototypeFactory {
    private $carProto;
    private $truckProto;
    private $busProto;

    public function __construct(Car $c, Truck $t, Bus $b) {
        $this->carProto = $c;
        $this->truckProto = $t;
        $this->busProto = $b;
    }

    public function createCar() {
        return clone $this->carProto;
    }
    public function createTruck() {
        return clone $this->truckProto;
    }
    public function createBus() {
        return clone $this->busProto;
    }
}


// 1. Create initial prototypes (expensive operation done once)
$uaCar = new Car("UA Lanos");
$uaTruck = new Truck("UA KrAZ");
$uaBus = new Bus("UA Bogdan");

// 2. Initialize Factory with prototypes
$factory = new PrototypeFactory($uaCar, $uaTruck, $uaBus);

// 3. Config parsing (Simulated)
$config = ['carNum' => 2, 'truckNum' => 1, 'busNum' => 1];

echo "Task 3: Prototype Car Park\n";

// Create Cars via cloning
for ($i = 0; $i < $config['carNum']; $i++) {
    $car = $factory->createCar();
    echo "Created: " . $car->getInfo() . "\n";
}

// Create Trucks
for ($i = 0; $i < $config['truckNum']; $i++) {
    $truck = $factory->createTruck();
    echo "Created: " . $truck->getInfo() . "\n";
}
echo "\n";