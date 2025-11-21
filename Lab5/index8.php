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

// Interface for factories
interface IWorkerFactory
{
    public function createWorker(string $name, string $surname): Worker;
}

// Factory for Junior workers (Low salary, young age)
class JuniorFactory implements IWorkerFactory
{
    public function createWorker(string $name, string $surname): Worker
    {
        // Pre-set age and salary for juniors
        return new Worker($name, $surname, 19, "Internship", 800);
    }
}

// Factory for Senior workers (High salary, older age)
class SeniorFactory implements IWorkerFactory
{
    public function createWorker(string $name, string $surname): Worker
    {
        // Pre-set age and salary for seniors
        return new Worker($name, $surname, 40, "Headquarters", 5000);
    }
}

// Create a factory for juniors
$juniorFactory = new JuniorFactory();
$junior = $juniorFactory->createWorker("John", "Doe");
$junior->showObjects(); // Will show age 19, salary 800

// Create a factory for seniors
$seniorFactory = new SeniorFactory();
$senior = $seniorFactory->createWorker("Jane", "Boss");
$senior->showObjects(); // Will show age 40, salary 5000
