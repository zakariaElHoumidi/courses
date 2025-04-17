<?php

namespace App\View\Components\core;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class welcomeMessage extends Component
{
    public User $user;
    public function __construct()
    {
        $this->user = auth()->user();
    }

    
    public function render(): View|Closure|string
    {
        return view('components.core.welcome-message');
    }
}
