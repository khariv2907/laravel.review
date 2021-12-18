@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">
            Home Page
        </x-slot>

        <h5 class="card-title">Welcome to the Laravel Demonstration Project</h5>

        @auth
            <hr>

            <div class="mb-3 row">
                <div class="col-sm-2">Name</div>

                <div class="col-sm-10">{{ $user->name }}</div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2">Email</div>

                <div class="col-sm-10">{{ $user->email }}</div>
            </div>

            <hr>

            <a href="{{ route('auth.logout') }}" class="btn btn-primary">Log out</a>
        @endauth

        @guest
            <a href="{{ route('auth.register') }}" class="btn btn-primary mt-3 me-1">Sign up</a>

            <a href="{{ route('auth.login') }}" class="btn btn-primary mt-3">Sign in</a>
        @endguest
    </x-common.card-body>
@endsection
