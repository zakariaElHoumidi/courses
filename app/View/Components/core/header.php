<?php

namespace App\View\Components\core;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class header extends Component
{
    public Collection $links;

    public function __construct()
    {
        $this->buildLinks();
    }

    private function buildLinks(): void
    {
        $this->links = collect([
            [
                'name' => 'Home',
                'route' => route('home'),
                'active' => request()->routeIs('home') ? 'active' : '',
                'is_dropdown' => false
            ],
            [
                'name' => 'open',
                'is_dropdown' => true,
                'children' => [],
            ]
        ]);
    }

    public function render(): View|Closure|string
    {
        return view('components.core.header');
    }
}
