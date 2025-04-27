<?php

namespace App\Livewire\Charts;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Languages extends Component
{
    public Collection $languages;
    public User $user;

    public function mount(): void {
        $this->user = auth()->user();

        $query = Language::where('user_id', $this->user->id);

        $languages_exists = $query->exists();

        if ($languages_exists) {
            $this->languages = $query->latest()->get();
        }
    }

    public function render()
    {
        return view('livewire.charts.languages');
    }
}
