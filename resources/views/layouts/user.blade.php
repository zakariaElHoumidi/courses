@extends('layouts.app')

@section('content-parent')
    <x-core.header />

    <div class="container-fluid mt-3">
        @yield('content')
    </div>
@endsection

@section('title-parent')
    @yield('title')
@endsection
