<?php

class Worker
{
    public string $name;
    public string $surname;
    public int $age;
    public string $enterprise;
    private float $salary;

    public function __construct(string $name = "Nick", string $surname = "Valentine", int $age = 30, string $enterprise = "ITEveryone", float $salary = 2000) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->enterprise = $enterprise;
        $this->salary = $salary;
    }

    public function __get(string $property): mixed {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    public function showObjects(): void {
        // Simple output for console
        echo "Worker: $this->name $this->surname, Age: $this->age, Enterprise: $this->enterprise \n";
    }
}

class WorkerFactory
{
    // Static method to create a worker
    public static function create(string $name, string $surname, int $age, string $enterprise, float $salary): Worker
    {
        return new Worker($name, $surname, $age, $enterprise, $salary);
    }
}


// New way: using Factory
$worker1 = WorkerFactory::create("Alice", "Smith", 28, "ITSolutions", 2000);
$worker2 = WorkerFactory::create("Bob", "Johnson", 35, "ITEveryone", 5000);

echo "Task 6: Simple Factory Result\n";
$worker1->showObjects();
$worker2->showObjects();