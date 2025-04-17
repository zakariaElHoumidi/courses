@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('auth.VERIFY_EMAIL') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        okey
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.VERIFICATION_RESENT') }}
                        </div>
                    @endif

                    {{ __('auth.CHECK_EMAIL_BEFORE_CONT') }}
                    {{ __('auth.NOT_RECEIVE_EMAIL') }},
                    <livewire:auth.verify-email />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
