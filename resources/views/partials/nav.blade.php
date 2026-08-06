<header class="site-header">
    <div class="container">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">NA</span>
            <span>
                {{ config('company.short_name') }}
                <small>Est. 2016 &middot; {{ config('company.address.district') }}, Kerala</small>
            </span>
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">About</a></li>
                <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'is-active' : '' }}">Products</a></li>
                <li><a href="{{ route('farmers') }}" class="{{ request()->routeIs('farmers') ? 'is-active' : '' }}">Farmers</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact*') ? 'is-active' : '' }}">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
