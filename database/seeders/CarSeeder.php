<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'brand' => 'Toyota',
            'model' => 'Corolla',
            'license_plate' => 'B1234XYZ',
            'rental_rate' => 250000.00,
            'available' => true,
        ]);

        Car::create([
            'brand' => 'Honda',
            'model' => 'Civic',
            'license_plate' => 'B5678XYZ',
            'rental_rate' => 300000.00,
            'available' => true,
        ]);

        Car::create([
            'brand' => 'Ford',
            'model' => 'Focus',
            'license_plate' => 'B9101XYZ',
            'rental_rate' => 280000.00,
            'available' => true,
        ]);
    }
}
