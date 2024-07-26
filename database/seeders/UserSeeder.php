<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'role_id' => 2,
            'address' => 'Jl.batu 1 lurah 1',
            'phone' => '08123456789',
            'driver_license' => '123456789',
            'password' => Hash::make('budi123'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'address' => 'Jl.batu 2 lurah 2',
            'phone' => '0823234566',
            'driver_license' => '987654321',
            'password' => Hash::make('admin123'),
        ]);

    }
}
