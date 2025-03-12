<?php

namespace Module\Vehicle\Web;

use Module\Fuel\FuelTypeEnum;
use Module\Vehicle\VehicleType;
use Spatie\LaravelData\Data;

final class StoreVehicleRequestData extends Data
{
    public function __construct(
        public string $vin,
        public string $licence_plate,
        public FuelTypeEnum $fuel_type,
        public VehicleType $type,
        public int $year,
        public int $mileage,
        public int $user_id,
        public int $brand_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            "vin" => ["required", "string", "max:17"],
            "licence_plate" => ["required", "string", "max:10"],
            "year" => ["required", "integer", "min:1900", "max:" . date("Y")],
//            "fuel_type" => ["required", "string", "in:gasoline,diesel,electric"],
//            "type" => ["required", "string", "in:car,motorcycle,boat"],
//            "user_id" => ["required", "integer", "exists:users,id"],
//            "brand_id" => ["required", "integer", "exists:brands,id"]
        ];
    }
}
