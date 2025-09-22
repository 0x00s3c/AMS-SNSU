<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@snsu.edu.ph',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'QA Staff',
            'email' => 'qa@snsu.edu.ph',
            'password' => Hash::make('password'),
            'role' => 'qa',
        ]);

        User::create([
            'name' => 'Faculty Member',
            'email' => 'faculty@snsu.edu.ph',
            'password' => Hash::make('password'),
            'role' => 'faculty',
        ]);

        User::create([
            'name' => 'External Accreditor',
            'email' => 'external@snsu.edu.ph',
            'password' => Hash::make('password'),
            'role' => 'external',
        ]);
    }
}
