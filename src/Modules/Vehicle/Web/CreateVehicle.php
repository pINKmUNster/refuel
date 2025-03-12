<?php

namespace Module\Vehicle\Web;

use Module\Vehicle\Model\Vehicle;

final class CreateVehicle
{
    public function __invoke(StoreVehicleRequestData $request)
    {
        Vehicle::create([
            'vin' => $request->vin,
            'licence_plate' => $request->licence_plate,
            'fuel_type' => $request->fuel_type->value,
            'type' => $request->type->value,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'user_id' => $request->user_id,
            'brand_id' => $request->brand_id,
        ]);
    }
}
