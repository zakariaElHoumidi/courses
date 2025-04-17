@extends('layouts.profile')
@section('sous-content')
    <div class="py-3">
        <h3 class="mb-4">{{ __('profile.DELETE_ACCOUNT') }}</h3>

        <div class="card p-4 shadow-sm">
            <livewire:profile.delete-account />
        </div>
    </div>
@endsection
