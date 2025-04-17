<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $languages;
    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getLanguages();
    }

    private function getLanguages(): void
    {
        $query = Language::where('user_id', $this->user->id);
        $language_exist = $query->exists();

        if ($language_exist) {
            $this->languages = $query->latest()->get();
        }
    }

    public function render()
    {
        return view('livewire.languages.index');
    }
}
