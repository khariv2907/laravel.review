@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">
            Register Page
        </x-slot>

        {{ html()->form('POST', route('auth.register'))->class('col-6 offset-3 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label('Email address', 'email')->class('form-label') }}

                {{ html()->email('email')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label('Password', 'password')->class('form-label') }}

                {{ html()->password('password')->class('form-control') }}
            </div>

        <div class="mb-3">
            {{ html()->label('Confirm Password', 'password_confirmation')->class('form-label') }}

            {{ html()->password('password_confirmation')->class('form-control') }}
        </div>

            {{ html()->submit('Sign up')->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
