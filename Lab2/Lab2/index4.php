<?php
class A {
    public static function test() {
        echo 1;
    }

    public static function get() {
        self::test();
    }
}

class B extends A {
    public static function test() {
        echo 2;
    }
}

// Now we are calling function test instead of function get that calls function test of parent class
B::test();
