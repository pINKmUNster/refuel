<?php

namespace Module\Vehicle;

use Spatie\LaravelData\Data;

class VehicleData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $vin,
        public readonly string $licencePlate,
        public readonly FuelType $fuelType,
        public readonly VehicleType $type,
        public readonly string $brand
    ) {
    }

    public static function fromModel(Vehicle $vehicle): self
    {
        return new self(
            id: $vehicle->id,
            vin: $vehicle->vin,
            licencePlate: $vehicle->licencePlate,
            fuelType: $vehicle->fuel_type,
            type: $vehicle->type,
            brand: 'audi'
//            brand: $vehicle->brand()->label,
        );
    }
}
