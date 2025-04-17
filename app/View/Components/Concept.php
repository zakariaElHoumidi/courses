<?php

namespace App\View\Components;

use App\Models\Concept as ConceptModel;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Concept extends Component
{
    public Collection $concepts;
    public int $limit = 5;
    public User $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->getConcept();
    }

    private function getConcept(): void {
        $query = ConceptModel::where('user_id', $this->user->id);
        $concept_exist = $query->exists();

        if ($concept_exist) {
            $this->concepts = $query->latest()->take($this->limit)->get();
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.concept');
    }
}
