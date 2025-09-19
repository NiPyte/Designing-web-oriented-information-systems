<?php

// Class Worker
include "Worker.php";

class CSV
{
    // Private property for csv file
    private $_csv_file = null;
    // DOC comments
    /**
     * @param string $csv_file - path to csv file
     */

    // Constructor to open file correctly
    public function __construct($csv_file)
    {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        } else
            throw new Exception("File not found");
    }

    // Writing data to csv file from array
    public function setCSV(array $csv)
    {
        $handle = fopen($this->_csv_file, "a"); // Open the file for writing
        foreach ($csv as $value) {
            fputcsv($handle, explode(";", $value), ";");
        }

        fclose($handle);
    }

    // Reading csv file to array
    public function getCSV()
    {
        $handle = fopen($this->_csv_file, "r"); // Open the file for reading
        $array_line_full = array();
        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = $line;
        }

        fclose($handle);
        return $array_line_full;
    }

}

// Construction try catch for exceptions
try {
    // Create new object
    $csv = new CSV("file1.csv");

    // Array of objects
    $workers = [];
    // Create a new Object
    $workers[] = new Worker();
    $workers[] = new Worker("Alice", "Smith", 28, "ITSolutions", 2000);
    $workers[] = new Worker("Bob", "Johnson", 35, "ITEveryone", 5000);
    $workers[] = new Worker("Emily", "White", 20, "ITWhenever", 20000);
    $workers[] = new Worker("Den", "Grey", 22, "IT&UI", 1000000);

    // Write every property of object to csv file
    foreach ($workers as $worker) {
        $csv->setCSV(array($worker->propsToString()));
    }

} // Catch exception and print exception info
catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}