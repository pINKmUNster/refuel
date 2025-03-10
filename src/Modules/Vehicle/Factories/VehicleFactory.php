<?php

namespace Module\Vehicle\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Module\User\User;
use Module\Vehicle\Brand;
use Module\Vehicle\FuelType;
use Module\Vehicle\Vehicle;
use Module\Vehicle\VehicleType;


final class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'vin' => $this->faker->ean8(),
            'licence_plate' => $this->faker->word(),
            'fuel_type' => $this->faker->randomelement(FuelType::cases()),
            'brand_id' => Brand::factory(),
            'type' => $this->faker->randomElement(VehicleType::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => User::factory(),
        ];
    }
}
