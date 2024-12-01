<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Driver;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // create 3 new cars for each new driver
        // Driver::factory(10)->hasCars(3)->create();

        Car::factory(3)->create();
        // create 3 new drivers and for each driver attach 0-3 cars
        Driver::factory(3)
            ->create()->each(
                fn($d) => $d->cars()
                    ->attach(Car::inRandomOrder()->take(rand(0, 3))->get())
            );
    }
}
