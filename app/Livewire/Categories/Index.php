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

    public ?int $category_id;

    public string $search = "";

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getCategories();
    }

    private function getCategories(): void
    {
        $query = Category::where('user_id', $this->user->id);

        if ($this->search) {
            $query->where('label', 'like', '%' . $this->search . '%');
        }

        $category_exist = $query->exists();

        if ($category_exist) {
            $this->categories = $query->latest()->get();
        } else {
            $this->categories = new Collection();
        }
    }

    public function updatedSearch()
    {
        $this->getCategories();
    }

    public function resetSearch(): void {
        $this->search = "";
        $this->getCategories();
    }

    #[On(['category-added', 'category-updated'])]
    public function refreshCategories(): void
    {
        $this->getCategories();
    }

    public function createCategory(): void
    {
        $this->showModalStore = true;
    }

    public function editCategory(int $id): void
    {
        $this->category_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-category-store')]
    public function toggleModalStore(): void
    {
        $this->showModalStore = !$this->showModalStore;
    }

    #[On('modal-category-update')]
    public function toggleModalUpdate(): void
    {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deleteCategory(int $id): void
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return;
            }
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
