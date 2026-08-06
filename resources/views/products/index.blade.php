@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <section style="padding-block: 56px 24px;">
        <div class="container">
            <span class="eyebrow">The catalog</span>
            <h1>Spices, baked goods &amp; beverages</h1>
            <p class="lede" style="color:var(--ink-soft); max-width:60ch;">
                A live view of what {{ config('company.short_name') }} currently has listed.
                Pricing is confirmed on enquiry &mdash; reach out for volumes, samples, or wholesale.
            </p>
        </div>
    </section>

    <section style="padding-top:0;">
        <div class="container">
            <div class="pillbar">
                <a href="{{ route('products.index') }}" class="pill {{ $activeCategory === 'all' ? 'is-active' : '' }}">All</a>
                @foreach ($categories as $slug => $label)
                    <a href="{{ route('products.index', ['category' => $slug]) }}"
                       class="pill {{ $activeCategory === $slug ? 'is-active' : '' }}">{{ $label }}</a>
                @endforeach
            </div>

            @if ($products->isEmpty())
                <div class="empty-state">
                    No products found in this category yet. Check back soon, or
                    <a href="{{ route('contact') }}" style="color:var(--chili); font-weight:600;">ask us directly</a>.
                </div>
            @else
                <div class="grid grid--3">
                    @foreach ($products as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                <div style="margin-top:40px;">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection
