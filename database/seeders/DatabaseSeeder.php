<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Module\User\User;
use Module\Vehicle\Brand;
use Module\Vehicle\Vehicle;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user2 = User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@example.com',
        ]);

        Brand::factory()
            ->has(Vehicle::factory()->count(2)->sequence(
                ['user_id' => $user1],['user_id' => $user2]))
            ->count(2)
            ->sequence(['label' => 'BMW',], ['label' => 'Audi',])
            ->create();
    }
}
