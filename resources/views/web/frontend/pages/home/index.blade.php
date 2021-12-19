@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.pages.home.title') }}</x-slot>

        <h5 class="card-title">{{ __('view.pages.home.welcome') }}</h5>

        @auth
            <hr>

            <div class="mb-3 row">
                <div class="col-sm-2">{{ __('view.user.name') }}</div>

                <div class="col-sm-10">{{ $user->name }}</div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2">{{ __('view.user.email') }}</div>

                <div class="col-sm-10">{{ $user->email }}</div>
            </div>

            <hr>

            <a href="{{ route('auth.logout') }}" class="btn btn-primary">{{ __('view.auth.logout') }}</a>
        @endauth

        @guest
            <a href="{{ route('auth.register') }}" class="btn btn-primary mt-3 me-1">{{ __('view.auth.sign_up') }}</a>

            <a href="{{ route('auth.login') }}" class="btn btn-primary mt-3">{{ __('view.auth.sign_in') }}</a>
        @endguest
    </x-common.card-body>
@endsection
