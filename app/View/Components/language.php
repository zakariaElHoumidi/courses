<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use App\Models\Language as LanguageModel;

class language extends Component
{
    public Collection $languages;
    public int $limit = 5;
    public User $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->getLanguage();
    }

    private function getLanguage(): void {
        $query = LanguageModel::where('user_id', $this->user->id);
        $language_exist = $query->exists();

        if ($language_exist) {
            $this->languages = $query->latest()->take($this->limit)->get();
        }
    }
    
    public function render(): View|Closure|string
    {
        return view('components.language');
    }
}
