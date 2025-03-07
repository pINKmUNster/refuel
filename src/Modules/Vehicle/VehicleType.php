<?php

namespace Module\Vehicle;

enum VehicleType: string
{
    case CAR = 'car';
    case TRUCK = 'truck';
    case MOTORCYCLE = 'motorcycle';
    case SCOOTER = 'scooter';

    public function getDisplayName(): string
    {
        return match ($this) {
            self::CAR => 'Car',
            self::TRUCK => 'Truck',
            self::MOTORCYCLE => 'Motorcycle',
            self::SCOOTER => 'Scooter',
        };
    }
}
