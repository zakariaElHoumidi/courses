<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    public function creating(Lesson $lesson): void
    {
        $isAuth = auth()->check();

        if ($isAuth) {
            $lesson->user_id = auth()->user()->id;
        }
    }
}
