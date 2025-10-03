<?php

// First interface
interface RoomMeasurements {
    public function getArea(): float;
}

// Second interface
interface totalMeasurements {
    public static function getTotalArea(): float;
}

class Room implements RoomMeasurements, totalMeasurements
{
    // Properties
    protected float $area;
    // Static property for total area in all apartments
    private static float $total_area = 0;

    // Constructor
    public function __construct(float $area = 0) {
        $this->area = $area;
        self::$total_area += $area;
    }

    // Getter that uses properties like 'area' to check its existence and return value or null
    public function __get(string $property): mixed {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    // Function to get room area
    public function getArea(): float {
        return $this->area;
    }

    // Static function to get total area of all apartments
    public static function getTotalArea(): float {
        return self::$total_area;
    }
}

// Creating objects of room class
$room1 = new Room(20);
$room2 = new Room(30);
$room3 = new Room(15);

// Calling class method to get room area
$room_area = $room1->getArea();
echo "Room 1 area is " . $room_area . PHP_EOL;

// Calling static method to get total area
$total_room_area = Room::getTotalArea();
echo "Total room area is " . $total_room_area;