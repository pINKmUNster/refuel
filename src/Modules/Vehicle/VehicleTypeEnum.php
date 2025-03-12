<?php

namespace Module\Vehicle;

enum VehicleTypeEnum: string
{
    case CAR = 'car';
    case MOTORCYCLE = 'motorcycle';
    case TRUCK = 'truck';
    case SUV = 'suv';
    case VAN = 'van';
    case BUS = 'bus';

    public function getDisplayName(): string
    {
        return match ($this) {
            self::CAR => 'Car',
            self::TRUCK => 'Truck',
            self::MOTORCYCLE => 'Motorcycle',
            self::SUV => 'SUV',
            self::VAN => 'Van',
            self::BUS => 'Bus',
        };
    }
}
