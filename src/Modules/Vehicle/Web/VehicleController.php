<?php

namespace Module\Vehicle\Web;

use Hybridly\Contracts\HybridResponse;
use Module\Vehicle\Vehicle;
use Module\Vehicle\VehicleData;
use function Hybridly\view;

final class VehicleController
{
    public function index(): HybridResponse
    {
        $vehicles = Vehicle::with('brand')
            ->get()
            ->map(fn(Vehicle $vehicle) => VehicleData::fromModel($vehicle));

        return view('vehicle::index',
            [
                'vehicles' => $vehicles
            ]);
    }
}
