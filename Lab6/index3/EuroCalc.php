<?php
// Service Class 2
class EuroCalc {
protected $euro;
protected $rate = 1;

public function requestCalc($productNow, $serviceNow) {
$this->euro = $productNow + $serviceNow;
return $this->requestTotal();
}

public function requestTotal() {
$this->euro *= $this->rate;
return $this->euro;
}
}