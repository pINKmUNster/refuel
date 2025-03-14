<?php

namespace Module\Vehicle_Notes\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Module\Vehicle\Model\Vehicle;
use Module\Vehicle_Notes\Models\VehicleNotes;

class VehicleNotesFactory extends Factory
{
    protected $model = VehicleNotes::class;

    public function definition(): array
    {
        return [
            'mileage' => $this->faker->randomNumber(),
            'fuel_quantity' => $this->faker->randomFloat(3, 0, 10),
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'vehicle_id' => Vehicle::factory(),
        ];
    }
}
