<?php

header("Content-Type: text/html; charset=windows-1251");

class WorkWithFile
{
    // Two public properties for file content and file directory
    public string $buff;
    public string $filename;

    // Constructor to open file and check whether it opened correctly
    function __construct($filename) {
        $uploadDir = './';
        $this->filename = $uploadDir . $filename;
        if (!file_exists($this->filename)) exit("File does not exist");

        // File opening
        $fd = fopen($filename, "r");

        if (!$fd) exit("File open error");

        $this->buff = fread($fd, filesize($this->filename));
        fclose($fd);
    }

    // The method displays the contents of the //file on the function screen
    function getContent(): string {
        return $this->buff;
    }

    // The method displays the file size
    function getSize(): int {
        return filesize($this->filename);
    }

    // The method outputs the number of lines in the //function file
    function getCount(): int {
        if (!empty($this->filename)) {
            $arr = file($this->filename);
            return count($arr);
        }
        else
            return 0;
    }

    // This method check whether file opened correctly and adds new string to the file
    function addNewString(string $newString): void {
        $fd = fopen($this->filename, "a");
        if (!$fd) exit("File open error");
        fwrite($fd, "\n$newString");
        fclose($fd);
        echo "\nA new string has been added\n";
    }
}

// Create new object
$first = new WorkWithFile("count.txt");

// Print object properties
echo "Content: {$first->getContent()}\n";
echo "Content size: {$first->getSize()}\n";
echo "Number of lines: {$first->getCount()}\n";

// Add new string to the file
$first->addNewString("87654321");
