<?php

namespace Module\Fuel\Web;

use Hybridly\Contracts\HybridResponse;
use Module\Fuel\Jobs\RefreshFuelPrice;
use Module\Fuel\Models\FuelPrice;
use Module\Fuel\Models\FuelPriceData;
use Spatie\LaravelData\PaginatedDataCollection;

final class FuelPriceController
{
    public function index(): HybridResponse
    {
        $fuelPrices = FuelPrice::query()
            ->paginate();


        return hybridly('fuel::index',['fuelPrices' =>
            FuelPriceData::collect($fuelPrices,PaginatedDataCollection::class)->transform()
        ]);
    }

    public function refresh(): \Illuminate\Http\RedirectResponse
    {
        RefreshFuelPrice::dispatch();
        return back();
    }
}
