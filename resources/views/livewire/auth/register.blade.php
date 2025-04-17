<div>
    {{-- First Name --}}
    <div class="row mb-3">
        <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('auth.FIRST_NAME') }}</label>

        <div class="col-md-6">
            <input id="firstname"
                   type="text"
                   class="form-control @error('firstname') is-invalid @enderror"
                   name="firstname"
                   value="{{ old('firstname') }}"
                   required
                   placeholder="{{ __('auth.FIRST_NAME') }}"
                   wire:model.lazy="firstname"
                   autocomplete="firstname"
                   autofocus>

            @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Last Name --}}
    <div class="row mb-3">
        <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('auth.SECOND_NAME') }}</label>

        <div class="col-md-6">
            <input id="lastname"
                   type="text"
                   class="form-control @error('lastname') is-invalid @enderror"
                   name="lastname"
                   value="{{ old('lastname') }}"
                   required
                   placeholder="{{ __('auth.SECOND_NAME') }}"
                   wire:model.lazy="lastname"
                   autocomplete="lastname">

            @error('lastname')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Email --}}
    <div class="row mb-3">
        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('auth.USERNAME') }}</label>

        <div class="col-md-6">
            <input id="username"
                   type="text"
                   class="form-control @error('username') is-invalid @enderror"
                   name="username"
                   value="{{ old('username') }}"
                   placeholder="{{ __('auth.USERNAME') }}"
                   wire:model.lazy="username"
                   required
                   autocomplete="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Email --}}
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.EMAIL') }}</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="{{ __('auth.EMAIL') }}"
                   wire:model.lazy="email"
                   required
                   autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Password --}}
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('auth.ENTER_PASSWORD') }}</label>

        <div class="col-md-6">
            <input id="password"
                   type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   placeholder="{{ __('auth.ENTER_PASSWORD') }}"
                   wire:model.lazy="password"
                   required
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    {{-- Confirm Password --}}
    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('auth.CONFIRM_PASSWORD') }}</label>

        <div class="col-md-6">
            <input id="password-confirm"
                   type="password"
                   class="form-control"
                   name="password_confirmation"
                   placeholder="{{ __('auth.CONFIRM_PASSWORD') }}"
                   wire:model.lazy="password_confirmation"
                   required
                   autocomplete="new-password">
        </div>
    </div>

    {{-- Button --}}
    <div class="row mb-0">
        <div class="col-md-4"></div>

        <div class="col-md-6 d-flex align-items-center justify-content-between">
            <button wire:click="registerUser" class="btn btn-primary">
                {{ __('auth.CREATE_ACCOUNT') }}
            </button>

            <a href="{{ route('login') }}" wire:navigate class="btn btn-outline-primary">
                {{ __('auth.LOGIN') }}
            </a>
        </div>
    </div>
</div>
