<div>
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('auth.EMAIL') }}</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"
                   wire:model.lazy="email"
                   placeholder="{{ __('auth.LOGIN') }}"
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
                   wire:model.lazy="password"
                   placeholder="{{ __('auth.ENTER_PASSWORD') }}"
                   autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('auth.REMEMBER_ME') }}
                </label>
            </div>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-4"></div>

        <div class="col-md-6 d-flex align-items-center justify-content-between">
            <button wire:click="loginUser" class="btn btn-primary">
                {{ __('auth.LOGIN') }}
            </button>

            <a href="{{ route('register') }}" wire:navigate class="btn btn-outline-primary">
                {{ __('auth.CREATE_ACCOUNT') }}
            </a>
        </div>

        <!-- Password Recovery Link -->
        @if (Route::has('password.request'))
            <div class="col-md-8 offset-md-4 mt-2">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('auth.FORGET_PASSWORD') }}
                </a>
            </div>
        @endif
    </div>
</div>
