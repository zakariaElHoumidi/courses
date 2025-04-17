<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Concept;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $language = Language::all()->random();
            Concept::create([
                'label' => 'Concept_' . $i,
                'description' => 'Concept_' . $i,
                'user_id' => $language->user->id,
                'language_id' => $language->id,
                'category_id' => Category::all()->random()->id,
            ]);
        }
    }
}
