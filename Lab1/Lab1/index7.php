<?php

class CSV
{
    // Private property for csv file
    private $_csv_file = null;
    // DOC comments
    /**

     * @param string $csv_file  - path to csv file

     */

    // Constructor to open file correctly
    public function __construct($csv_file) {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        }
        else
            throw new Exception("File not found");
    }


    // Writing data to csv file from array
    public function setCSV(Array $csv) {
        $handle = fopen($this->_csv_file, "a"); // Open the file for writing
        foreach ($csv as $value) {
            fputcsv($handle, explode(";", $value), ";");
        }

        fclose($handle);
    }

    // Reading csv file to array
    public function getCSV() {
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
    $csv = new CSV("file.csv");
    // Read csv file to array
    $get_csv = $csv->getCSV();

    // Print data from array
    foreach ($get_csv as $value) {
        echo "Last name: " . $value[0] . "\n";
        echo "First name: " . $value[1] . "\n";
        echo " Position: " . $value[2] . "\n";
        echo " Salary: " . $value[3] . "\n";
        echo "--------\n";

    }

    // The array that will be written to csv file
    $arr = array("Ponomarenko;Ivan;;12000",);
    $csv->setCSV($arr);
}

// Catch exception and print exception info
catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}