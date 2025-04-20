<?php

namespace App\Observers;

use App\Models\Language;

class LanguageObserver
{
    public function creating(Language $language): void
    {
        $isAuth = auth()->check();

        if ($isAuth) {
            $language->user_id = auth()->user()->id;
        }
    }
}
