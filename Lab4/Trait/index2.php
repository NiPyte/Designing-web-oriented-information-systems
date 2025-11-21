<?php

// Interface from the task
interface ILoger {
    public function log($message);
}

// Trait 1: Handles the date
trait DateTrait {
    // Function to get current date and time
    public function getDateString() {
        // Format like: October 10, 2022, 7:43 pm
        return date("F j, Y, g:i a");
    }
}

// Trait 2: Handles writing to file
trait FileTrait {
    // Function to save text to a file
    public function writeText($text) {
        // Append text to 'log.txt' using PHP_EOL for file new line
        file_put_contents("log.txt", $text . PHP_EOL, FILE_APPEND);
    }
}

class FileLoger implements ILoger {
    // Use both traits
    use DateTrait, FileTrait;

    public function log($message) {
        // Get the date using DateTrait
        $date = $this->getDateString();

        // Create the final string
        $fullMessage = "$date: $message";

        // Write to file using FileTrait
        $this->writeText($fullMessage);

        // Output to console with \n
        echo "Saved: $fullMessage \n";
    }
}

// Testing the logger
$logger = new FileLoger();
$logger->log("log message");
$logger->log("another log message");