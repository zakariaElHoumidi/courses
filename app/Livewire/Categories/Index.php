<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Collection $categories;
    public User $user;
    public bool $showModalStore = false;
    public bool $showModalUpdate = false;
    public bool $cannotDelete = false;

    public ?Category $category;

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getCategories();
    }

    private function getCategories(): void
    {
        $query = Category::where('user_id', $this->user->id);
        $category_exist = $query->exists();

        if ($category_exist) {
            $this->categories = $query->latest()->get();
        }
    }

    #[On(['category-added', 'category-updated'])]
    public function refreshCategories(): void {
        $this->getCategories();
    }

    public function createCategory(): void {
        $this->showModalStore = true;
    }

    public function editCategory(Category $category): void {
        $this->showModalUpdate = true;
        $this->category = $category;
    }

    #[On('modal-category-store')]
    public function toggleModalStore(): void {
        $this->showModalStore = !$this->showModalStore;
    }

    #[On('modal-category-update')]
    public function toggleModalUpdate(): void {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deleteCategory(Category $category): void {
        try {
            $category->delete();

            $this->refreshCategories();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.categories.index');
    }
}
