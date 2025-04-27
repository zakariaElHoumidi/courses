@extends('layouts.user')
@section('content')
    <x-core.welcome-message />
    <livewire:charts.categories />
    <x-concept />
    <x-language />
    <x-lesson />
    <x-lesson-part />
@endsection
