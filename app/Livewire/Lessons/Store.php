<?php

namespace App\Livewire\Lessons;

use App\Models\Concept;
use App\Models\Lesson;
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
    #[Validate('required|exists:concepts,id')]
    public int $concept_id;

    public Collection $concepts;
    public User $user;

    public function mount(): void{
        $this->user = auth()->user();
        $this->getConcepts();
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

    public function storeLesson()
    {
        $this->validate();

        $lesson = new Lesson();

        $lesson->title = $this->title;
        $lesson->content = $this->content;
        $lesson->concept_id = $this->concept_id;

        $lesson->save();

        $this->reset([
            'title',
            'content',
            'concept_id',
        ]);

        $this->dispatch('lesson-added');
        $this->modalToggle();
    }

    public function modalToggle(): void
    {
        $this->dispatch('modal-lesson-store');
    }

    public function render()
    {
        return view('livewire.lessons.store');
    }
}
