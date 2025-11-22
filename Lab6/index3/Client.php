<?php
// Client Code
include_once('EuroAdapter.php');
include_once('DollarCalc.php');

class Client {
    private $euroRequest;
    private $dollarRequest;

    public function __construct() {
        $this->euroRequest = new EuroAdapter();
        $this->dollarRequest = new DollarCalc();

        echo "Task 6: Adapter (Inheritance)\n";

        // Calculate in Euros (via Adapter)
        echo "Euros: " . $this->makeAdapterRequest($this->euroRequest) . "\n";

        // Calculate in Dollars (Directly)
        echo "Dollars: $" . $this->makeDollarRequest($this->dollarRequest) . "\n";
    }

    private function makeAdapterRequest(ITarget $req) {
        // Using the method from parent class EuroCalc via Adapter
        return $req->requestCalc(40, 50);
    }

    private function makeDollarRequest(DollarCalc $req) {
        return $req->requestCalc(40, 50);
    }
}

$worker = new Client();
echo "\n";