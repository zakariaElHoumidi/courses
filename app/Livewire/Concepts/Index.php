<?php

namespace App\Livewire\Concepts;

use App\Models\Concept;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Collection $concepts;
    public User $user;
    public bool $showModalStore = false;
    public bool $showModalUpdate = false;
    public bool $cannotDelete = false;

    public ?int $concept_id;

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
        } else {
            $this->concepts = new Collection();
        }
    }

    #[On(['concept-added', 'concept-updated'])]
    public function refreshConcepts(): void {
        $this->getConcepts();
    }

    public function createConcept(): void {
        $this->showModalStore = true;
    }

    public function editConcept(int $id): void {
        $this->concept_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-concept-store')]
    public function toggleModalStore(): void {
        $this->showModalStore = !$this->showModalStore;
    }

    #[On('modal-concept-update')]
    public function toggleModalUpdate(): void {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deleteConcept(int $id): void {
        try {

            $concept = Concept::find($id);

            if (!$concept) {
                return;
            }

            $concept->delete();

            $this->refreshConcepts();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.concepts.index');
    }
}
