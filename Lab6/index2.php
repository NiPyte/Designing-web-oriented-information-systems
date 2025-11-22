<?php

class WorkerPrototype {
    public string $name;
    public string $enterprise;

    public function __construct($name, $enterprise) {
        $this->name = $name;
        $this->enterprise = $enterprise;
    }

    // Method called when cloning
    public function __clone() {
        // Example: When cloning, maybe reset the name but keep enterprise
        $this->name = "Cloned " . $this->name;
    }

    public function show() {
        echo "Worker: $this->name works at $this->enterprise\n";
    }
}

echo "Task 4: Worker Prototype\n";

$originalWorker = new WorkerPrototype("Nick", "ITEveryone");
$originalWorker->show();

// Cloning the object
$clonedWorker = clone $originalWorker;
$clonedWorker->show(); // Name will change due to __clone logic

// Changing property of clone explicitly
$clonedWorker->enterprise = "New Corp";
$clonedWorker->show();

// Original remains untouched
$originalWorker->show();
echo "\n";