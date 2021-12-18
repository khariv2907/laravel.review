@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">
            Login Page
        </x-slot>

        @include('web.frontend._partials.errors')

        {{ html()->form('POST', route('auth.login'))->class('col-6 offset-3 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label('Email address', 'email')->class('form-label') }}

                {{ html()->email('email')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Password', 'password')->class('form-label') }}

                {{ html()->password('password')->class('form-control') }}
            </div>

            <div class="mb-3 form-check">
                {{ html()->checkbox('remember_me')->class('form-check-input') }}

                {{ html()->label('Remember me', 'remember_me')->class('form-check-label') }}
            </div>

            {{ html()->submit('Sign in')->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
