@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.account.articles.create.title') }}</x-slot>

        {{ html()->modelForm($article, 'PUT', route('account.articles.update', $article->id))->class('col-12 my-4')->open() }}
            @include('web.frontend.account.articles._partials.form')

            {{ html()->submit(__('view.form.save'))->class('btn btn-primary') }}
        {{ html()->form()->close() }}
    </x-common.card-body>
@endsection
