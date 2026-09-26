<nav class="mb-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="{{ route('comics.index') }}"
                class="nav-link {{ request()->is('comics*') ? 'active' : '' }}">
                All Comics
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('comics.filter') }}"
                class="nav-link" 
                {{ request()->is('comics/filter*') ? 'active' : '' }}>
                Filter Comics by Genre
            </a>
        </li>
    </ul>
</nav>