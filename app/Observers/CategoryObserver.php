<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    public function creating(Category $category): void
    {
        $isAuth = auth()->check();

        if ($isAuth) {
            $category->user_id = auth()->user()->id;
        }
    }
}
