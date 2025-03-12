<?php

namespace Module\Vehicle\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Module\Fuel\FuelTypeEnum;
use Module\User\User;
use Module\Vehicle\Model\Brand;
use Module\Vehicle\Model\Vehicle;
use Module\Vehicle\VehicleTypeEnum;


final class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'vin' => $this->faker->ean8(),
            'licence_plate' => $this->faker->word(),
            'fuel_type' => $this->faker->randomelement(FuelTypeEnum::cases()),
            'type' => $this->faker->randomElement(VehicleTypeEnum::cases()),
            'year' => $this->faker->year(),
            'mileage' => $this->faker->numberBetween(0, 100000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'brand_id' => Brand::factory(),
            'user_id' => User::factory(),
        ];
    }
}
