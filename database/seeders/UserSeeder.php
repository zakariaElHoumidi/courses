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
            'firstname' => 'zakaria',
            'lastname' => 'el houmidi',
            'username' => 'zakaria_houmidi',
            'email' => 'zakaria@zakaria',
            'password' => Hash::make('password')
        ]);

        User::create([
            'firstname' => 'yahya',
            'lastname' => 'hamdy',
            'username' => 'yahya_hamdy',
            'email' => 'yahya@yahya',
            'password' => Hash::make('password')
        ]);
    }
}
