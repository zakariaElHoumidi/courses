<?php

namespace Database\Factories;

use App\Models\Concept;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => Str::random(15),
            'user_id' => User::first()->id,
            'concept_id' => Concept::first()->id
        ];
    }
}
