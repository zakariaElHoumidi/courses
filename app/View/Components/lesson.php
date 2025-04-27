<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Lesson as LessonModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class lesson extends Component
{
    public Collection $lessons;
    public int $limit = 5;
    public User $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->getLessons();
    }

    private function getLessons(): void {
        $query = LessonModel::where('user_id', $this->user->id);
        $lesson_exist = $query->exists();

        if ($lesson_exist) {
            $this->lessons = $query->latest()->take($this->limit)->get();
        } else {
            $this->lessons = new Collection();
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.lesson');
    }
}
