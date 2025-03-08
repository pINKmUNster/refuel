<?php

namespace Module\Vehicle;

use Spatie\LaravelData\Data;

class VehicleData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $vin,
        public readonly string $licencePlate,
        #[RecordTypeScriptType(FuelType::class, 'string')]
        public readonly string $fuelType,
        #[RecordTypeScriptType(VehicleType::class, 'string')]
        public readonly string $type,
        public readonly string $brand,
        public readonly string $owner,
    ) {
    }

    public static function fromModel(Vehicle $vehicle): self
    {
        return new self(
            id: $vehicle->id,
            vin: $vehicle->vin,
            licencePlate: $vehicle->licencePlate,
            fuelType: $vehicle->fuel_type->getDisplayName(),
            type: $vehicle->type->getDisplayName(),
//            brand: 'audi'
            brand: $vehicle->brand->label,
            owner: $vehicle->user->name,
        );
    }
}
