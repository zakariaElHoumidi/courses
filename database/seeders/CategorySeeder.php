<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'label' => 'Front End',
            'user_id' => 1
        ]);

        Category::create([
            'label' => 'Back End',
            'user_id' => 2
        ]);
    }
}
