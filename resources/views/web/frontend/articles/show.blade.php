@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.articles.show.title') }}</x-slot>

       <h1>{{ $article->title }}</h1>

        <x-markdown>
            {{ $article->content }}
        </x-markdown>
    </x-common.card-body>
@endsection
