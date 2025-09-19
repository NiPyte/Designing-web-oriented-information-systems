<?php

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

    // Transform properties of single object to string
    public function propsToString(): string {
        // get every property from current Object
        $properties = get_object_vars($this);
        $data_csv_format = "";
        // transform every property to string
        foreach ($properties as $property => $value) {
            $data_csv_format .= "$value;";
        }

        return $data_csv_format;
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
