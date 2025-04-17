<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Closure;

class Login extends Component
{
    #[Validate('required|email|between:5,64')]
    public string $email;
    #[Validate('required|between:8,64')]
    public string $password;

    public function loginUser()
    {
        $this->validate();

        $user = User::where('email', $this->email)
            ->first();

        if (!$user) {
            $this->addError('email', __('auth.EMAIL_NOT_FOUND'));
            return;
        }

        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'Wrong password');
            return;
        }

        Auth::login($user);

        $login_route = route('home');

        return $this->redirect($login_route, navigate: true);
    }

    public function render(): View|Closure|string
    {
        return view('livewire.auth.login');
    }
}
