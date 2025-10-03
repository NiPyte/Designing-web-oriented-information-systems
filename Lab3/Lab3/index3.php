<?php

// Variant 8

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
        echo $this->name . "'s current task: " . $this->task . PHP_EOL;
    }
}

// Subclass manager
class Manger extends Employee {
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
        echo $this->name . "'s team size = " . $this->teamSize . PHP_EOL;
    }
}


// Create a new Object
$worker = new Worker(
    "Alice",
    20000,
    "Develop a new weather parser"
);
$worker->showTasks();

$manger = new Manger(
    "Denys",
    100000,
    10
);
$manger->showTeamSize();


