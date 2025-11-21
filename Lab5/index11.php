<?php

// Trait for common methods (Task 13 requirement)
trait WorkerInfoTrait {
    public function getInfo(): string {
        return "{$this->name} {$this->surname} ({$this->enterprise})";
    }
}

// Modified Classes for Families

// Base Worker class
class WorkerBase {
    use WorkerInfoTrait; // Using trait

    public string $name;
    public string $surname;
    public string $enterprise;

    public function __construct($name, $surname, $enterprise) {
        $this->name = $name;
        $this->surname = $surname;
        $this->enterprise = $enterprise;
    }
}

// Family Product A: Developer
class Developer extends WorkerBase {
    public function code() { echo $this->getInfo() . " is writing code.\n"; }
}

// Family Product B: Manager
class Manager extends WorkerBase {
    public function manage() { echo $this->getInfo() . " is managing the team.\n"; }
}

// Abstract Factory
abstract class EnterpriseFactory {
    abstract public function hireDeveloper(string $name): Developer;
    abstract public function hireManager(string $name): Manager;
}

// Concrete Factory 1: IT Solutions Team
class ITSolutionsFactory extends EnterpriseFactory {
    private string $company = "ITSolutions";

    public function hireDeveloper(string $name): Developer {
        return new Developer($name, "Dev", $this->company);
    }

    public function hireManager(string $name): Manager {
        return new Manager($name, "Chief", $this->company);
    }
}

// Concrete Factory 2: IT Everyone Team
class ITEveryoneFactory extends EnterpriseFactory {
    private string $company = "ITEveryone";

    public function hireDeveloper(string $name): Developer {
        return new Developer($name, "Coder", $this->company);
    }

    public function hireManager(string $name): Manager {
        return new Manager($name, "Lead", $this->company);
    }
}

// Testing
echo "\nTask 13: Abstract Factory Result\n";

// 1. Create factory for ITSolutions
$factory1 = new ITSolutionsFactory();
$dev1 = $factory1->hireDeveloper("Alex");
$man1 = $factory1->hireManager("Sarah");

$dev1->code();
$man1->manage();

echo "\n";

// 2. Create factory for ITEveryone
$factory2 = new ITEveryoneFactory();
$dev2 = $factory2->hireDeveloper("Mike");
$man2 = $factory2->hireManager("Emily");

$dev2->code();
$man2->manage();
