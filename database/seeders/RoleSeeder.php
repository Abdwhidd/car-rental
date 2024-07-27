<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        $user = User::find(1); // atau ID pengguna yang sesuai
        if ($user) {
            $user->assignRole('admin');
        }

        $user = User::find(2); // atau ID pengguna yang sesuai
        if ($user) {
            $user->assignRole('users');
        }
    }
}
