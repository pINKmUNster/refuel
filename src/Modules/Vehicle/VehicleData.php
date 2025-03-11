<?php

namespace Module\Vehicle;

use Module\Fuel\FuelType;
use Spatie\LaravelData\Data;

class VehicleData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $vin,
        public readonly string $licence_plate,
        #[RecordTypeScriptType(FuelType::class, 'string')]
        public readonly string $fuelType,
        #[RecordTypeScriptType(VehicleType::class, 'string')]
        public readonly string $type,
        public readonly int $year,
        public readonly int $mileage,
        public readonly string $brand,
        public readonly string $owner,
    ) {
    }

    public static function fromModel(Vehicle $vehicle): self
    {
        return new self(
            id: $vehicle->id,
            vin: $vehicle->vin,
            licence_plate: $vehicle->licence_plate,
            fuelType: $vehicle->fuel_type->getDisplayName(),
            type: $vehicle->type->getDisplayName(),
            year: $vehicle->year,
            mileage: $vehicle->mileage,
            brand: $vehicle->brand->label,
            owner: $vehicle->user->name,
        );
    }
}
