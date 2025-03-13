<?php

namespace Module\Fuel\Web;

use Hybridly\Contracts\HybridResponse;
use Module\Fuel\Jobs\RefreshFuelPrice;
use function Hybridly\view;

final class FuelPriceController
{
    public function index(): HybridResponse
    {
        return view('fuel::index');
    }

    public function refresh(): \Illuminate\Http\RedirectResponse
    {
        RefreshFuelPrice::dispatch();
        return back();
    }
}
