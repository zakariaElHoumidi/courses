<?php

namespace Database\Seeders;

use App\Models\Concept;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $concept = Concept::all()->random();
            Lesson::create([
                'user_id' => $concept->user->id,
                'concept_id' => $concept->id,
                'title' => 'Lesson_' . $i,
                'content' => 'Content Lesson_' . $i,
            ]);
        }
    }
}
