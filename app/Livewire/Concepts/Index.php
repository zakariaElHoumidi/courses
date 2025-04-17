<?php

namespace App\Livewire\Concepts;

use App\Models\Concept;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $concepts;
    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getConcepts();
    }

    private function getConcepts(): void
    {
        $query = Concept::where('user_id', $this->user->id);
        $concept_exist = $query->exists();

        if ($concept_exist) {
            $this->concepts = $query->latest()->get();
        }
    }
    
    public function render()
    {
        return view('livewire.concepts.index');
    }
}
