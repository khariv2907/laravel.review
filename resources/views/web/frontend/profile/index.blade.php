@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.profile.title') }}</x-slot>

        <h3>Update profile</h3>

        {{ html()->modelForm($user, 'POST', route('profile.update'))->class('col-6 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label(__('view.user.name'), 'name')->class('form-label') }}

                {{ html()->text('name')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.user.email'), 'email')->class('form-label') }}

                {{ html()->email('email')->class('form-control') }}
            </div>

            {{ html()->submit(__('view.form.save'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}

        <hr>

        <h3>Change password</h3>

        {{ html()->form( 'POST', route('profile.update.password'))->class('col-6 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label(__('view.profile.form.current_password'), 'current_password')->class('form-label') }}

                {{ html()->password('current_password')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.profile.form.new_password'), 'password')->class('form-label') }}

                {{ html()->password('password')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.profile.form.confirm_new_password'), 'password_confirmation')->class('form-label') }}

                {{ html()->password('password_confirmation')->class('form-control') }}
        </div>

            {{ html()->submit(__('view.form.change'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
