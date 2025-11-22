<?php
include_once 'Worker.php';

// Target Interface
interface IEmployee {
    public function displayInfo();
}

// Adapter class
class WorkerAdapter implements IEmployee {
    private $worker;

    public function __construct(Worker $worker) {
        $this->worker = $worker;
    }

    public function displayInfo() {
        echo "[Adapter] Converting call... ";
        $this->worker->showObjects();
    }
}

echo "Task 9 Result\n";

$oldWorker = new Worker();
$adapter = new WorkerAdapter($oldWorker);

// Using the new interface method
$adapter->displayInfo();
?>