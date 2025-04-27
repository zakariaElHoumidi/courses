<?php

namespace App\Livewire\Lessons;

use App\Models\Concept;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|min:3')]
    public string $title;
    #[Validate('required|between:5,255')]
    public string $content;
    #[Validate('required|exists:concepts,id')]
    public int $concept_id;

    public Lesson $lesson;

    public Collection $concepts;
    public User $user;

    public function mount(int $id): void {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return;
        }

        $this->user = auth()->user();
        $this->getConcepts();

        $this->lesson = $lesson;
        $this->title = $lesson->title;
        $this->content = $lesson->content;
        $this->concept_id = $lesson->concept_id;
    }

    private function getConcepts(): void
    {
        $query = Concept::where('user_id', $this->user->id);
        $concept_exist = $query->exists();

        if ($concept_exist) {
            $this->concepts = $query->latest()->get();
        } else {
            $this->concepts = new Collection();
        }
    }

    public function updateLesson() {
        $this->validate();

        $this->lesson->title = $this->title;
        $this->lesson->content = $this->content;
        $this->lesson->concept_id = $this->concept_id;
        $this->lesson->save();

        $this->reset([
            'title',
            'content',
            'concept_id',
        ]);

        $this->dispatch('lesson-added');
        $this->modalToggle();
    }

    public function modalToggle(): void {
        $this->dispatch('modal-lesson-update');
    }

    public function render()
    {
        return view('livewire.lessons.edit');
    }
}
