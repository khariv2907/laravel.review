<div class="card shadow-sm">
    <img src="https://via.placeholder.com/408x225" class="card-img-top" width="100%" height="225">

    <div class="card-body">
        <p class="card-text">{{ $article->title }}</p>

        <div class="d-flex justify-content-between align-items-center">
            @if($isEditable)
                <div class="btn-group">
                    <a href="{{ route('account.articles.show', $article->id) }}" class="btn btn-sm btn-outline-secondary">
                        {{ __('view.account.articles.actions.view') }}
                    </a>

                    <a href="{{ route('account.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-secondary">
                        {{ __('view.account.articles.actions.edit') }}
                    </a>
                </div>

                {{ html()->form('DELETE', route('account.articles.destroy', $article->id))->open() }}
                    <button class="btn btn-sm btn-outline-secondary">
                        {{ __('view.account.articles.actions.delete') }}
                    </button>
                {{ html()->form()->close() }}
            @else
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-sm btn-outline-secondary">
                    {{ __('view.articles.actions.view') }}
                </a>
            @endif
        </div>
    </div>
</div>
