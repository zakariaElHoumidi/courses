<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'label' => 'HTML 1',
            'description' => 'HTML 1',
            'user_id' => User::first()->id
        ]);

        Language::create([
            'label' => 'CSS 1',
            'description' => 'CSS 1',
            'user_id' => User::first()->id
        ]);

        Language::create([
            'label' => 'JS 1',
            'description' => 'JS 1',
            'user_id' => User::first()->id
        ]);

        Language::create([
            'label' => 'PHP 1',
            'description' => 'PHP 1',
            'user_id' => User::first()->id
        ]);
    }
}
