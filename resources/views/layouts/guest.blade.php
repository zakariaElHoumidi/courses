@extends('layouts.app')

@section('content-parent')
    <div class="d-flex align-items-center justify-content-center vh-100">
        @yield('content')
    </div>
@endsection

@section('title-parent')
    Guest - @yield('title')
@endsection
