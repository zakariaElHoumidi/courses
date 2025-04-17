<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|between:5,64|between:3,25')]
    public string $firstname;
    #[Validate('required|between:5,64|between:3,25')]
    public string $lastname;
    #[Validate('required|between:3,64|unique:users,username')]
    public string $username;
    #[Validate('required|email|between:5,64|unique:users,email')]
    public string $email;
    #[Validate('required|between:8,64|confirmed')]
    public string $password;
    public string $password_confirmation;

    public function registerUser(): void
    {
        $this->validate();

        $user = new User();
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);

        $user->save();

        $route_login = route('login');

        $this->redirect($route_login, navigate: true);
    }

    public function render(): View
    {
        return view('livewire.auth.register');
    }
}
