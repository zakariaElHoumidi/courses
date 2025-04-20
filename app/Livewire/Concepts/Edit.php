<?php

namespace App\Livewire\Concepts;

use App\Models\Category;
use App\Models\Concept;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|min:3')]
    public string $label;
    #[Validate('required|between:5,255')]
    public string $description;
    #[Validate('required|exists:categories,id')]
    public int $category_id;
    #[Validate('required|exists:languages,id')]
    public int $language_id;
    public Concept $concept;

    public Collection $categories;
    public Collection $languages;
    public User $user;

    public function mount(int $id): void {
        $concept = Concept::find($id);

        if (!$concept) {
            return;
        }

        $this->user = auth()->user();
        $this->getCategories();
        $this->getLanguages();

        $this->concept = $concept;
        $this->label = $concept->label;
        $this->description = $concept->description;
        $this->category_id = $concept->category_id;
        $this->language_id = $concept->language_id;
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

    public function updateConcept() {
        $this->validate();

        $this->concept->label = $this->label;
        $this->concept->description = $this->description;
        $this->concept->category_id = $this->category_id;
        $this->concept->language_id = $this->language_id;
        $this->concept->save();

        $this->reset([
            'label',
            'description',
            'category_id',
            'language_id',
        ]);

        $this->dispatch('concept-added');
        $this->modalToggle();
    }

    public function modalToggle(): void {
        $this->dispatch('modal-concept-update');
    }

    public function render()
    {
        return view('livewire.concepts.edit');
    }
}
