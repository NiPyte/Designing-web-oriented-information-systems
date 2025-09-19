<?php

// Variant 8
class Worker
{
    // Four public properties: name, surname, age, enterprise and one private - salary
    public string $name;
    public string $surname;
    public int $age;
    public string $enterprise;
    private float $salary;

    // Constructor with parameter by default for each property
    public function __construct(string $name = "Nick", string $surname = "Valentine", int $age = 30, string $enterprise = "ITEveryone", float $salary = 2000) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->enterprise = $enterprise;
        $this->salary = $salary;
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
    // Private method to show salary
    private function showSalary(): void {
        echo $this->salary;
    }

    // Show some properties of Object
    public function show(): void {
        echo $this->name;
        $this->showSalary();
    }

    // Show print every property of Object
    public function showObjects(): void {
        // get every property from current Object
        $properties = get_object_vars($this);
        // print every property, for example: name = Nick
        foreach ($properties as $property => $value) {
            echo "$property = $value\n";
        }
    }

    // Search for any Objects by any property
    public static function search(array $workers, string $property, mixed $value): array {
        // Array for saving result
        $result = [];
        // Go through each Object in the array
        foreach ($workers as $worker) {
            // Check whether a value of specified property equals to a specified value
            if($worker->$property === $value) {
                // Add Object to the end of the array
                $result[] = $worker;
            }
        }

        return $result;
    }
}

// Array of Objects
$workers = [];
// Create a new Object
$workers[] = new Worker();
$workers[] = new Worker("Alice", "Smith", 28, "ITSolutions", 2000);
$workers[] = new Worker("Bob", "Johnson", 35, "ITEveryone", 5000);
$workers[] = new Worker("Emily", "White", 20, "ITWhenever", 20000);
$workers[] = new Worker("Den", "Grey", 22, "IT&UI", 1000000);

// Show every property of an Object worker
echo "Result of the show() function:\n";
$workers[0]->show();
// Find every Object with by specified property "enterprise" with value "ITEveryone"
$searchResult = Worker::search($workers, "enterprise", "ITEveryone");

//  Show the search results
echo "\n\nResult of the search() function:\n";
foreach ($searchResult as $worker) {
    echo $worker->show() . "\n";
}

// Show every property for every Object
echo "\n\nAll objects:\n";
foreach ($workers as $worker) {
    $worker->showObjects();
    echo "\n";
}