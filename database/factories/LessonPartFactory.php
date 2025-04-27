<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonPart>
 */
class LessonPartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::first()->id,
            'lesson_id' => Lesson::first()->id,
            'title' => fake()->sentence(),
            'content' => Str::random(15),
            'order' => 1
        ];
    }
}
