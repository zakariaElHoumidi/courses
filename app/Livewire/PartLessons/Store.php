<?php

namespace App\Livewire\PartLessons;

use App\Models\Lesson;
use App\Models\LessonPart;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Store extends Component
{
    #[Validate('required|min:3')]
    public string $title;
    #[Validate('required|between:5,255')]
    public string $content;
    #[Validate('required|exists:lessons,id')]
    public int $lesson_id;
    #[Validate('required|integer|min:1')]
    public int $order;

    public Collection $lessons;
    public User $user;

    public function mount(): void{
        $this->user = auth()->user();
        $this->getLessons();
    }

    private function getLessons(): void
    {
        $query = Lesson::where('user_id', $this->user->id);
        $lesson_exist = $query->exists();

        if ($lesson_exist) {
            $this->lessons = $query->latest()->get();
        } else {
            $this->lessons = new Collection();
        }
    }

    public function storePartLesson()
    {
        $this->validate();

        $lesson_part = new LessonPart();

        $lesson_part->title = $this->title;
        $lesson_part->content = $this->content;
        $lesson_part->lesson_id = $this->lesson_id;
        $lesson_part->order = $this->order;

        $lesson_part->save();

        $this->reset([
            'title',
            'content',
            'lesson_id',
            'order',
        ]);

        $this->dispatch('part-lesson-added');
        $this->modalToggle();
    }

    public function modalToggle(): void
    {
        $this->dispatch('modal-part-lesson-store');
    }
    public function render()
    {
        return view('livewire.part-lessons.store');
    }
}
