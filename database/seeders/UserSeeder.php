<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'superadmin']);

        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' =>  'superadmin@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        $superadmin->assignRole('superadmin');
    }
}
