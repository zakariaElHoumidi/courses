<?php

namespace App\Observers;

use App\Models\LessonPart;

class LessonPartObserver
{
    public function creating(LessonPart $lesson_part): void
    {
        $isAuth = auth()->check();

        if ($isAuth) {
            $lesson_part->user_id = auth()->user()->id;
        }
    }
}
