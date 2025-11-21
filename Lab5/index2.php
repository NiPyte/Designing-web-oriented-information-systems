<?php

trait SingletonTrait {
    protected static $_instance;

    private function __construct() { }
    private function __clone() { }
    public function __wakeup() { }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}

class MyConfig {
    // Using the trait to make this class a Singleton
    use SingletonTrait;

    public function run() {
        echo "MyConfig is running.\n";
    }
}

$config = MyConfig::getInstance();
$config->run();