@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.auth.login.title') }}</x-slot>

        {{ html()->form('POST', route('auth.login'))->class('col-6 offset-3 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label(__('view.auth.form.email'), 'email')->class('form-label') }}

                {{ html()->email('email')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.auth.form.password'), 'password')->class('form-label') }}

                {{ html()->password('password')->class('form-control') }}
            </div>

            <div class="mb-3 form-check">
                {{ html()->checkbox('remember_me')->class('form-check-input') }}

                {{ html()->label(__('view.auth.login.form.remember_me'), 'remember_me')->class('form-check-label') }}
            </div>

            {{ html()->submit(__('view.auth.sign_in'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
