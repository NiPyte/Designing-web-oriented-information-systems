<?php

// The parent class that represents a room
class Room
{
    // Properties
    protected float $area;
    // Static property for total area in all apartments
    private static float $total_area = 0;

    // Constructor
    public function __construct(float $area = 0, float $kitchen_area = 0) {
        $this->area = $area;
        self::$total_area += $area;
        self::$total_area += $kitchen_area;
    }

    // Getter that uses properties like 'area' to check its existence and return value or null
    public function __get(string $property): mixed {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    // Static function to get total area of all apartments
    public static function getTotalArea(): float {
        return self::$total_area;
    }
}

// The child class that represents a single one-room apartment
class oneRoomApartment extends room
{
    // Properties
    protected float $kitchen_area;
    protected int $room_number;
    protected int $floor;

    //Constructor
    public function __construct(float $area = 0, float $kitchen_area = 0, int $room_number = 1, int $floor = 0) {
        parent::__construct($area, $kitchen_area);
        $this->kitchen_area = $kitchen_area;
        $this->room_number = $room_number;
        $this->floor = $floor;
    }

    public function __get(string $property): mixed {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }
}

// Creating 3 objects of one-room apartments
$one_room1 = new OneRoomApartment(20.5, 10.4, 1, 3);
$one_room2 = new OneRoomApartment(12.5, 11.2, 1, 2);
$one_room3 = new OneRoomApartment(16.5, 10.6, 1, 5);

// Calling static method to get total area
$total_room_area = Room::getTotalArea();

echo "Total room area is " . $total_room_area;