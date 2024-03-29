@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.account.profile.title') }}</x-slot>

        <h3>{{ __('view.account.profile.update_profile_title') }}</h3>

        {{ html()->modelForm($user, 'POST', route('account.profile.update'))->class('col-6 my-4')->open() }}
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

        <h3>{{ __('view.account.profile.change_password_title') }}</h3>

        {{ html()->form( 'POST', route('account.profile.update.password'))->class('col-6 my-4')->open() }}
            <div class="mb-3">
                {{ html()->label(__('view.account.profile.form.current_password'), 'current_password')->class('form-label') }}

                {{ html()->password('current_password')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.account.profile.form.new_password'), 'password')->class('form-label') }}

                {{ html()->password('password')->class('form-control') }}
            </div>

            <div class="mb-3">
                {{ html()->label(__('view.account.profile.form.confirm_new_password'), 'password_confirmation')->class('form-label') }}

                {{ html()->password('password_confirmation')->class('form-control') }}
        </div>

            {{ html()->submit(__('view.form.change'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
