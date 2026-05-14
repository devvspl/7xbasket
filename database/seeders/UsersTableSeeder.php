<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manju account
        User::updateOrCreate(
            ['email' => 'manju@7xbasket.com'],
            [
                'name'     => 'Manju',
                'email'    => 'manju@7xbasket.com',
                'password' => Hash::make('Manju@123'),
                'role'     => 'admin',
            ]
        );

        // Amit account
        User::updateOrCreate(
            ['email' => 'amit@7xbasket.com'],
            [
                'name'     => 'Amit',
                'email'    => 'amit@7xbasket.com',
                'password' => Hash::make('Amit@123'),
                'role'     => 'admin',
            ]
        );
    }
}
