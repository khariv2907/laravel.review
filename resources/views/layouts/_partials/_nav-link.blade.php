<li>
    <a href="{{ route($routeName) }}"
       class="nav-link px-2 {{ \Route::is($routeName) ? 'text-secondary' : 'text-white' }}"
    >
        {{ $label }}
    </a>
</li>
