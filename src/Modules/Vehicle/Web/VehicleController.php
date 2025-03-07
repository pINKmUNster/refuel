<?php

namespace Module\Vehicle\Web;

use Hybridly\Contracts\HybridResponse;
use Illuminate\Http\RedirectResponse;
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

    public function show(int $id): HybridResponse
    {
        $vehicle = Vehicle::with('brand')
            ->findOrFail($id);

        return view('vehicle::show',
            [
                'vehicle' => VehicleData::fromModel($vehicle)
            ]);
    }

    public function create(): HybridResponse
    {
        return view('vehicle::create');
    }

    public function destroy(int $id): RedirectResponse
    {
        Vehicle::findOrFail($id)->delete();

        return redirect()->route('vehicle.index');
    }
}
