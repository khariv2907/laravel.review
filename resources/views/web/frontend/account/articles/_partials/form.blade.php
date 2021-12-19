<div class="mb-3">
    {{ html()->label(__('view.account.articles.form.title'), 'current_password')->class('form-label') }}

    {{ html()->text('title')->class('form-control') }}
</div>

<div class="mb-3">
    {{ html()->label(__('view.account.articles.form.content'), 'current_password')->class('form-label') }}

    {{ html()->textarea('content')->class('form-control') }}
</div>
