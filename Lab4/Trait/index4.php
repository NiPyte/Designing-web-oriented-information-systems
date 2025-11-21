<?php

// Variant 8

// Trait 1: Generates a unique ID for the employee
trait IdentityTrait {
    public function generateId(): string {
        return uniqid('EMP_');
    }
}

// Trait 2: Creates a JSON report of the object
trait ReportTrait {
    public function getJsonReport(): string {
        // Get all properties of the object and convert to JSON
        return json_encode(get_object_vars($this));
    }
}

// Abstract parental class
abstract class Employee {
    protected string $name;
    protected float $salary;
    public function __construct(
        string $name,
        float $salary
    ) {
        $this->name = $name;
        $this->salary = $salary;
    }
}

// Subclass worker
class Worker extends Employee
{
    // Use traits to simulate multiple inheritance
    use IdentityTrait, ReportTrait;

    private string $task;
    // Constructor with parameter by default for each property
    public function __construct(
        string $name = "Nick",
        float  $salary = 0,
        string $task = "Working"
    ) {
        parent::__construct($name, $salary);
        $this->task = $task;
    }

    // Universal get function for every property
    public function __get(string $property): mixed {
        // Check whether the property exists
        if(property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    // Universal setter for each property
    public function __set(string $property, mixed $value): void {
        // Check whether the property exists
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Function to show worker current task
    public function showTasks(): void {
        // Changed PHP_EOL to \n for console consistency
        echo $this->name . "'s current task: " . $this->task . "\n";
    }
}

// Subclass manager
class Manger extends Employee {
    // Use traits here as well
    use IdentityTrait, ReportTrait;

    private int $teamSize;

    public function __construct(
        string $name,
        int $salary,
        int $teamSize
    ) {
        parent::__construct($name, $salary);
        $this->teamSize = $teamSize;
    }

    // Universal get function for every property
    public function __get(string $property): mixed {
        // Check whether the property exists
        if(property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    // Universal setter for each property
    public function __set(string $property, mixed $value): void {
        // Check whether the property exists
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    // Function to show team size
    public function showTeamSize(): void {
        echo $this->name . "'s team size = " . $this->teamSize . "\n";
    }
}


// Create a new Object
$worker = new Worker(
    "Alice",
    20000,
    "Develop a new weather parser"
);
$worker->showTasks();

// Demonstrating Trait 1 (Identity)
echo "Worker ID: " . $worker->generateId() . "\n";
// Demonstrating Trait 2 (Report)
echo "Worker Report: " . $worker->getJsonReport() . "\n\n";

$manger = new Manger(
    "Denys",
    100000,
    10
);
$manger->showTeamSize();

// Demonstrating Trait 1 (Identity) for Manager
echo "Manager ID: " . $manger->generateId() . "\n";
// Demonstrating Trait 2 (Report) for Manager
echo "Manager Report: " . $manger->getJsonReport() . "\n";
