<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $categories;
    public User $user;

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

    public function render()
    {
        return view('livewire.categories.index');
    }
}
