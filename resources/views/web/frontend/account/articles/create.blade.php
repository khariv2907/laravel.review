@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.account.articles.create.title') }}</x-slot>

        {{ html()->form('POST', route('account.articles.store'))->class('col-12')->open() }}
            @include('web.frontend.account.articles._partials.form')

            {{ html()->submit(__('view.form.create'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
