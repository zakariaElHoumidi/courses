<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{

    public function home(): View
    {
        return view('pages.home');
    }

    public function concepts(): View
    {
        return view('pages.concepts.index');
    }

    public function languages(): View
    {
        return view('pages.languages.index');
    }

    public function categories(): View
    {
        return view('pages.categories.index');
    }
}
