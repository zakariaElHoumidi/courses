<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|min:3')]
    public string $label;
    public Category $category;

    public function mount(Category $category): void {
        $this->category = $category;
        $this->label = $category->label;
    }

    public function updateCategory() {
        $this->validate();

        $this->category->label = $this->label;
        $this->category->save();

        $this->reset([
            'label'
        ]);

        $this->dispatch('category-added');
        $this->modalToggle();
    }

    public function modalToggle(): void {
        $this->dispatch('modal-category-update');
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
