<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Module\Fuel\Jobs\RefreshFuelPrice;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::fake([
        'https://www.petrol.lu/prix-officiels/' => Http::response(file_get_contents(__DIR__ . '/fixtures/petrol.html')),
    ]);
});

uses(RefreshDatabase::class);

test('it extract data from the second prices-tables div using cell position',function(){
    $job = new RefreshFuelPrice();
    $job->handle();


    $this->assertDatabaseHas('fuel_prices', [
        'fuel_type' => 'gasoline_98',
        'price' => '1.548',
        'date' => '2025-03-12',
    ]);

    $this->assertDatabaseHas('fuel_prices', [
        'fuel_type' => 'gasoline_95',
        'price' => '1.510',
        'date' => '2025-02-27',
    ]);

    $this->assertDatabaseHas('fuel_prices', [
        'fuel_type' => 'diesel',
        'price' => '1.526',
        'date' => '2025-02-22',
    ]);
});
