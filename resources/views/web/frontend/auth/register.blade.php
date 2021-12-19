@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.auth.register.title') }}</x-slot>

        {{ html()->form('POST', route('auth.register'))->class('col-6 offset-3 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label(__('view.auth.register.form.name'), 'name')->class('form-label') }}

                {{ html()->text('name')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.auth.form.email'), 'email')->class('form-label') }}

                {{ html()->email('email')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.auth.form.password'), 'password')->class('form-label') }}

                {{ html()->password('password')->class('form-control') }}
            </div>

        <div class="mb-3">
            {{ html()->label(__('view.auth.register.form.confirm_password'), 'password_confirmation')->class('form-label') }}

            {{ html()->password('password_confirmation')->class('form-control') }}
        </div>

            {{ html()->submit(__('view.auth.sign_up'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
