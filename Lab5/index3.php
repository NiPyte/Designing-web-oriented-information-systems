<?php

class db {
    public $db;
    private static $_instance; // Store the single instance

    // Make constructor private
    private function __construct() {
        echo "Connecting with database...\n";

        // Mocking connection for demonstration purposes
        // $this->db = new mysqli('localhost','root','');
        // if($this->db->connect_error) {
        //    throw new DbException("Connection error : ");
        // }
        // $this->db->query("SET NAMES 'UTF8'");
    }

    // Disable cloning
    private function __clone() {}

    // Public static method to get the instance
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get_data() {
        return ["row1", "row2"];
    }
}

// Testing
echo "--- Attempt 1 ---\n";
$obj1 = db::getInstance(); // Connects and prints message

echo "--- Attempt 2 ---\n";
$obj2 = db::getInstance(); // Does NOT print message (uses existing object)

echo "--- Attempt 3 ---\n";
$obj3 = db::getInstance(); // Does NOT print message

if ($obj1 === $obj3) {
    echo "Success: Only one database connection object exists.\n";
}