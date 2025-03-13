<?php

use Module\Fuel\Jobs\RefreshFuelPrice;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::fake([
        'https://www.petrol.lu/prix-officiels/' => Http::response(file_get_contents(__DIR__ . '/fixtures/petrol.html')),
    ]);
});


test('it extract data from the second prices-tables div using cell position',function(){
    $job = new RefreshFuelPrice();
    $job->handle();
});
