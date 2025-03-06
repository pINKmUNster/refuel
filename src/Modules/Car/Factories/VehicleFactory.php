<?php

namespace Module\Car\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Module\Car\Brand;
use Module\Car\FuelType;
use Module\Car\Vehicle;
use Module\Car\VehicleType;
use Module\User\User;


final class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'vin' => $this->faker->ean8(),
            'licencePlate' => $this->faker->word(),
            'fuel_type' => $this->faker->randomelement(FuelType::cases()),
            'brand_id' => Brand::factory(),
            'type' => $this->faker->randomElement(VehicleType::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => User::factory(),
        ];
    }
}
