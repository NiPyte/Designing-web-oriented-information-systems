<?php

class someClass {
    protected static $_instance;

    private function __construct() {
        // Private constructor prevents creating objects via 'new'
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    private function __clone() {
        // Disable cloning
    }

    public function __wakeup() {
        // Disable unserializing
    }
}

// Test
$obj1 = someClass::getInstance();
$obj2 = someClass::getInstance();

// Check if both variables refer to the exact same object
if ($obj1 === $obj2) {
    echo "Singleton works: Both variables contain the same instance.\n";
} else {
    echo "Error: Different instances created.\n";
}