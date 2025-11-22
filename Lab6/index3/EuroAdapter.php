<?php
// Adapter Class (Inheritance)
include_once('EuroCalc.php');
include_once('ITarget.php');

class EuroAdapter extends EuroCalc implements ITarget {
    public function __construct() {
        $this->requester();
    }

    function requester() {
        $this->rate = 0.8111; // Exchange rate
        return $this->rate;
    }
}