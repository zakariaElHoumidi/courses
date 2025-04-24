<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(): View
    {
        return view('pages.categories.index');
    }

    public function show(int $id): View {
        return view('pages.categories.show', compact('id'));
    }
}
