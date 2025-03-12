<?php

namespace Module\Fuel\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Module\Fuel\FuelTypeEnum;
use Module\Fuel\Models\FuelPrice;
use Module\User\User;
use Module\Vehicle\Brand;
use Module\Vehicle\Vehicle;
use Module\Vehicle\VehicleType;


final class FuelPriceFactory extends Factory
{
    protected $model = FuelPrice::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 0, 10),
            'fuel_type' => $this->faker->randomElement(FuelTypeEnum::cases()),
            'date' => $this->faker->date(),
            'created_at' => Carbon::now(),
        ];
    }
}
