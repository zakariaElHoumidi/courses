<?php

namespace App\Livewire\Charts;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Categories extends Component
{
    public Collection $categories;
    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();

        $query = Category::where('user_id', $this->user->id);

        $categories_exists = $query->exists();

        if ($categories_exists) {
            $this->categories = $query->withCount('concepts')->latest()->get();
        }
    }

    public function render()
    {
        return view('livewire.charts.categories');
    }
}
