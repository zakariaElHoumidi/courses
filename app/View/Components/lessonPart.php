<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\LessonPart as LessonPartModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class lessonPart extends Component
{
    public Collection $lesson_parts;
    public int $limit = 5;
    public User $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->getLessonParts();
    }

    private function getLessonParts(): void {
        $query = LessonPartModel::where('user_id', $this->user->id);
        $lesson_part_exist = $query->exists();

        if ($lesson_part_exist) {
            $this->lesson_parts = $query->latest()->take($this->limit)->get();
        } else {
            $this->lesson_parts = new Collection();
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.lesson-part');
    }
}
