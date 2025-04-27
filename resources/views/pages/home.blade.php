@extends('layouts.user')
@section('content')
    <x-core.welcome-message />
    <div class="container mt-3 d-flex align-items-center">
        <livewire:charts.categories />
        <livewire:charts.languages />
    </div>
    <livewire:charts.lessons />
    <x-concept />
    <x-language />
    <x-lesson />
    <x-lesson-part />
@endsection
