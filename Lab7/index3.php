<?php

// Abstract Handler based on Worker domain
abstract class WorkerHandler {
    protected $nextWorker;
    protected $name;
    protected $position;

    public function __construct($name, $position) {
        $this->name = $name;
        $this->position = $position;
    }

    public function setNext(WorkerHandler $worker) {
        $this->nextWorker = $worker;
        return $worker;
    }

    // Logic: Can this worker handle the task difficulty?
    // Difficulty levels: 1 (Easy), 2 (Medium), 3 (Hard)
    public function handleTask($description, $difficulty) {
        if ($this->canHandle($difficulty)) {
            echo "Task '$description' (Level $difficulty) was handled by {$this->position} {$this->name}.\n";
        } elseif ($this->nextWorker) {
            echo "{$this->position} {$this->name} cannot handle Level $difficulty. Passing to supervisor...\n";
            $this->nextWorker->handleTask($description, $difficulty);
        } else {
            echo "Task '$description' is too hard. Nobody can handle it!\n";
        }
    }

    abstract protected function canHandle($difficulty);
}

// Junior Worker (Handles Level 1)
class JuniorWorker extends WorkerHandler {
    protected function canHandle($difficulty) {
        return $difficulty <= 1;
    }
}

// Senior Worker (Handles Level 2)
class SeniorWorker extends WorkerHandler {
    protected function canHandle($difficulty) {
        return $difficulty <= 2;
    }
}

// Manager (Handles Level 3)
class ManagerWorker extends WorkerHandler {
    protected function canHandle($difficulty) {
        return $difficulty <= 3;
    }
}

// --- Client Code ---
echo "Task 3: Worker Chain of Responsibility\n";

// Create workers
$junior = new JuniorWorker("Nick", "Junior");
$senior = new SeniorWorker("Alice", "Senior");
$boss = new ManagerWorker("Big Boss", "Manager");

// Create chain: Junior -> Senior -> Manager
$junior->setNext($senior)->setNext($boss);

// Scenario 1: Easy task
$junior->handleTask("Fix Typo", 1);
echo "----------------\n";

// Scenario 2: Medium task
$junior->handleTask("Refactor Database", 2);
echo "----------------\n";

// Scenario 3: Hard task
$junior->handleTask("Architecture Design", 3);
echo "----------------\n";

// Scenario 4: Impossible task
$junior->handleTask("Solve impossible problem", 10);