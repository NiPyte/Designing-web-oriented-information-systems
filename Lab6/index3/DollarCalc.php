<?php
// Service Class 1
class DollarCalc {
    protected $dollar;
    protected $rate = 1;

    public function requestCalc($productNow, $serviceNow) {
        $this->dollar = $productNow + $serviceNow;
        return $this->requestTotal();
    }

    public function requestTotal() {
        $this->dollar *= $this->rate;
        return $this->dollar;
    }
}