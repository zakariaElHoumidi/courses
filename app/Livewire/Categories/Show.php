<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public Category $category;

    public ?int $category_id;

    public bool $showModalUpdate = false, $cannotDelete = false;


    public function mount(int $id): void {
        $this->category = Category::find($id);
    }

    public function editCategory(int $id): void
    {
        $this->category_id = $id;
        $this->showModalUpdate = true;
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

            $route = route('categories.index');

            $this->redirect($route, navigate: true);

        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.categories.show');
    }
}
