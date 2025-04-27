<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function lessons(): View
    {
        return view('pages.lessons.index');
    }

    public function show(int $id): View {
        return view('pages.lessons.show', compact('id'));
    }
}
