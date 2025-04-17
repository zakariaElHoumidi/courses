<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class VerifyEmail extends Component
{
    public ?User $user;
    public bool $isAuth = false;

    public function mount(): void
    {
        $isAuth = Auth::check();

        if ($isAuth) {
            $this->isAuth = true;
            $this->user = Auth::user();
        }
    }

    public function sendVerification(): void
    {
        if ($this->user->hasVerifiedEmail()) {
            session()->flash('message', __('auth.EMAIL_ALREADY_VERIFY'));
        } else {
            $this->user->sendEmailVerificationNotification();
            session()->flash('message', __('auth.VERIFICATION_RESENT'));
        }
    }

    public function render(): View
    {
        return view('livewire.auth.verify-email');
    }
}
