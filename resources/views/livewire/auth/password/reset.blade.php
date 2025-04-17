<div>
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.EMAIL') }}</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ $email ?? old('email') }}"
                   required
                   placeholder="{{ __('auth.EMAIL') }}"
                   wire:model.lazy="email"
                   autocomplete="email"
                   autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('auth.ENTER_PASSWORD') }}</label>

        <div class="col-md-6">
            <input id="password"
                   type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   required
                   placeholder="{{ __('auth.ENTER_PASSWORD') }}"
                   wire:model.lazy="password"
                   autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('auth.CONFIRM_PASSWORD') }}</label>

        <div class="col-md-6">
            <input id="password-confirm"
                   type="password"
                   class="form-control"
                   name="password_confirmation"
                   required
                   placeholder="{{ __('auth.CONFIRM_PASSWORD') }}"
                   wire:model.lazy="password_confirmation"
                   autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click="resetPassword" class="btn btn-primary">
                {{ __('auth.RESET_PASSWORD') }}
            </button>
        </div>
    </div>
</div>
