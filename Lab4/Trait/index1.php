<?php

trait my_first_trait //train creating
{
    public function traitFunction()
    {
        echo "Hello world\n";
    }

    // New function: says hello depending on the time
    public function timeGreeting()
    {
        // Get current hour (0-23)
        $hour = date("H");

        if ($hour < 12) {
            echo "Good morning \n";
        } elseif ($hour < 18) {
            echo "Good day \n";
        } else {
            echo "Good evening \n";
        }
    }
}

class helloWorld
{
    use my_first_trait;  //train using
}

$objTest = new HelloWorld();
$objTest->traitFunction();
// Calling the new function
$objTest->timeGreeting();