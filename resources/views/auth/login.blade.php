@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('auth.LOGIN') }}</div>

                <div class="card-body">
                    <livewire:auth.login />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
