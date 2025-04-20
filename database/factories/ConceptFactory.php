<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concept>
 */
class ConceptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => fake()->name(),
            'description' => Str::random(15),
            'user_id' => User::first()->id,
            'category_id' => Category::first()->id,
            'language_id' => Language::first()->id
        ];
    }
}
