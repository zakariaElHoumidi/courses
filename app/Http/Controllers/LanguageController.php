<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languages(): View
    {
        return view('pages.languages.index');
    }

    public function show(int $id): View {
        return view('pages.languages.show', compact('id'));
    }
}
