<?php

class Config
{
    public static $factory = 1;
}

interface IProduct // Renamed to avoid conflict with previous task
{
    public function getName();
}

abstract class AbstractFactory
{
    public static function getFactory()
    {
        //choice which factory are we using
        switch (Config::$factory) {
            case 1:
                return new FirstAbstractFactory();
            case 2:
                return new SecondAbstractFactory();
        }
        //if there are no mentions…
        throw new Exception('Bad config');
    }

    abstract public function getProduct();
}

class FirstAbstractFactory extends AbstractFactory
{
    public function getProduct()
    {
        return new ProductOne();
    }
}

class ProductOne implements IProduct
{
    public function getName()
    {
        return 'The product from the first factory';
    }
}

class SecondAbstractFactory extends AbstractFactory
{
    public function getProduct()
    {
        return new ProductTwo();
    }
}

class ProductTwo implements IProduct
{
    public function getName()
    {
        return 'The product from second factory';
    }
}

//using first factory
$firstProduct = AbstractFactory::getFactory()->getProduct();

//using second factory
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

print_r($firstProduct->getName());
echo "\n";
// The first product from the first factory

print_r($secondProduct->getName());
echo "\n";
// Second product from second factory