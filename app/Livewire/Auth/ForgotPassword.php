<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('required|email|between:5,64|exists:users,email')]
    public string $email;

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->reset([
                'email',
            ]);
            return back()->with(['status' => __($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function render(): View
    {
        return view('livewire.auth.forgot-password');
    }
}
