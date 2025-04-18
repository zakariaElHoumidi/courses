<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Store extends Component
{
    #[Validate('required|min:3')]
    public string $label;

    public function storeCategory() {
        $this->validate();

        $category = new Category();

        $category->label = $this->label;
        $category->save();

        $this->reset([
            'label'
        ]);

        $this->dispatch('category-added');
        $this->modalToggle();
    }

    public function modalToggle(): void {
        $this->dispatch('modal-category-store');
    }

    public function render()
    {
        return view('livewire.categories.store');
    }
}
