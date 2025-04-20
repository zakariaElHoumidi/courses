<?php

namespace App\Livewire\Concepts;

use App\Models\Category;
use App\Models\Concept;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Collection $concepts, $categories, $languages;
    public bool $showModalStore = false, $showModalUpdate = false, $cannotDelete = false;

    public User $user;

    public ?int $concept_id, $category_id = null, $language_id = null;

    public string $search = "";

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getCategories();
        $this->getLanguages();

        $this->getConcepts();
    }

    private function getConcepts(): void
    {
        $query = Concept::where('user_id', $this->user->id);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('label', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->category_id !== null && $this->category_id !== 0) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->language_id !== null && $this->category_id !== 0) {
            $query->where('language_id', $this->language_id);
        }

        $concept_exist = $query->exists();

        if ($concept_exist) {
            $this->concepts = $query->latest()->get();
        } else {
            $this->concepts = new Collection();
        }
    }

    private function getCategories(): void
    {
        $query = Category::where('user_id', $this->user->id);
        $category_exist = $query->exists();

        if ($category_exist) {
            $this->categories = $query->latest()->get();
        } else {
            $this->categories = new Collection();
        }
    }

    private function getLanguages(): void
    {
        $query = Language::where('user_id', $this->user->id);
        $language_exist = $query->exists();

        if ($language_exist) {
            $this->languages = $query->latest()->get();
        } else {
            $this->languages = new Collection();
        }
    }

    public function updated($property): void
    {
        if ($property == 'search' || $property == 'category_id' || $property == 'language_id') {
            $this->getConcepts();
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
