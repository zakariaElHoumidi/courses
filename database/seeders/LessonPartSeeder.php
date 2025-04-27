<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonPart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $lesson = Lesson::all()->random();
            LessonPart::create([
                'user_id' => $lesson->user->id,
                'lesson_id' => $lesson->id,
                'title' => 'Lesson_' . $i,
                'content' => 'Content Lesson_' . $i,
                'order' => $i + 1
            ]);
        }
    }
}
