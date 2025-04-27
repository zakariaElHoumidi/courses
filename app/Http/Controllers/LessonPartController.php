<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LessonPartController extends Controller
{
    public function lessons_parts(): View
    {
        return view('pages.part-lessons.index');
    }

    public function show(int $id): View {
        return view('pages.part-lessons.show', compact('id'));
    }
}
