<?php

// Base Handler
abstract class AccountHandler {
    protected $next;
    protected $balance;

    public function __construct($balance) {
        $this->balance = $balance;
    }

    public function setNext(AccountHandler $next) {
        $this->next = $next;
        return $next; // Returning next allows chaining
    }

    public function pay($amountToPay) {
        if ($this->canPay($amountToPay)) {
            echo sprintf("Paid %s using %s.\n", $amountToPay, get_class($this));
        } elseif ($this->next) {
            echo sprintf("Cannot pay using %s. Proceeding to next...\n", get_class($this));
            $this->next->pay($amountToPay);
        } else {
            echo "Error: Insufficient funds in all accounts. Payment rejected.\n";
        }
    }

    abstract protected function canPay($amount);
}

// Concrete Handler 1: Main Account
class MainAccount extends AccountHandler {
    protected function canPay($amount) {
        return $this->balance >= $amount;
    }
}

// Concrete Handler 2: Credit Card
class CreditCard extends AccountHandler {
    protected function canPay($amount) {
        return $this->balance >= $amount;
    }
}

// Client Code
echo "Task 2: Payment System\n";

// Setup balances
$main = new MainAccount(100);   // Has $100
$credit = new CreditCard(500);  // Has $500

// Build chain: Main -> Credit
$main->setNext($credit);

// Test 1: Small amount (Main account handles it)
echo "Attempting to pay $50:\n";
$main->pay(50);
echo "\n";

// Test 2: Medium amount (Main fails, Credit handles it)
echo "Attempting to pay $200:\n";
$main->pay(200);
echo "\n";

// Test 3: Large amount (Both fail)
echo "Attempting to pay $1000:\n";
$main->pay(1000);