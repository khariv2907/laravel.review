@extends('web.frontend.layouts.app.index', [
    'title' => $pageTitle
])

@section('content')
    <x-common.card-body>
        <x-slot name="title">{{ __('view.account.articles.title') }}</x-slot>

        <a href="{{ route('account.articles.create') }}" class="btn btn-primary">
            {{ __('view.account.articles.form.addBtn') }}
        </a>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
            @forelse($articles as $article)
                <div class="col">
                    <x-articles.preview-item
                        :article="$article"
                        isEditable="true"
                    />
                </div>
            @empty
                <p>* no articles found</p>
            @endforelse
        </div>

    </x-common.card-body>
@endsection
