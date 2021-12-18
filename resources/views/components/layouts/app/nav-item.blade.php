<li>
    <a
        href="{{ $link }}"
        class="nav-link px-2 {{ $isActive($routeName) ? 'text-secondary' : 'text-white' }}"
    >
        {{ $label }}
    </a>
</li>
