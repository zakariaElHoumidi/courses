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

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click="sendResetLink" class="btn btn-primary">
                {{ __('auth.SEND_RESET_LINK') }}
            </button>
        </div>
    </div>
</div>
