<?php

namespace App\Observers;

use App\Models\Concept;

class ConceptObserver
{
    public function creating(Concept $concept): void
    {
        $isAuth = auth()->check();

        if ($isAuth) {
            $concept->user_id = auth()->user()->id;
        }
    }
}
