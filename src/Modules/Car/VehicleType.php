<?php

namespace Module\Car;

enum VehicleType: string
{
    case CAR = 'car';
    case TRUCK = 'truck';
    case MOTORCYCLE = 'motorcycle';
    case SCOOTER = 'scooter';
}
