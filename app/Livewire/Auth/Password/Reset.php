<?php

namespace App\Livewire\Auth\Password;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Reset extends Component
{
    public string $token;
    #[Validate('required|email|between:5,64|exists:users,email')]
    public string $email;
    #[Validate('required|between:8,64|confirmed')]
    public string $password;
    public string $password_confirmation;

    public function mount(string $token, string $email): void {
        $this->token = $token;
        $this->email = $email;
    }

    public function resetPassword()
    {
        $this->validate();

        $response = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ], function ($user) {
            $user->password = Hash::make($this->password);
            $user->save();
            event(new PasswordReset($user));
        });


        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login');
        } else {
            session()->flash('error', 'The provided token is invalid.');
        }
    }

    public function render(): View
    {
        return view('livewire.auth.password.reset');
    }
}
