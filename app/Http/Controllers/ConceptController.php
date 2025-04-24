<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
    public function concepts(): View
    {
        return view('pages.concepts.index');
    }

    public function show(int $id): View {
        return view('pages.concepts.show', compact('id'));
    }
}
