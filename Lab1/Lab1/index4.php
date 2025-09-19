<?php

class Coor
{
    private string $name;
    private string $login;
    private string $password;

    // Function for initialize properties
    function __construct($name, $login, $password)  {
        $this->name=$name; //set some “name” to this “name”;
        $this->login=$login; //set some “login” to this “login”;
        $this->password=$password; //set some “password” to this “password”;
    }

    // Function for getting properties
    function __get($property): mixed {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
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

    // Class destructor
    function __destruct() {
        print "\n\nDestroying " . $this->text . "\n";
    }

}

$objects = [];
// Creating “Coor” object
$objects[] = new Coor("Nick", "login", "password");
$objects[] = new Coor("Jane", "Doe", "12345678");
$objects[] = new Coor("Mia", "pipExtra", "13572468");

// Getter call
$objects[0]->text;

// Show every property for every Object
echo "\n\nAll objects:\n";
foreach ($objects as $object) {
    $object->showObjects();
    echo "\n";
}


// Check whether object exists and deleting if true
if (isset($objects[2])) {
    // Deleting object
    unset($objects[2]);
}

// Check whether object exists and printing if false
if (!isset($objects[2])) {
    echo "\n\nObject is deleted!";
}